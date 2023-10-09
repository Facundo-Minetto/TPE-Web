<?php

class TaskView {
    public function showError() {
        require 'templates/error.phtml';
    }
    public function showProducts($products){
        foreach($products as $product){
            require 'templates/productsList.phtml';
        }
    }
}
