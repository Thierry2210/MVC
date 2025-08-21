<?php

class Devolucao_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertDevolucao()
    {
        $livro = $_POST["livro"] ?? null;
        $ra = $_POST["ra"] ?? null;

        if (!$livro || !$ra) {
            echo json_encode(["codigo" => 0, "texto" => "RA ou Livro não informado."]);
            return;
        }

        $sql = "SELECT e.numero, e.data
              FROM biblioteca.emprestimo e, biblioteca.emprestimolivro el
             WHERE e.numero = el.emprestimo
               AND e.ra = :ra
               AND el.livro = :livro";

        $emprestimo = $this->select($sql, [":ra" => $ra, ":livro" => $livro]);

        if (!$emprestimo) {
            echo json_encode(["codigo" => 0, "texto" => "Empréstimo não encontrado para este RA/livro."]);
            return;
        }

        $sql = "SELECT COUNT(*) 
            FROM biblioteca.devolucao d
            WHERE d.emprestimo = :emprestimo AND d.livro = :livro";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':emprestimo', $emprestimo[0]['numero'], PDO::PARAM_INT);
        $stmt->bindParam(':livro', $livro, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->fetchColumn() > 0) {
            $msg = array(["codigo" => 0, "texto" => "Este livro já foi devolvido."]);
            echo json_encode($msg);
            return;
        }

        $emprestimo = $emprestimo[0];

        $dataEmprestimo = new DateTime($emprestimo['data']);
        $dataHoje = new DateTime();
        $dias = $dataEmprestimo->diff($dataHoje)->days;

        $multa = 0;
        if ($dias > 30) {
            $multa = ($dias - 30) * 1.15;
        }

        $result = $this->insert("biblioteca.devolucao", array("emprestimo" => $emprestimo["numero"], "livro" => $livro, "datadevolucao" => date("Y-m-d"), "multa" => $multa));
        if ($result) {
            $msg = array("codigo" => 1, "texto" => "Devolução feita com sucesso.");
        } else {
            $msg = array("codigo" => 0, "texto" => "Erro ao inserir devolução");
        }
        echo (json_encode($msg));
    }

    public function selectLivro()
    {
        $ra = $_POST["ra"] ?? null;
        $sql = "SELECT 
            l.titulo
        FROM 
            biblioteca.emprestimo e,
            biblioteca.emprestimolivro el,
            biblioteca.aluno a,
            biblioteca.livro l  
        WHERE
            e.ra = a.ra
            and e.numero = el.emprestimo
            and el.livro = l.codigo 
            and a.ra = :ra";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':ra', $ra, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo (json_encode(["data", $result]));
    }
}
