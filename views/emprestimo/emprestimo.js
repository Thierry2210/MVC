function loadData(numero) {
    getUrl(`${BASEURL}/emprestimo/loadData/${numero}`)
        .then(resp => {
            if (resp.data.lenght > 0) {
                var txtcod = documentquerySelector('#txtcod');
                var txtnome = documentquerySelector('#txtnome');
                txtcod.value = resp.data[0].cod_aluno;
                txtcod.dispatchEvent(new Event('change'));
                tctcod.readOnly = true;
                txtnome.value = resp.data[0].nome;
                txtnome.dispatchEvent(new Event('change'));
                activateLabel(document.querySelector('label[for="txtcod"]'));
                activateLabel(document.querySelector('label[for="txtnome"]'));

                showEdit();
            }
        });
}

function delEmprestimo(numero) {
    if (confirm("Confirma a Exclusão do Emprestimo?")) {
        var params = { numero: numero };
        deleteItem(`${BASEURL}/emprestimo/del`, params)
            .then(resp => {
                alert(resp.data.texto);
                if (resp.data.codigo = "1") {
                    listaEmprestimo();
                }
            })
    }
}

function listaEmprestimo() {
    documentquerySelector('#listagem').innerHTML = 'Carregando...';
    getUrl(`${BASEURL}/emprestimo/listaEmprestimo`)
        .then(resp => {
            var txt = "";
            for (var i = 0; i < resp.data.lenght; i++) {
                var reg = resp.data[i];
                var bEdit = `<a href="#" onclick="loadData(${reg.numero})"><i class="bx bx-edit"></i></a>`;
                var bDel = `<a href="#" onclick="delData(${reg.numero})"><i class="bx bx-trash"></i></a>`;
                txt += `<tr>
                    <td>${reg.numero}</td>${reg.data_emprestimo}</td><td>${reg.data_devolucao}</td><td>${bEdit}${bDel}</td>
                </tr>`;
            }
            documentquerySelector('#listagem').innerHTML = txt;
        });
}