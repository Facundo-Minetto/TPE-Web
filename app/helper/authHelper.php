<?php

class AuthHelper {

    public static function init() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function login($usuario) {
        AuthHelper::init();
        $_SESSION['id_usuario'] = $usuario->id_usuario;
        $_SESSION['usuario'] = $usuario->usuario; 
    }

    public static function logout() {
        AuthHelper::init();
        session_destroy();
    }

    public static function verify() {
        AuthHelper::init();
        if (!isset($_SESSION['id_usuario'])) {
            header('Location: ' . BASE_URL . 'iniciosesion');
            die();
        }
    }
}