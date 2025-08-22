function reset() {
    document.querySelector('#frmDevolucao').reset();
    document.querySelector('#livroSelecionado').innerHTML = "";
}


function selectLivro() {
    const ra = document.querySelector("#txtra").value;
    fetch(`${BASEURL}/devolucao/selectLivro`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',  // Especifica que estamos enviando JSON
        },
        body: JSON.stringify({ ra: ra }),  // Envia o RA como JSON
    })
        .then(response => response.json())  // Converte a resposta em JSON
        .then(res => {
            var txt = "<option selected>Selecione um livro</option>";
            for (var i = 0; i < res.data.length; i++) {
                var reg = res.data[i];
                txt += `<option value="${reg.codigo}">${reg.titulo}</option>`;
            }
            document.querySelector('#livroSelecionado').innerHTML = txt;
        });
}

document.addEventListener('DOMContentLoaded', () => {
    reset();

    document.querySelector("#btnBusc").addEventListener("click", () => {
        selectLivro();
    });

    document.querySelector("#btnInc").addEventListener("click", () => {
        const form = document.querySelector("#frmDevolucao");
        const formData = new FormData(form);

        formData.set("livro", document.querySelector("#livroSelecionado").value);

        fetch(`${BASEURL}/devolucao/addDevolucao`, {
            method: "POST",
            body: formData
        })
            .then(response => response.json())
            .then(res => {
                console.log(res);
                if (res.codigo == 1) {
                    alert(res.texto);
                }
            });
    });
})
