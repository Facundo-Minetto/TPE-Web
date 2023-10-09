<?php

class TaskModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpe-web;charset=utf8', 'root', '');
    }
    function getProducts() {
        $query = $this->db->prepare('SELECT * FROM productos');
        $query->execute();

        // $tasks es un arreglo de tareas
        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }


}