<?php
require_once './app/models/authModel.php';
require_once './app/views/authView.php';

class authController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new authModel();
        $this->view = new authView();
        
    }
    public function showCrearCuenta(){
        $this->view->viewCrearCuenta();
    }
}