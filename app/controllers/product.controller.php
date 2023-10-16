<?php
require_once './app/models/product.model.php';
require_once './app/views/product.view.php';

class productController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new productModel();
        $this->view = new productView();
        
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
}