<main class="mt-5 mb-5">
    <div class="container">
        <div class="card shadow-sm rounded-4 p-4">
            <form name="frmAutor" id="frmAutor">
                <div class="mb-4 p-3">
                    <input type="hidden" id="txtcodautor" name="txtcodautor" value="">
                    <div class="mb-4 col-md-4">
                        <label for="txtnomeautor" class="form-label fw-semibold">Nome do Autor</label>
                        <input type="text" id="txtnomeautor" name="txtnomeautor" class="form-control" placeholder="Digite o nome do autor">
                    </div>
                    <div class="d-flex gap-2 mb-6">
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
            <table class="table table-hover align-middle" id="tabres">
                <thead class="table-light">
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody id="lsautor"></tbody>
            </table>
        </div>
    </div>
</main>