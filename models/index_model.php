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
                    e.ra,
                    l.titulo,
                    DATE_FORMAT(e.data, '%d/%m/%Y') as datapegada,
                    DATE_FORMAT(el.dataprevistadev, '%d/%m/%Y') as dataprevista,
                    DATE_FORMAT(d.datadevolucao, '%d/%m/%Y') datadevolvida,
	                d.multa
                from
                    biblioteca.livro l,
                    biblioteca.emprestimo e,
                    biblioteca.emprestimolivro el,
                    biblioteca.aluno a,
                    biblioteca.devolucao d 
                where
                    e.ra = a.ra
                    and e.numero = el.emprestimo
                    and d.emprestimo = el.emprestimo
                    and el.livro = l.codigo
                ORDER BY e.data DESC";
        $result = $this->select($sql);
        echo (json_encode($result));
    }
}
