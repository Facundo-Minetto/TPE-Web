<?php

class productView {
    public function showError() {
        require 'templates/error.phtml';
    }
    public function showProducts($products, $categorys){
        require 'templates/header.phtml';
        require 'templates/products.phtml';
    }
    public function viewHome(){
        require 'templates/header.phtml';
        require 'templates/footer.phtml';
    }
    public function viewAdministrar($products, $categorys){
        require 'templates/adminProducts.phtml';
        require 'templates/footer.phtml';
    }
}
