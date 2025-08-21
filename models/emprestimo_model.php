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

        $sql = "SELECT 
                count(*)
            FROM 
                biblioteca.emprestimolivro el,
                biblioteca.livro l 
            WHERE 
                el.livro = l.codigo
                and el.livro = :livro";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':livro', $livro, PDO::PARAM_STR);
        $stmt->execute();
        $numEmprestimo = $stmt->fetchColumn();
        $sql = "SELECT 
                count(*)
            FROM 
                biblioteca.devolucao d,
                biblioteca.emprestimolivro el
            WHERE 
                d.livro = el.livro
                and el.emprestimo = d.emprestimo
                and d.livro = :livro";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':livro', $livro, PDO::PARAM_STR);
        $stmt->execute();
        $qtdDevolucao = $stmt->fetchColumn();
        if ($numEmprestimo > 0 && $qtdDevolucao != $numEmprestimo) {
            $msg = array("codigo" => 0, "texto" => "Este livro já está emprestado.");
            echo json_encode($msg);
            return;
        }
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
