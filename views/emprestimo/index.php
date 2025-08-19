<main class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="container" style="max-width: 1000px;">
        <div class="card shadow-sm rounded-4 p-4">
            <div class="row">
                <form name="frmEmprestimo" id="frmEmprestimo">
                    <h3 class="text-center mb-4">Empréstimo de Livros</h3>
                    <div class="row justify-content-center">
                        <div class="mb-3 col-md-3">
                            <input type="hidden" id="txtnumeroempre" name="txtnumeroempre" value="">
                            <label class="form-label fw-semibold">RA</label>
                            <input type="text" id="txtraaluno" name="txtraaluno" class="form-control" placeholder="Digite o RA do aluno">
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label">Livro</label>
                            <select name="txtlivro" id="txtlivro" class="form-select"></select>
                        </div >
                        <div class="mb-3 col-md-3">
                            <label class="form-label fw-semibold">Data</label>
                            <input type="date" id="txtdataprevi" name="txtdataprevi" class="form-control">
                        </div>
                        <div class="text-center mt-3">
                            <button type="button" class="btn btn-primary" id="btnInc">Incluir</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>