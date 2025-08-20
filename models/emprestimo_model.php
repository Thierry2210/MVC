<?php

class Emprestimo_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertEmprestimo()
    {
        $x = file_get_contents('php://input');
        $x = json_decode($x);
        $raaluno = $x->txtraaluno;
        $livro = $x->txtlivro;
        $dataPrevista = date('Y-m-d', strtotime('+30 days'));

        $this->insert("biblioteca.emprestimo", array(
            "data" => date("Y-m-d"),
            "ra" => $raaluno
        ));

        $numeroempre = $this->db->lastInsertId();

        $result = $this->insert("biblioteca.emprestimolivro", array(
            "emprestimo" => $numeroempre,
            "livro" => $livro,
            "dataprevistadev" => $dataPrevista
        ));

        if ($result) {
            $msg = array("codigo" => 1, "texto" => "Registro inserido com sucesso.");
        } else {
            $msg = array("codigo" => 0, "texto" => "Erro ao inserir");
        }
        echo json_encode($msg);
    }

    public function selectLivro()
    {
        $result = $this->select("select codigo,titulo from biblioteca.livro order by titulo");
        $result = json_encode($result);
        echo ($result);
    }
}
