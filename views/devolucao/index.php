<main class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="container" style="max-width: 1000px;">
        <div class="card shadow-sm rounded-4 p-4">
            <div class="row">
                <form name="frmDevolucao" id="frmDevolucao">
                    <div class="text-center mb-4 p-3">
                        <div class="row justify-content-center">
                            <h3 class="text-center mb-4">Devolução de Livros</h3>
                            <div class="mb-4 col-md-3">
                                <label for="txtra" class="form-label">RA Aluno</label>
                                <div class="d-flex gap-2">
                                    <input type="text" name="txtra" id="txtra" class="form-control">
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-secondary" id="btnBusc"
                                        data-bs-toggle="modal" data-bs-target="#modalLivros">
                                        Buscar
                                    </button>
                                </div>
                            </div>

                            <div class="modal fade" id="modalLivros" tabindex="-1" aria-labelledby="modalLivrosLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content rounded-4 shadow">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLivrosLabel">Livros Emprestados</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-muted">Selecione os livros que deseja devolver:</p>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover align-middle">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>Selecionar</th>
                                                            <th>Livro</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="lslivrosemprestados" class="mt-4"></tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="btnInc" class="btn btn-primary" data-bs-dismiss="modal">
                                                Devolver
                                            </button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        </div>
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