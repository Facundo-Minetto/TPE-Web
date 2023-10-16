<?php

class productModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpeweb;charset=utf8', 'root', '');
    }
    public function getProducts() {
        $query = $this->db->prepare('SELECT * FROM products');
        $query->execute();

        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }
    public function getCategorys(){
        $query = $this->db->prepare('SELECT * FROM categorys');
        $query->execute();

        $categorys = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorys;
    }
    public function getProductsByCategory($id){
        $query = $this->db->prepare('SELECT * FROM products WHERE id_categoria=?');
        $query->execute([$id]);

        $tasks = $query->fetchAll(PDO::FETCH_OBJ);


        return $tasks;
    }



}