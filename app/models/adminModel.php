<?php
require_once 'model.php';
class adminModel extends Model{
    
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
    public function removeProduct($id){
        $query = $this->db->prepare('DELETE FROM products WHERE id_producto=?');
        $query->execute([$id]);
    }
    public function insertProduct($nombre_producto, $precio, $id_categoria){
        $query = $this->db->prepare('INSERT INTO products (nombre_producto, precio, id_categoria) VALUES (?, ?, ?)');
        $query->execute([$nombre_producto, $precio, $id_categoria]);

        return $this->db->lastInsertId();
    }
    public function updateProduct($productname, $price, $categoryId, $id){
        $query=$this->db->prepare('UPDATE `products` SET `nombre_producto` = ?, `precio` = ?, `id_categoria` = ? WHERE `products`.`id_producto` = ?;');
        $query->execute([$productname, $price, $categoryId, $id]);
    }
    public function insertCategory($category){
        $query = $this->db->prepare('INSERT INTO categorys (nombre) VALUES(?)');
        $query->execute([$category]);
    
        return $this->db ->lastInsertId();
    }
    public function updateCategory($categoryName, $id){
        $query = $this->db->prepare('UPDATE `categorys` SET `nombre` = ? WHERE `categorys`.`id_categoria` = ?;');
        $query->execute([$categoryName,$id]);
    }
    public function deleteCategory($categoryId){
        $query = $this->db-> prepare('DELETE FROM categorys WHERE id_categoria=?');
        $query-> execute([$categoryId]);
    }
    






}