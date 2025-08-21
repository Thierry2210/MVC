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

function dataPrevista() {
    document.querySelector('#lsdataprevista').innerHTML = 'Carregando...';
    const dataPrevista = new Date();
    dataPrevista.setDate(dataPrevista.getDate() + 30); var txt = "";
    txt += `<div class="mb-3">
                            <div class="alert alert-warning mt-2" role="alert">
                                ⚠️ Após 30 dias do prazo, será aplicada uma multa de <strong>R$ 1,50 por dia</strong> de atraso.
                            </div>
                        </div>`
    document.querySelector('#lsdataprevista').innerHTML = txt;
}

function reset() {
    document.querySelector("#frmEmprestimo").reset();
}

document.addEventListener('DOMContentLoaded', () => {
    reset();
    selectLivro();

    document.querySelector("#btnInc").addEventListener("click", () => {
        dataPrevista();
        let form = document.querySelector("#frmEmprestimo");
        postForm(`${BASEURL}/emprestimo/addEmprestimo`, form).then(res => {
            alert(res.data.texto);
            if (res.data.codigo == "1") {
                reset();
                let numeroEmpre = document.querySelector("#txtnumeroempre").value;
                let livro = document.querySelector("#txtlivro").value;

                postForm(`${BASEURL}/emprestimo/addEmprestimoLivro`, {
                    txtnumeroempre: numeroEmpre,
                    txtlivro: livro
                }).then(res2 => {
                    alert(res2.data.texto);
                    reset();
                })
            }
        })
    });
})