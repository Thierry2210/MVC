<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        $this->view = new View(); // Add this line to define $view
        $this->view->js = array('index/js/index.js');
    }
    
    function index() {
        $this->view->title = 'HOME';
		$this->view->render('header');
        $this->view->render('index/index');
		$this->view->render('footer');
    }
    
}