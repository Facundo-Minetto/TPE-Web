<?php

class TaskView {
    public function showError() {
        require 'templates/error.phtml';
    }
    public function showProducts($products, $categorys){
        require 'templates/productsList.phtml';
    }
    public function viewCategorys($categorys){
        require 'templates/header.phtml';
        require 'templates/viewCategorys.phtml';
    }
    public function viewProductsByCategory($products){
        require 'templates/showProductsByCategory.phtml';
        require 'templates/footer.phtml';
    }
    public function viewHome(){
        require 'templates/header.phtml';
        require 'templates/footer.phtml';
    }
}
