<?php
require_once './app/models/authModel.php';
require_once './app/views/authView.php';
require_once './app/helper/authHelper.php';

class authController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new authModel();
        $this->view = new authView();
        
    }
    public function showInicioSesion(){
        $this->view->viewInicioSesion();
    }
    public function ingreso(){
        $email_user= $_POST['email_user'];
        $password = $_POST['password'];

        if(empty($email_user) || empty($password)){
            $this->view->showError("Complete los campos solicitados");
            return;
        }
        $usuario=$this->model->getEmail($email_user);

        if($usuario && $password){
            authHelper::login($usuario);

            header('Location: ' . 'home');
        }
        else{
            $this->view->viewInicioSesion("Los datos son erroneos");
        }
    }
    public function logout(){
        AuthHelper::logout();
        header('Location: ' . BASE_URL); 
    }
}
