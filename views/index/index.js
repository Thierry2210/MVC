function listaPrincipal() {
    document.querySelector('#lsindex').innerHTML = 'Carregando...';
    postForm(`${BASEURL}/index/listaPrincipal`)
        .then(res => {
            var txt = "";
            for (var i = 0; i < res.data.length; i++) {
                var reg = res.data[i];
                txt += `<tr>
                        <td>${reg.ra}</td><td>${reg.titulo}</td><td>${reg.data}</td><td>${reg.dataprevistadev}</td><td>${reg.datadevolucao}</td><td>${reg.multa}</td>
                </tr>`;
            }
            document.querySelector('#lsindex').innerHTML = txt;
        });
}

function reset() {
    document.querySelector('#frmHistorico').reset();
}

document.addEventListener('DOMContentLoaded', () => {
    reset();
    listaPrincipal();
})