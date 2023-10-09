<?php
require_once './app/models/product.model.php';
require_once './app/views/product.view.php';

class TaskController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new TaskModel();
        $this->view = new TaskView();
        
    }
    public function homeController(){
        require 'templates/header.phtml';
        require 'templates/footer.phtml';
    }
    public function errorController(){
        $this->view->showError();
    }
    public function showProducts(){
        $productos = $this->model->getProducts();
        $this->view->showProducts($productos);
    }
}