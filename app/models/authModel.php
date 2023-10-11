<?php 

class authModel{
    private $db;
    
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=tpeweb;charset=utf8', 'root', '');
    }
}