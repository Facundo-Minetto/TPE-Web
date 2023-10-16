<?php 

class authModel{
    private $db;
    
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=tpeweb;charset=utf8', 'root', '');
    }

    //LOGIN usuario
    public function getEmail($email_user){
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE usuario=?');
        $query->execute([$email_user]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}