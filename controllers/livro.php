<?php

class Livro extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view = new View;
        $this->view->js = array('livro/livro.js');
    }

    function index()
    {
        $this->view->title = 'Manutenção de Livros';
        $this->view->render('header');
        $this->view->render('livro/index');
        $this->view->render('footer');
    }

    function addLivro()
    {
        $this->model->insertLivro();
    }

    function listaLivro()
    {
        $this->model->listaLivro();
    }

    function del()
    {
        $this->model->del();
    }

    function loadData($id)
    {
        $this->model->loadData($id);
    }

    function save()
    {
        $this->model->save();
    }

    function selectAutor()
    {
        $this->model->selectAutor();
    }
}
