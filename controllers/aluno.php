<?php

class Aluno extends Controller {
    function __construct()
    {
        parent::__construct();
        $this->view = new View;
        $this->view->js = array ('aluno/aluno.js');
    }

    function index() {
        $this->view->title = 'Manutenção de Alunos';
		$this->view->render('header');
        $this->view->render('aluno/index');
		$this->view->render('footer');
    }

    function addAluno() {
        $this->model->insertAluno();
    }

    function listaAluno() {
        $this->model->listaAluno();
    }

    function del() {
        $this->model->del();
    }

    function loadData($id) {
        $this->model->loadData($id);
    }

    function save() {
        $this->model->save();
    }
}