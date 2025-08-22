function loadData(numero) {
    postForm(`${BASEURL}/livro/loadData/${numero}`)
        .then(res => {
            if (res.data.length > 0) {
                var txtcodlivro = document.querySelector('#txtcodlivro');
                var txtisbn = document.querySelector('#txtisbn');
                var txttitlivro = document.querySelector('#txttitlivro');
                var txtedlivro = document.querySelector('#txtedlivro');
                var txtvallivro = document.querySelector('#txtvallivro');
                txtcodlivro.value = res.data[0].codigo;
                txtisbn.value = res.data[0].isbn;
                txttitlivro.value = res.data[0].titulo;
                txtedlivro.value = res.data[0].edicao;
                txtvallivro.value = res.data[0].valor;
                txtcodlivro.readOnly = true;
                showEdit();
            }
        });
}

function delData(id) {
    if (confirm("Confirma a Exclusão do Livro?")) {
        var params = { id: id };
        deleteItem(`${BASEURL}/livro/delLivro`, params)
            .then(res => {
                alert(res.data.texto);
                if (res.data.codigo == "1") {
                    reset();
                    listaLivro();
                }
            })
    }
}

function listaLivro() {
    document.querySelector('#lslivro').innerHTML = 'Carregando...';
    postForm(`${BASEURL}/livro/listaLivro`)
        .then(res => {
            var txt = "";
            for (var i = 0; i < res.data.length; i++) {
                var reg = res.data[i];
                var bEdit = `<a href="javascript:void(0)" onclick="loadData(${reg.codigo})"><i class="bx bx-edit"></i></a>`;
                var bDel = `<a href="javascript:void(0)" onclick="delData(${reg.codigo})"><i class="bx bx-trash"></i></a>`;
                txt += `<tr>
                    <td>${reg.codigo}</td><td>${reg.isbn}</td><td>${reg.titulo}</td><td>${reg.edicao}</td><td>${reg.valor}</td><td>${reg.autor}</td><td>${bEdit}${bDel}</td>
                </tr>`;
            }
            document.querySelector('#lslivro').innerHTML = txt;
        });
}


function reset() {
    document.querySelector('#frmLivro').reset();
    hideEdit();
}

function selectAutor() {
    document.querySelector("#txtnomeautor");
    postForm(`${BASEURL}/livro/selectAutor`)
        .then(res => {
            var txt = "<option selected>Selecione um autor</option>";
            for (var i = 0; i < res.data.length; i++) {
                var reg = res.data[i];
                txt += `<option value="${reg.codigo}">${reg.nome}</option>`;
            }
            document.querySelector('#txtnomeautor').innerHTML = txt;
        });
}

document.addEventListener('DOMContentLoaded', () => {
    reset();
    listaLivro();
    selectAutor();
    document.querySelector("#btnInc").addEventListener("click", () => {
        let form = document.querySelector("#frmLivro");
        postForm(`${BASEURL}/livro/addLivro`, form).then(res => {
            alert(res.data.texto);
            if (res.data.codigo == "1") {
                reset();
                listaLivro();
            }
        })
    });

    document.querySelector("#btnSave").addEventListener("click", () => {
        let form = document.querySelector("#frmLivro");
        postForm(`${BASEURL}/livro/save`, form).then(res => {
            alert(res.data.texto);
            if (res.data.codigo == "1") {
                reset();
                listaLivro();
            }
        })
    });

    document.querySelector("#btnCancel").addEventListener("click", () => {
        reset();
    });
})