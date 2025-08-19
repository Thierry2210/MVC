function loadData(numero) {
    postForm(`${BASEURL}/emprestimo/loadData/${numero}`)
        .then(res => {
            if (res.data.length > 0) {
                var txtnumeroempre = document.querySelector('#txtnumeroempre');
                var txtraaluno = document.querySelector('#txtraaluno');
                var txtdataprevi = document.querySelector('#txtdataprevi');
                txtnumeroempre.value = res.data[0].numero;
                txtraaluno.value = res.data[0].ra;
                txtdataprevi.value = res.data[0].data;
                txtnumeroempre.readOnly = true;
                showEdit();
            }
        });
}

function delData(id) {
    if (confirm("Confirma a Exclusão do Emprestimo?")) {
        var params = { id: id };
        deleteItem(`${BASEURL}/emprestimo/delEmprestimo`, params)
            .then(res => {
                alert(res.data.texto);
                if (res.data.codigo == "1") {
                    reset();
                    listaEmprestimo();
                }
            })
    }
}

// function listaEmprestimo() {
//     document.querySelector('#lsempre').innerHTML = 'Carregando...';
//     postForm(`${BASEURL}/emprestimo/listaEmprestimo`)
//         .then(res => {
//             var txt = "";
//             for (var i = 0; i < res.data.length; i++) {
//                 var reg = res.data[i];
//                 var bEdit = `<a href="javascript:void(0)" onclick="loadData(${reg.numero})"><i class="bx bx-edit"></i></a>`;
//                 var bDel = `<a href="javascript:void(0)" onclick="delData(${reg.numero})"><i class="bx bx-trash"></i></a>`;
//                 txt += `<tr>
//                     <td>${reg.numero}</td><td>${reg.data}</td><td>${reg.ra}</td><td>${bEdit}${bDel}</td>
//                 </tr>`;
//             }
//             document.querySelector('#lsempre').innerHTML = txt;
//         });
// }

function selectLivro() {
    document.querySelector("#txtlivro");
     postForm(`${BASEURL}/emprestimo/selectLivro`)
        .then(res => {
            var txt = "<option selected>Selecione um livro</option>"; 
            for (var i = 0; i < res.data.length; i++) {
                var reg = res.data[i];
                txt += `<option value="${reg.codigo}">${reg.titulo}</option>`;
            }
            document.querySelector('#txtlivro').innerHTML = txt;
        });
}

document.addEventListener('DOMContentLoaded', () => {
    selectLivro();
    // listaEmprestimo();
    document.querySelector("#btnInc").addEventListener("click", () => {
        let form = document.querySelector("#frmEmprestimo");
        postForm(`${BASEURL}/emprestimo/addEmprestimo`, form).then(res => {
            alert(res.data.texto);
            if (res.data.codigo == "1") {
                reset();
                listaEmprestimo();
            }
        })
    });
})