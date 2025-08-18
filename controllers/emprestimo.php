<?php

class Emprestimo extends Controller {

    function __construct() {
        parent::__construct();
        $this->view = new View(); // Correctly define $view
        $this->view->js = array('emprestimo/js/emprestimo.js');
    }
    
    function index() {
        $this->view->title = 'HOME';
		$this->view->render('header');
        $this->view->render('emprestimo/index');
		$this->view->render('footer');
    }
    
    function addEmprestimo() {
        $this->model->insert();
    }

    function listaEmprestimo() {
        $this->model->insert();
    }

    function delEmprestimo() {
        $this->model->insert();
    }
}