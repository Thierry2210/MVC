<?php

class Autor extends Controller {
    function __construct()
    {
        parent::__construct();
        $this->view = new View;
        $this->view->js = array ('autor/autor.js');
    }

    function index() {
        $this->view->title = 'Manutenção de Autores';
		$this->view->render('header');
        $this->view->render('autor/index');
		$this->view->render('footer');
    }

    function addAutor() {
        $this->model->insertAutor();
    }

    function listaAutor() {
        $this->model->listaAutor();
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