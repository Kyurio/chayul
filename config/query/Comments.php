<?php

class Comments extends Conexion {

    private static $id_usuario;
    private static $id_comentario;
    private static $cliente;
    private static $comentario;
    private static $fecha_comentario;
    private static $estado;

    public static function GrabarComentario($id_usuario, $cliente, $comentario, $estado){

        try {

            self::$id_usuario = filter_var($id_usuario, FILTER_SANITIZE_NUMBER_INT);
            self::$cliente = filter_var($cliente, FILTER_SANITIZE_STRING);
            self::$comentario = filter_var($comentario, FILTER_SANITIZE_STRING);
            self::$estado = filter_var($estado, FILTER_SANITIZE_NUMBER_INT);

            $sql = "INSERT INTO `comentarios` (`id_usuario`, `cliente`, `comentario`, `estado`) VALUES (:id_usuario, :cliente, :comentario, :estado);";
            $stmt = Conexion::conectar()->prepare($sql);

            $stmt->bindParam(":id_usuario", self::$id_usuario, PDO::PARAM_INT);
            $stmt->bindParam(":cliente", self::$cliente, PDO::PARAM_STR);
            $stmt->bindParam(":comentario", self::$comentario, PDO::PARAM_STR);
            $stmt->bindParam(":estado", self::$estado, PDO::PARAM_INT);

            if($stmt->execute()){
                return json_encode(true);
            } else {
                return json_encode(false);
            }

            // cierra la conexion
            Conexion::desconectar($sql, $stmt);

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public static function ListadoComentario($id_usuario) {

        try{

            self::$id_usuario = filter_var($id_usuario, FILTER_SANITIZE_NUMBER_INT);

            //consulta
            $sql = "SELECT * FROM `comentarios` WHERE id_usuario = :id_usuario ORDER BY `comentarios`.`id_comentario` DESC";
            $stmt = Conexion::conectar()->prepare($sql);
            $stmt->bindParam(":id_usuario", self::$id_usuario, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetchAll();

            // cierra la conexion
            Conexion::desconectar($sql, $stmt);

        }catch (Exception $e){
            return $e->getMessage();
        }
    }

    public static function EliminarComentario($id_usuario, $id_comentario) {

        try {

           self::$id_usuario = filter_var($id_usuario, FILTER_SANITIZE_NUMBER_INT);
           self::$id_comentario = filter_var($id_comentario, FILTER_SANITIZE_NUMBER_INT);

           $sql = "DELETE FROM comentarios WHERE id_comentario = :id_comentario AND id_usuario = :id_usuario";
           $stmt = Conexion::conectar()->prepare($sql);

           $stmt->bindParam(":id_comentario", self::$id_comentario, PDO::PARAM_INT);
           $stmt->bindParam(":id_usuario", self::$id_usuario, PDO::PARAM_INT);

           if($stmt->execute()){
               return json_encode(true);
           } else {
               return json_encode(false);
           }

        } catch (\Exception $e) {

            return $e->getMessage();

        }

    }

    public static function CambiarEstado($id_usuario, $id_comentario, $estado) {

        try {

           self::$id_usuario = filter_var($id_usuario, FILTER_SANITIZE_NUMBER_INT);
           self::$id_comentario = filter_var($id_comentario, FILTER_SANITIZE_NUMBER_INT);
           self::$estado = filter_var($estado, FILTER_SANITIZE_NUMBER_INT);

           $sql = "UPDATE blog SET estado=:estado WHERE id_comentario=:id_comentario AND id_usuario=:id_usuario";
           $stmt = Conexion::conectar()->prepare($sql);

           $stmt->bindParam(":id_comentario", self::$id_comentario, PDO::PARAM_INT);
           $stmt->bindParam(":id_usuario", self::$id_usuario, PDO::PARAM_INT);
           $stmt->bindParam(":estado", self::$estado, PDO::PARAM_INT);

           if($stmt->execute()){
               return json_encode(true);
           } else {
               return json_encode(false);
           }

        } catch (\Exception $e) {

            return $e->getMessage();

        }

    }

}
