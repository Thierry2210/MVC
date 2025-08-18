function loadData(numero) {
    getUrl(`${BASEURL}/aluno/loadData/${numero}`)
        .then(res => {
            if (res.data.length > 0) {
                var txtraaluno = document.querySelector('#txtraaluno');
                var txtnomealuno = document.querySelector('#txtnomealuno');
                txtraaluno.value = res.data[0].ra;
                txtraaluno.readOnly = true;
                txtnomealuno.value = res.data[0].nome;
                showEdit();
            }
        });
}

function delData(id) {
    if (confirm("Confirma a Exclusão do aluno?")) {
        var params = { id: id };
        deleteItem(`${BASEURL}/aluno/delAluno`, params)
            .then(res => {
                alert(res.data.texto);
                if (res.data.codigo == "1") {
                    reset();
                    listaAluno();
                }
            })
    }
}

function listaAluno() {
    document.querySelector('#lsaluno').innerHTML = 'Carregando...';
    getUrl(`${BASEURL}/aluno/listaAluno`)
        .then(res => {
            var txt = "";
            for (var i = 0; i < res.data.length; i++) {
                var reg = res.data[i];
                var bEdit = `<a href="javascript:void(0)" onclick="loadData(${reg.ra})"><i class="bx bx-edit"></i></a>`;
                var bDel = `<a href="javascript:void(0)" onclick="delData(${reg.ra})"><i class="bx bx-trash"></i></a>`;
                txt += `<tr>
                    <td>${reg.ra}</td><td>${reg.nome}</td><td>${bEdit}${bDel}</td>
                </tr>`;
            }
            document.querySelector('#lsaluno').innerHTML = txt;
        });
}  

function reset() {
    document.querySelector('#frmALuno').reset();
    hideEdit();
}

document.addEventListener('DOMContentLoaded', ()=> {
    reset();
    listaAluno();
    document.querySelector("#btnInc").addEventListener("click", () => {
        let form = document.querySelector("#frmALuno");
        postForm(`${BASEURL}/aluno/addAluno`,form).then(res=>{
            alert(res.data.texto);
            if(res.data.codigo == "1"){
                reset();
                listaAluno();
            }
        })
    });

    document.querySelector("#btnSave").addEventListener("click", () => {
        let form = document.querySelector("#frmALuno");
        postForm(`${BASEURL}/aluno/save`,form).then(res=>{
            alert(res.data.texto);
            if(res.data.codigo == "1"){
                reset();
                listaAluno();
            }
        })
    });

    document.querySelector("#btnCancel").addEventListener("click", () => {
        reset();
    });
})