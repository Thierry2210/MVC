function reset() {
    document.querySelector('#frmDevolucao').reset();
    document.querySelector('#livroSelecionado').innerHTML = "";
}

function selectLivro() {
    postForm(`${BASEURL}/devolucao/selectLivro`)
        .then(res => {
            const select = document.querySelector('#livroSelecionado');
            select.innerHTML = '<option value="">Selecione um livro</option>'; // reset

            if (Array.isArray(res.data)) {
                res.data.forEach(res => {
                    const option = document.createElement('option');
                    option.value = res.livro_codigo;
                    option.textContent = res.livro;
                    select.appendChild(option);
                });
            }
        });
}

document.addEventListener('DOMContentLoaded', () => {
    reset();
    document.querySelector("#btnBusc").addEventListener("click", () => {
        selectLivro();
    });

    document.querySelector("#btnInc").addEventListener("click", () => {
        const livroSelecionado = document.querySelector("#livroSelecionado").value;
        const ra = document.querySelector("#txtra").value;

        const formData = new FormData();
        formData.append("ra", ra);
        console.log(ra);
        formData.append("livro", livroSelecionado);

        reset();
        fetch(`${BASEURL}/devolucao/addDevolucao`, {
            method: "POST",
            body: formData
        }).then(res => {
            if (res.codigo == "1") {
                alert(res.data.texto);
                reset();
            }
        });
    })
})