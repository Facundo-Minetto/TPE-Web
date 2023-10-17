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
            $this->view->viewInicioSesion("Complete los campos solicitados");
            return;
        }
        
        //busco el usuario 
        $usuario=$this->model->getEmail($email_user);

        if($usuario && password_verify($password, $usuario->contraseña)){
            authHelper::login($usuario);

            header('Location: ' . 'administrar');
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

// este codigo se utilizo para crear el registro del usuario webadmin

// public function showCrearCuenta(){
//     $this->view->viewCrearCuenta();
// }
// public function createUser(){
//     $email_register= $_POST['email_register'];
//     $contraseña = password_hash($_POST['contraseña'], PASSWORD_BCRYPT);
//     $this->model->addUser($email_register, $contraseña);

//     if(!empty($email_user)||!empty($password)){

//         $this->view->viewInicioSesion();
//     }
// }