<?php

class authView{
    public function viewInicioSesion(){
        require 'templates/form-inicioSesion.phtml';
    }
    public function showError($error){
        require 'templates/error.phtml';
    }
}

// este codigo se utilizo para crear el registro del usuario webadmin

// public function viewCrearCuenta(){
//     require 'templates/crearCuenta.phtml';
// }