<?php 
require_once 'model.php';
class authModel extends Model{
    

    public function getEmail($email_user){
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE usuario=?');
        $query->execute([$email_user]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
    
}

// este codigo se utilizo para crear el registro del usuario webadmin

// public function addUser($email_register, $contraseña){
//     $query = $this->db->prepare('INSERT INTO usuarios (usuario, contraseña) VALUES(?,?)');
//     $query->execute([$email_register, $contraseña]);
//     return $this->db->lastInsertId();
// }