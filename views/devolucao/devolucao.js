function reset() {
    document.querySelector('#frmDevolucao').reset();
    document.querySelector('#lslivrosemprestados').innerHTML = "";
}

function selectLivro() {
    document.querySelector("#lslivrosemprestados");
    postForm(`${BASEURL}/devolucao/selectLivro`)
        .then(res => {
            var txt = "";
            for (var i = 0; i < res.data.length; i++) {
                var reg = res.data[i];
                txt += ` <tr>
                        <td>
                            <input type="checkbox" name="livros[]" value="${reg.emprestimo}" class="form-check-input">
                        </td>
                        <td>${reg.livro}</td>
                    </tr>`;
            }
            document.querySelector('#lslivrosemprestados').innerHTML = txt;
        });
}

document.addEventListener('DOMContentLoaded', () => {
    reset();
    document.querySelector("#btnBusc").addEventListener("click", () => {
        selectLivro();
    });
    document.querySelector("#btnInc").addEventListener("click", () => {
        let checkboxes = document.querySelectorAll("input[name='livros[]']:checked");
        if (checkboxes.length === 0) {
            alert("Selecione pelo menos um livro para devolver.");
            return;
        }

        let livrosSelecionados = [];
        checkboxes.forEach(cb => livrosSelecionados.push(cb.value));

        let payload = {
            txtra: document.querySelector("#txtra").value,
            livros: livrosSelecionados
        };

        postForm(`${BASEURL}/devolucao/addDevolucao`, payload).then(res => {
            alert(res.data.texto);
            if (res.data.codigo == "1") {
                reset();
            }
        });
    });

})