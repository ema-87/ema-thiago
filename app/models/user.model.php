<?php
require_once 'config.php';

class userModel
{

    private $db;

    function __construct(){
        // abro la conexion aca porque la necesito en todos los metodos (solo la abro una sola vez)
        $this->db = $this->getDB();
        //$this.deploy();
    }

    private function getDB(){
        return $db = dataBase;
    }

    function getUserByEmail($email){
        $query = $this->db->prepare('SELECT * FROM usuario WHERE email = ?');
        $query->execute([$email]);  

        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    /* private function _deploy() {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if(count($tables) == 0) {
            $sql =<<<END
		END;
        $this->db->query($sql);
        }
    } */

}
