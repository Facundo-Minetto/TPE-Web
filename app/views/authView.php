<?php

class authView{
    public function viewInicioSesion(){
        require 'templates/form-inicioSesion.phtml';
    }
    public function showError($error){
        require 'templates/error.phtml';
    }
}