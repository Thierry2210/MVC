<?php

class Emprestimo extends Controller {
    function __construct()
    {
        parent::__construct();
        $this->view = new View;
        $this->view->js = array ('emprestimo/emprestimo.js');
    }

    function index() {
        $this->view->title = 'Manutenção de Emprestimos';
		$this->view->render('header');
        $this->view->render('emprestimo/index');
		$this->view->render('footer');
    }

    function addEmprestimo() {
        $this->model->insertEmprestimo();
    }

    function listaEmprestimo() {
        $this->model->listaEmprestimo();
    }

    function delEmprestimo() {
        $this->model->delEmprestimo();
    }

    function loadData($id) {
        $this->model->loadData($id);
    }

    function save() {
        $this->model->save();
    }

    function selectLivro() {
        $this->model->selectLivro();
    }

}