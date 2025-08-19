<?php

class Livro_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listaLivro()
    {
        $sql = "select codigo,isbn,titulo,edicao,valor,autor from biblioteca.livro order by codigo";
        $result = $this->select($sql);
        echo (json_encode($result));
    }

    public function insertLivro()
    {
        $x = file_get_contents('php://input');
        $x = json_decode($x);
        $codlivro = $x->txtcodlivro;
        $isbnlivro = $x->txtisbn;
        $titulolivro = $x->txttitlivro;
        $edicaolivro = $x->txtedlivro;
        $valorlivro = $x->txtvallivro;
        $autorlivro = $x->txtnomeautor;

        $result = $this->insert("biblioteca.livro", array("codigo" => $codlivro, "isbn" => $isbnlivro,"titulo" => $titulolivro, "edicao" => $edicaolivro, "valor" => $valorlivro, "autor" => $autorlivro));
        if ($result) {
            $msg = array("codigo" => 1, "texto" => "Registro inserido com sucesso.");
        } else {
            $msg = array("codigo" => 0, "texto" => "Erro ao inserir");
        }
        echo (json_encode($msg));
    }

    public function delLivro()
    {
        $codlivro = (int)$_GET["id"];
        $msg = array("codigo" => 0, "texto" => "Erro ao excluir.");
        if ($codlivro > 0) {
            $result = $this->delete("biblioteca.livro", "codigo='$codlivro'");
            if ($result) {
                $msg = array("codigo" => 1, "texto" => "Registro exluído com sucesso.");
            }
        }
        echo (json_encode($msg));
    }

    public function loadData($id)
    {
        $cod = (int)$id;
        $result = $this->select("select codigo,isbn,titulo,edicao,valor,autor from biblioteca.livro where codigo=:cod", array(":cod" => $cod));
        $result = json_encode($result);
        echo ($result);
    }

    public function save()
    {
        $x = file_get_contents("php://input");
        $x = json_decode($x);
        $codlivro = $x->txtcodlivro;
        $isbnlivro = $x->txtisbn;
        $titulolivro = $x->txttitlivro;
        $edicaolivro = $x->txtedlivro;
        $valorlivro = $x->txtvallivro;
        $autorlivro = $x->txtnomeautor;
        $msg = array("codigo" => 0, "texto" => "Erro ao atualizar.");
        if ($codlivro > 0) {
            $dadosSave = array("isbn" => $isbnlivro,"titulo" => $titulolivro, "edicao" => $edicaolivro, "valor" => $valorlivro, "autor" => $autorlivro);
            $result = $this->update("biblioteca.livro", $dadosSave, "codigo='$codlivro'");
            if ($result) {
                $msg = array("codigo" => 1, "texto" => "Registro atualizado com sucesso.");
            }
        }
        echo (json_encode($msg));
    }

    public function selectAutor() {
        $result = $this->select("select codigo,nome from biblioteca.autor order by nome");
        $result = json_encode($result);
        echo ($result);
    }
}
