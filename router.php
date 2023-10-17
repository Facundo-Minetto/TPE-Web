<?php
require_once './app/controllers/product.controller.php';
require_once './app/controllers/authController.php';
require_once './app/controllers/adminController.php';

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
        $controller = new productController();
        $controller->homeController();
        break;
    case 'productos':
        $controller = new productController();
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
        break;
    case 'administrar':
        $controller = new adminController();
        $controller->showAdministrar();
        break;
    case 'eliminarproducto':
        $controller = new adminController();
        $controller->deleteProduct();
        break;
    case 'agregarproducto':
        $controller = new adminController();
        $controller->addProduct();
        break;
    case 'editarproducto':
        $controller = new adminController();
        $controller->updateProduct();
        break;
    case 'agregarcategoria':
        $controller = new adminController();
        $controller->addCategory();
        break;
    case 'editarcategoria':
        $controller = new adminController();
        $controller->updateCategory();
        break;
    case 'eliminarcategoria':
        $controller = new adminController();
        $controller->removeCategory();
        break;
        default:
        $controller = new productController();
        $controller->errorController();
        break;
    }
    
    // este codigo se utilizo para crear el registro del usuario webadmin

    // case 'registro':
    //     $controller = new authController();
    //     $controller->showCrearCuenta();
    //     break;
    // case 'crearCuenta':
    //     $controller = new authController();
    //     $controller->createUser();
    //     break;
