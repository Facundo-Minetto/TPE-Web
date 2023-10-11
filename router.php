<?php
require_once './app/controllers/product.controller.php';
require_once './app/controllers/authController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// listar    ->         taskController->showTasks();
// agregar   ->         taskController->addTask();
// eliminar/:ID  ->     taskController->removeTask($id); 
// finalizar/:ID  ->    taskController->finishTask($id);
// about ->             aboutController->showAbout();

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controller = new TaskController();
        $controller->homeController();
        break;
    case 'productos':
        $controller = new TaskController();
        $controller->showCategorys();
        if($params[1] == 0){
            $controller->showProducts();
        }
        else if($params[1] >= 1 && $params[1] <= 3){
            $controller->showProductsByCategory($params[1]);
        }
        else{
            $controller->errorController();
        }
        break;
    default: 
        $controller = new TaskController();
        $controller->errorController();
        break;
    case 'registro':
        $controller = new authController();
        $controller->showCrearCuenta();
        break;
}
