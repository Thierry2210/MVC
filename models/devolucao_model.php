<?php

class Devolucao_model extends Model
{
    public function __construct()
    {
        parent::__construct();
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

$dataEmprestimo = new DateTime($resultado['data']);
$dataHoje = new DateTime();
$dias = $dataEmprestimo->diff($dataHoje)->days;

$multa = 0;
if ($dias > 30) {
    $multa = ($dias - 30) * 1.15;
}

echo json_encode([
    "codigo" => 1,
    "emprestimo" => $resultado['emprestimo'],
    "dias" => $dias,
    "multa" => $multa
]);
