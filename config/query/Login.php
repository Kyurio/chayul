<?php 

class Login extends Conexion {

    private static $id_usuario;
    private static $nombre_usuario;
    private static $mail_usuario;
    private static $password_usuario;
    private static $estado_usuario;

    public function GrabarUsuario($id_usuario, $nombre_usuario, $mail_usuario, $password_usuario, $estado_usuario){

        try {

            self::$id_usuario = filter_var($id_usuario, FILTER_SANITIZE_INT); 
            self::$nombre_usuario = filter_var($nombre_usuario, FILTER_SANITIZE_STRING); 
            self::$mail_usuario = filter_var($mail_usuario, FILTER_SANATIZE_EMAIL); 
            self::$password_usuario = filter_var($password_usuario, FILTER_SANITIZE_STRING); 
            self::$estado_usuario = filter_var($estado_usuario, FILTER_SANITIZE_INT); 

            $sql = "INSERT INTO usuario (nombre, mail, password, estado) 
            VALUES (':nombre_usuario', ':mail', ':password', ':estado')";
            $stmt = Conexion::conectar()->prepare($sql);

            $stmt->bindParam(":nombre_usuario", self::$nombre_usuario, PDO::PARAM_STR);
            $stmt->bindParam(":mail", self::$mail_usuario, PDO::PARAM_STR);
            $stmt->bindParam(":password", self::$password_usuario, PDO::PARAM_STR);
            $stmt->bindParam(":estado", self::$estado_usuario, PDO::PARAM_INT);

            if($stmt->execute()){
                return json_encode("true");
            } else {
                return json_encode("false");
            }

            // cierra la conexion
            Conexion::desconectar($sql, $stmt);

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public static function Ingresar($mail, $password) {

        try{

            self::$mail_usuario = $mail;
            self::$password_usuario = $password;

            //consulta
            $sql = "SELECT * FROM usuario WHERE mail = :mail AND password = :password ";
            $stmt = Conexion::conectar()->prepare($sql);
            $stmt->bindParam(":mail", self::$mail_usuario, PDO::PARAM_STR);
            $stmt->bindParam(":password", self::$password_usuario, PDO::PARAM_STR);
            
            $stmt->execute();

            return $stmt->fetchAll();
          
            // cierra la conexion
            Conexion::desconectar($sql, $stmt);

        }catch (Exception $e){
            return $e->getMessage();
        }

    }
    
}