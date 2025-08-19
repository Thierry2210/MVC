function loadData(emprestimo) {
    postForm(`${BASEURL}/devolucao/loadData/${emprestimo}`)
        .then(res => {
            if (res.data.length > 0) {
                var txtnumemprestimo = document.querySelector('#txtnumemprestimo');
                var txtlivro = document.querySelector('#txtlivro');
                var txtdatadev = document.querySelector('#txtdatadev');
                var txtmulta = document.querySelector("#txtmulta");
                txtnumemprestimo.value = res.data[0].numero;
                txtlivro.value = res.data[0].ra;
                txtdatadev.value = res.data[0].data;
                txtmulta.value = res.data[0].multa;
                txtnumemprestimo.readOnly = true;
                showEdit();
            }
        });
}

function delData(id) {
    if (confirm("Confirma a Exclusão do Devolucao?")) {
        var params = { id: id };
        deleteItem(`${BASEURL}/devolucao/delDevolucao`, params)
            .then(res => {
                alert(res.data.texto);
                if (res.data.codigo == "1") {
                    reset();
                    listaDevolucao();
                }
            })
    }
}

function listaDevolucao() {
    document.querySelector('#lsdevolucao').innerHTML = 'Carregando...';
    postForm(`${BASEURL}/devolucao/listaDevolucao`)
        .then(res => {
            var txt = "";
            for (var i = 0; i < res.data.length; i++) {
                var reg = res.data[i];
                var bEdit = `<a href="javascript:void(0)" onclick="loadData(${reg.emprestimo})"><i class="bx bx-edit"></i></a>`;
                var bDel = `<a href="javascript:void(0)" onclick="delData(${reg.emprestimo})"><i class="bx bx-trash"></i></a>`;
                txt += `<tr>
                    <td>${reg.emprestimo}</td><td>${reg.livro}</td><td>${reg.datadevolucao}</td><td>${reg.multa}</td><td>${bEdit}${bDel}</td>
                </tr>`;
            }
            document.querySelector('#lsdevolucao').innerHTML = txt;
        });
}

function reset() {
    document.querySelector('#frmDevolucao').reset();
    hideEdit();
}

function selectLivro() {
    document.querySelector("#txtlivro");
     postForm(`${BASEURL}/devolucao/selectLivro`)
        .then(res => {
            var txt = "<option selected>Selecione um livro</option>"; 
            for (var i = 0; i < res.data.length; i++) {
                var reg = res.data[i];
                txt += `<option value="${reg.emprestimo}">${reg.livro}</option>`;
            }
            document.querySelector('#txtlivro').innerHTML = txt;
        });
}

document.addEventListener('DOMContentLoaded', () => {
    reset();
    listaDevolucao();
    selectLivro();
    document.querySelector("#btnInc").addEventListener("click", () => {
        let form = document.querySelector("#frmDevolucao");
        postForm(`${BASEURL}/devolucao/addDevolucao`, form).then(res => {
            alert(res.data.texto);
            if (res.data.codigo == "1") {
                reset();
                listaDevolucao();
            }
        })
    });

    document.querySelector("#btnSave").addEventListener("click", () => {
        let form = document.querySelector("#frmDevolucao");
        postForm(`${BASEURL}/devolucao/save`, form).then(res => {
            alert(res.data.texto);
            if (res.data.codigo == "1") {
                reset();
                listaDevolucao();
            }
        })
    });

    document.querySelector("#btnCancel").addEventListener("click", () => {
        reset();
    });
})