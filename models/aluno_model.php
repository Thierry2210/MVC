<?php

class Aluno_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listaAluno()
    {
        $sql = "select ra,nome from biblioteca.aluno order by ra";
        $result = $this->select($sql);
        echo (json_encode($result));
    }

    public function insertAluno()
    {
        $x = file_get_contents('php://input');
        $x = json_decode($x);
        $raaluno = $x->txtraaluno;
        $nomealuno = $x->txtnomealuno;

        $result = $this->insert("biblioteca.aluno", array("ra" => $raaluno, "nome" => $nomealuno));
        if ($result) {
            $msg = array("codigo" => 1, "texto" => "Registro inserido com sucesso.");
        } else {
            $msg = array("codigo" => 0, "texto" => "Erro ao inserir");
        }
        echo (json_encode($msg));
    }

    public function delAluno()
    {
        $raaluno = (int)$_GET["id"];
        $msg = array("codigo" => 0, "texto" => "Erro ao excluir.");
        if ($raaluno > 0) {
            $result = $this->delete("biblioteca.aluno", "ra='$raaluno'");
            if ($result) {
                $msg = array("ra" => 1, "texto" => "Registro exluído com sucesso.");
            }
        }
        echo (json_encode($msg));
    }

    public function loadData($id)
    {
        $ra = (int)$id;
        $result = $this->select("select ra,nome from biblioteca.aluno where ra=:ra", array(":ra" => $ra));
        $result = json_encode($result);
        echo ($result);
    }

    public function save()
    {
        $x = file_get_contents("php://input");
        $x = json_decode($x);
        $raaluno = (int)$x->txtraaluno;
        $nomealuno = $x->txtnomealuno;
        $msg = array("codigo" => 0, "texto" => "Erro ao atualizar.");
        if ($raaluno > 0) {
            $dadosSave = array("nome" => $nomealuno);
            $result = $this->update("biblioteca.aluno", $dadosSave, "ra='$raaluno'");
            if ($result) {
                $msg = array("codigo" => 1, "texto" => "Registro atualizado com sucesso.");
            }
        }
        echo (json_encode($msg));
    }
}
