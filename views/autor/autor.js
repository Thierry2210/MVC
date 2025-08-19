function loadData(numero) {
    getUrl(`${BASEURL}/autor/loadData/${numero}`)
        .then(res => {
            if (res.data.length > 0) {
                var txtcodautor = document.querySelector('#txtcodautor');
                var txtnomeautor = document.querySelector('#txtnomeautor');
                txtcodautor.value = res.data[0].codigo;
                txtcodautor.readOnly = true;
                txtnomeautor.value = res.data[0].nome;
                showEdit();
            }
        });
}

function delAutor(id) {
    if (confirm("Confirma a Exclusão do Autor?")) {
        var params = { id: id };
        deleteItem(`${BASEURL}/autor/delAutor`, params)
            .then(res => {
                alert(res.data.texto);
                if (res.data.codigo == "1") {
                    reset();
                    listaAutor();
                }
            })
    }
}

function listaAutor() {
    document.querySelector('#lsautor').innerHTML = 'Carregando...';
    getUrl(`${BASEURL}/autor/listaAutor`)
        .then(res => {
            var txt = "";
            for (var i = 0; i < res.data.length; i++) {
                var reg = res.data[i];
                var bEdit = `<a href="javascript:void(0)" onclick="loadData(${reg.codigo})"><i class="bx bx-edit"></i></a>`;
                var bDel = `<a href="javascript:void(0)" onclick="delData(${reg.codigo})"><i class="bx bx-trash"></i></a>`;
                txt += `<tr>
                    <td>${reg.codigo}</td><td>${reg.nome}</td><td>${bEdit}${bDel}</td>
                </tr>`;
            }
            document.querySelector('#lsautor').innerHTML = txt;
        });
}  

function reset() {
    document.querySelector('#frmAutor').reset();
    hideEdit();
}

document.addEventListener('DOMContentLoaded', ()=> {
    reset();
    listaAutor();
    document.querySelector("#btnInc").addEventListener("click", () => {
        let form = document.querySelector("#frmAutor");
        postForm(`${BASEURL}/autor/addAutor`,form).then(res=>{
            alert(res.data.texto);
            if(res.data.codigo == "1"){
                reset();
                listaAutor();
            }
        })
    });

    document.querySelector("#btnSave").addEventListener("click", () => {
        let form = document.querySelector("#frmAutor");
        postForm(`${BASEURL}/autor/save`,form).then(res=>{
            alert(res.data.texto);
            if(res.data.codigo == "1"){
                reset();
                listaAutor();
            }
        })
    });

    document.querySelector("#btnCancel").addEventListener("click", () => {
        reset();
    });
})