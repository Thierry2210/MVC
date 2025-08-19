<main class="mt-5 mb-5">
    <div class="container">
        <div class="card shadow-sm rounded-4 p-4">
            <form name="frmDevolucao" id="frmDevolucao">
                <div class="mb-4 p-3">
                    <div class="row justify-content-center">
                        <h3 class=" text-center mb-4">Devolução de Lviros</h3>
                        <div class="mb-4 col-md-4">
                            <input type="hidden" id="txtnumemprestimo" name="txtnumemprestimo" value="">
                            <label for="txtlivro" class="form-label fw-semibold">Livro</label>
                            <select id="txtlivro" name="txtlivro" class="form-select"></select>
                        </div>
                        <div class="mb-4 col-md-3">
                            <label for="txtdatadev" class="form-label fw-semibold">Data para Devolver</label>
                            <input type="date" id="txtdatadev" name="txtdatadev" class="form-control">
                        </div>
                        <input type="hidden" id="txtmulta" name="txtmulta" class="form-control" placeholder="">
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
                </div>
            </form>
        </div>
        <br>
        <div class="card shadow-sm rounded-4 p-4">
            <table class="table table-hover align-middle" id="tabres">
                <thead class="table-light">
                    <tr>
                        <th>Empréstimo</th>
                        <th>Livro</th>
                        <th>Data Devolução</th>
                        <th>Multa</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody id="lsdevolucao"></tbody>
            </table>
        </div>
    </div>
</main>