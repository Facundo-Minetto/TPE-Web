 <?php
 require_once "database/config.php";
    class Model{
        protected $db;

        function __construct() {
            $this->db = new PDO('mysql:host=localhost;dbname=tpeweb;charset=utf8', 'root', '');
            $this->deploy();
        }


        function deploy(){
            // chequear si hay tablas
            $query = $this->db->query('SHOW TABLES');
            $tables = $query->fetchAll(); //nosdevuelve todas las tablas de la db
            if(count($tables)==0){
                //si no hay que crearlas


            }

        }
    } 