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
                        </div>
                        <input type="hidden" id="txtdata" name="txtdata" class="form-control">
                        <div class="text-center mt-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="btnInc" data-bs-target="#exampleModalCenter">Incluir</button>
                        </div>
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Data Prevista de Devolução</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="lsdataprevista"></div>
                                    </div>
                                    <div class="modal-footer text-center">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>