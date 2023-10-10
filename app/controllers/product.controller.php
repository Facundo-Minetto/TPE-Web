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
        $this->view->viewHome();
    }
    public function errorController(){
        $this->view->showError();
    }
    public function showProducts(){
        $products = $this->model->getProducts();
        $categorys = $this->model->getCategorys();
        $this->view->showProducts($products, $categorys);
    }
    public function showCategorys(){
        $categorys = $this->model->getCategorys();
        $this->view->viewCategorys($categorys);
    }
    public function showProductsByCategory($id){
        $products = $this->model->getProductsByCategory($id);
        $this->view->viewProductsByCategory($products);
    }
}