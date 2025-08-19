<?php

class Devolucao_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listaDevolucao()
    {
        $sql = "select * from biblioteca.devolucao order by emprestimo";
        $result = $this->select($sql);
        echo (json_encode($result));
    }

    public function insertDevolucao()
    {
        $x = file_get_contents('php://input');
        $x = json_decode($x);
        $emprestimo = $x->txtemprestimo;
        $txtlivro = $x->txttxtlivro;
        $txtdatadev = $x->txttxtdatadev;
        $txtmulta = $x->txtmulta;

        $result = $this->insert("biblioteca.devolucao", array("emprestimo" => $emprestimo, "livro" => $txtlivro, "datadevolucao" => $txtdatadev, "multa" => $txtmulta));
        if ($result) {
            $msg = array("codigo" => 1, "texto" => "Registro inserido com sucesso.");
        } else {
            $msg = array("codigo" => 0, "texto" => "Erro ao inserir");
        }
        echo (json_encode($msg));
    }

    public function delDevolucao()
    {
        $emprestimo = (int)$_GET["id"];
        $msg = array("codigo" => 0, "texto" => "Erro ao excluir.");
        if ($emprestimo > 0) {
            $result = $this->delete("biblioteca.devolucao", "emprestimo='$emprestimo'");
            if ($result) {
                $msg = array("codigo" => 1, "texto" => "Registro excluído com sucesso.");
            }
        }
        echo (json_encode($msg));
    }


    public function loadData($id)
    {
        $emprestimo = (int)$id;
        $result = $this->select("select * from biblioteca.devolucao where emprestimo=:emprestimo", array(":emprestimo" => $emprestimo));
        $result = json_encode($result);
        echo ($result);
    }

    public function save()
    {
        $x = file_get_contents("php://input");
        $x = json_decode($x);
        $emprestimo = (int)$x->txtemprestimo;
        $txtlivro = $x->txttxtlivro;
        $txtdatadev = $x->txttxtdatadev;
        $txtmulta = $x->txtmulta;
        $msg = array("codigo" => 0, "texto" => "Erro ao atualizar.");
        if ($emprestimo > 0) {
            $dadosSave = array("livro" => $txtlivro, "datadevolucao" => $txtdatadev, "multa" => $txtmulta);
            $result = $this->update("biblioteca.devolucao", $dadosSave, "emprestimo='$emprestimo'");
            if ($result) {
                $msg = array("codigo" => 1, "texto" => "Registro atualizado com sucesso.");
            }
        }
        echo (json_encode($msg));
    }

    public function selectLivro()
    {
        $result = $this->select("SELECT 
    el.emprestimo, 
    (SELECT l.titulo 
       FROM biblioteca.livro l 
      WHERE l.codigo = el.livro) AS livro
FROM biblioteca.emprestimolivro el
ORDER BY el.emprestimo");
        $result = json_encode($result);
        echo ($result);
    }
}
