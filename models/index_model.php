<?php

class Index_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listaPrincipal()
    {
        $sql = "select 
	l.titulo,
	e.data,
	el.dataprevistadev,
	d.datadevolucao,
	d.multa
from
	biblioteca.livro l,
	biblioteca.emprestimo e,
	biblioteca.emprestimolivro el,
	biblioteca.devolucao d
where
	l.codigo = el.livro
    AND e.numero = el.emprestimo
    AND d.emprestimo = el.emprestimo
ORDER BY e.data DESC";
        $result = $this->select($sql);
        echo (json_encode($result));
    }
}
