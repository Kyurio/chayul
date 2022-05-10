<?php 

class Login extends Conexion {

    private static $id_usuario;
    private static $titulo;
    private static $detalle;
    private static $imagen;
    private static $estado;

    public function GrabarPost($id_usuario, $titulo, $detalle, $imagen, $estado){

        try {

            self::$id_usuario = filter_var($id_usuario, FILTER_SANITIZE_INT); 
            self::$titulo = filter_var($titulo, FILTER_SANITIZE_STRING); 
            self::$detalle = filter_var($detalle, FILTER_SANITIZE_STRING); 
            self::$imagen = filter_var($imagen, FILTER_SANITIZE_STRING); 
            self::$estado = filter_var($estado, FILTER_SANITIZE_INT); 

            $sql = "INSERT INTO blog (id_usuario, titulo, detalle, imagen, estado) 
            VALUES (':id_usuario', ':titulo', ':detalle', ':imagen', ':estado')";
            $stmt = Conexion::conectar()->prepare($sql);

            $stmt->bindParam(":id_usuario", self::$id_usuario, PDO::PARAM_STR);
            $stmt->bindParam(":titulo", self::$titulo, PDO::PARAM_STR);
            $stmt->bindParam(":detalle", self::$detalle, PDO::PARAM_STR);
            $stmt->bindParam(":imagen", self::$imagen, PDO::PARAM_STR);
            $stmt->bindParam(":estado", self::$estado, PDO::PARAM_INT);

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


}