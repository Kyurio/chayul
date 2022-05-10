<?php

require_once("../../config/config.php");

class Conexion{

    static public function conectar(){

        $conn = new PDO("mysql:host=".HOST.";dbname=".NAME."",USER,PASSWORD);
        $conn->exec("set names utf8");

        return $conn;
    
    }

    static public function desconectar($pdo, $stmt){

        global $pdo, $stmt;
        
        $stmt->closeCursor();
        $stmt = null;
        $pdo = null;
     

    }

}