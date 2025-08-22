<?php

class Devolucao extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view = new View;
        $this->view->js = array('devolucao/devolucao.js');
    }

    function index()
    {
        $this->view->title = 'Manutenção de Devolucao';
        $this->view->render('header');
        $this->view->render('devolucao/index');
        $this->view->render('footer');
    }

    function addDevolucao()
    {
        $this->model->insertDevolucao();
    }

    function listaDevolucao()
    {
        $this->model->listaDevolucao();
    }

    function selectLivro()
    {
        $this->model->selectLivro();
    }
}
