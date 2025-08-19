<main class="mt-5 mb-5">
    <div class="container">
        <div class="card shadow-sm rounded-4 p-4">
            <form name="frmALuno" id="frmALuno">
                <div class="mb-4 p-3">
                    <div class="row justify-content-center">
                        <h3 class="text-center mb-4">Cadastro de Alunos</h3>
                        <div class="mb-4 col-md-4">
                            <label for="txtraaluno" class="form-label fw-semibold">RA</label>
                            <input type="text" id="txtraaluno" name="txtraaluno" class="form-control" placeholder="Digite o RA do aluno" onkeypress="return (event.charCode = 13)">
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="txtnomealuno" class="form-label fw-semibold">Nome</label>
                            <input type="text" id="txtnomealuno" name="txtnomealuno" class="form-control" placeholder="Digite o nome do aluno">
                        </div>
                    </div>
                    <div class="d-flex gap-2 mb-6 justify-content-center">
                        <div id="botaocad">
                            <button type="button" class="btn btn-primary" id="btnInc">Incluir</button>
                        </div>
                        <div id="botoesedit">
                            <button type="button" name="btnSave" id="btnSave" class="btn btn-success">Gravar</button>
                            <button type="button" name="btnCancel" id="btnCancel" class="btn btn-warning">Cancelar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <br>
        <div class="card shadow-sm rounded-4 p-4">
            <h3 class="text-center mb-4">Registro Alunos</h3>
            <table class="table table-hover align-middle" id="tabres">
                <thead class="table-light">
                    <tr>
                        <th>RA</th>
                        <th>Nome</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody id="lsaluno"></tbody>
            </table>
        </div>
    </div>
</main>