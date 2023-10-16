<?php 
require_once './app/models/adminModel.php';
require_once './app/views/product.view.php';
require_once './app/helper/authHelper.php';
class adminController{
    private $model;
    private $view;

    public function __construct(){
        $this->model = new adminModel();
        $this->view = new productView();
    }
    
    public function showAdministrar(){
        AuthHelper::verify();
        $products = $this->model->getProducts();
        $categorys = $this->model->getCategorys();
        $this->view->viewAdministrar($products, $categorys);
    }
    public function deleteProduct(){
        AuthHelper::verify();
        $id = $_POST['id'];
        if(empty($id)){
            $this->view->showError("Elija un id");
            return;
        }
        $this->model->removeProduct($id);
        header('Location: ' . 'administrar');
    }
    public function addProduct(){
        AuthHelper::verify();
        $nombre_producto = $_POST['nombre_producto'];
        $precio = $_POST['precio'];
        $id_categoria = $_POST['id_categoria'];
        if(empty($nombre_producto) || empty($precio) || empty($id_categoria)){
            $this->view->showError("Complete los campos solicitados");
            return;
        }
        $id = $this->model->insertProduct($nombre_producto, $precio, $id_categoria);
        if($id){
            header ('Location: ' . 'administrar');
        }
        else{
            $this->view->showError("404 Error");
        }
    }
    public function updateProduct(){
        AuthHelper::verify();
        $productname = $_POST['nombre_producto'];
        $price = $_POST['precio'];
        $categoryId = $_POST['id_categoria'];
        $id = $_POST['id'];
        if (empty($productname) || empty($price) || empty($categoryId)||empty($id)) {
            $this->view->showError("Complete todos los campos");
            return;
        }
        $id = $this->model->updateProduct($productname, $price, $categoryId, $id);
        header('Location: ' . 'administrar');
    }
    public function addCategory(){
        AuthHelper::verify();
        $category = $_POST['nombre'];
        if (empty($category)) {
            $this->view->showError("Complete los campos solicitados");
            return;
        }
        $this->model->insertCategory($category);
        header('Location: ' . 'administrar');
    }
    public function updateCategory(){
        AuthHelper::verify();
        $categoryName = $_POST['nombre'];
        $id = $_POST['id_categoria'];
        if (empty($categoryName) || empty($id)) {
            $this->view->showError("Complete los campos solicitados");
            return;
        }
        $id = $this->model->updateCategory($categoryName, $id);
        header('Location: ' . 'administrar');
    }
    public function removeCategory(){
        AuthHelper::verify();
        $categoryId = $_POST['id_categoria'];
        if (empty($categoryId)) {
            $this->view->showError("Complete los campos solicitados");
            return;
        }
        $this->model->deleteCategory($categoryId);
        header('Location: ' . 'administrar');
    }
}