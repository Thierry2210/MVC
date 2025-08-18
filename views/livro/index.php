<main class="mt-5 mb-5">
    <div class="container">
        <div class="card shadow-sm rounded-4 p-4">
            <form name="frmLivro" id="frmLivro">
                <div class="mb-4 p-3">
                    <input type="hidden" id="txtcodlivro" name="txtcodlivro" value="">
                    <div class="row row-col-4">
                        <div class="mb-4 col-md-4">
                            <label for="txtisbn" class="form-label fw-semibold">ISBN</label>
                            <input type="text" id="txtisbn" name="txtisbn" class="form-control" placeholder="Digite o ISBN do livro" onkeypress="return (event.charCode = 13)">
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="txttitlivro" class="form-label fw-semibold">Título</label>
                            <input type="text" id="txttitlivro" name="txttitlivro" class="form-control" placeholder="Digite o nome do autor">
                        </div>
                    </div>
                    <div class="row row-col-4">
                        <div class="mb-4 col-md-4">
                            <label for="txtedlivro" class="form-label fw-semibold">Edição</label>
                            <input type="text" id="txtedlivro" name="txtedlivro" class="form-control" placeholder="Digite o nome do autor">
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="txtvallivro" class="form-label fw-semibold">Valor</label>
                            <div class="input-group mb-2">
                                <label for="" class="input-group-text">R$</label>
                                <input type="text" id="txtvallivro" name="txtvallivro" class="form-control" aria-label="Amount (to the nearest real)">
                            </div>

                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="txtnomeautor" class="form-label fw-semibold">Autor</label>
                            <select id="txtnomeautor" name="txtnomeautor" class="form-select"></select>
                        </div>
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
                        <th>ISBN</th>
                        <th>Titulo</th>
                        <th>Edição</th>
                        <th>Valor</th>
                        <th>Autor</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody id="lslivro"></tbody>
            </table>
        </div>
    </div>
</main>