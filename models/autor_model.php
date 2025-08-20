<?php

class Autor_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listaAutor()
    {
        $sql = "select * from biblioteca.autor order by codigo";
        $result = $this->select($sql);
        echo (json_encode($result));
    }

    public function insertAutor()
    {
        $x = file_get_contents('php://input');
        $x = json_decode($x);
        $codautor = $x->txtcodautor;
        $nomeautor = $x->txtnomeautor;

        $result = $this->insert("biblioteca.autor", array("codigo" => $codautor, "nome" => $nomeautor));
        if ($result) {
            $msg = array("codigo" => 1, "texto" => "Registro inserido com sucesso.");
        } else {
            $msg = array("codigo" => 0, "texto" => "Erro ao inserir");
        }
        echo (json_encode($msg));
    }

    public function del()
    {
        $codautor = (int)$_GET["id"];
        $msg = array("codigo" => 0, "texto" => "Erro ao excluir.");
        if ($codautor > 0) {
            $result = $this->delete("biblioteca.autor", "codigo='$codautor'");
            if ($result) {
                $msg = array("codigo" => 1, "texto" => "Registro exluído com sucesso.");
            }
        }
        echo (json_encode($msg));
    }

    public function loadData($id)
    {
        $cod = (int)$id;
        $result = $this->select("select * from biblioteca.autor where codigo=:cod", array(":cod" => $cod));
        $result = json_encode($result);
        echo ($result);
    }

    public function save()
    {
        $x = file_get_contents("php://input");
        $x = json_decode($x);
        $codautor = (int)$x->txtcodautor;
        $nomeautor = $x->txtnomeautor;
        $msg = array("codigo" => 0, "texto" => "Erro ao atualizar.");
        if ($codautor > 0) {
            $dadosSave = array("nome" => $nomeautor);
            $result = $this->update("biblioteca.autor", $dadosSave, "codigo='$codautor'");
            if ($result) {
                $msg = array("codigo" => 1, "texto" => "Registro atualizado com sucesso.");
            }
        }
        echo (json_encode($msg));
    }
}
