<?php

require_once('./core/core.php');

class Conexion{

    protected $conexion;

    public function __construct(){
        try{
            $this->conexion = new PDO(DB_DSN, DB_USER, DB_PASS);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conexion->exec(DB_CHARSET);
            return $this->conexion;
        }catch(Exception $e){
            die("Error en la conexion con la base de datos " . $e->getMessage());
            echo "Error en la linea " . $e->getLine();
        }
    }

    public function encriptar($string){
        $salida = false;
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        $salida = openssl_encrypt($string, METHOD, $key, 0, $iv);
        $salida = base64_encode($salida);
        return $salida;
    }

    public function desencriptar($string){
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        $salida = openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
        return $salida;
    }

    public function fila($stmt){
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function filas($stmt){
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function close($stmt){
        $stmt->closeCursor();
        $stmt = null;
    }
}

?>