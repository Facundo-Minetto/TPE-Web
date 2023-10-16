<?php
require_once './app/controllers/product.controller.php';
require_once './app/controllers/authController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home'; // accion por defecto
if (!empty($_GET['action'])) {
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
        $controller->showProducts();
        break;
    case 'iniciosesion':
        $controller = new authController();
        $controller->showInicioSesion();
        break;
    case 'ingreso':
        $controller = new authController();
        $controller->ingreso();
        break;
    case 'logout':
        $controller = new authController();
        $controller->logout();
    default:
        $controller = new TaskController();
        $controller->errorController();
        break;
}
