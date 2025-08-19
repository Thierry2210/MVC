<?php

class Emprestimo_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listaEmprestimo()
    {
        $sql = "select numero,data,ra from biblioteca.emprestimo order by numero";
        $result = $this->select($sql);
        echo (json_encode($result));
    }

    public function insertEmprestimo()
    {
        $x = file_get_contents('php://input');
        $x = json_decode($x);
        $numeroempre = $x->txtnumeroempre;
        $dataprevi = $x->txtdataprevi;
        $raaluno = $x->txtraaluno;

        $result = $this->insert("biblioteca.emprestimo", array("numero" => $numeroempre, "dataprevistadev" => $dataprevi, "ra" => $raaluno));
        if ($result) {
            $msg = array("codigo" => 1, "texto" => "Registro inserido com sucesso.");
        } else {
            $msg = array("codigo" => 0, "texto" => "Erro ao inserir");
        }
        echo (json_encode($msg));
    }

    public function delEmprestimo()
    {
        $numeroempre = (int)$_GET["id"];
        $msg = array("codigo" => 0, "texto" => "Erro ao excluir.");
        if ($numeroempre > 0) {
            $result = $this->delete("biblioteca.emprestimo", "numero='$numeroempre'");
            if ($result) {
                $msg = array("codigo" => 1, "texto" => "Registro excluído com sucesso.");
            }
        }
        echo (json_encode($msg));
    }


    public function loadData($id)
    {
        $numero = (int)$id;
        $result = $this->select("select * from biblioteca.emprestimo where numero=:numero", array(":numero" => $numero));
        $result = json_encode($result);
        echo ($result);
    }

    public function save()
    {
        $x = file_get_contents("php://input");
        $x = json_decode($x);
        $numeroempre = (int)$x->txtnumeroempre;
        $dataprevi = $x->txtdataprevi;
        $raaluno = $x->txtraaluno;
        $msg = array("codigo" => 0, "texto" => "Erro ao atualizar.");
        if ($numeroempre > 0) {
            $dadosSave = array("dataprevistadev" => $dataprevi, "ra" => $raaluno);
            $result = $this->update("biblioteca.emprestimo", $dadosSave, "numero='$numeroempre'");
            if ($result) {
                $msg = array("codigo" => 1, "texto" => "Registro atualizado com sucesso.");
            }
        }
        echo (json_encode($msg));
    }

    public function selectLivro()
    {
        $result = $this->select("select codigo,titulo from biblioteca.livro order by titulo");
        $result = json_encode($result);
        echo ($result);
    }
}
