<?php

class Blog extends Conexion {

    private static $id_usuario;
    private static $id_blog;
    private static $titulo;
    private static $detalle;
    private static $imagen;
    private static $estado;
    private static $etiquetas;

    public static function GrabarPost($id_usuario, $titulo, $detalle, $etiquetas, $imagen, $estado){

        try {

            self::$id_usuario = filter_var($id_usuario, FILTER_SANITIZE_NUMBER_INT);
            self::$titulo = filter_var($titulo, FILTER_SANITIZE_STRING);
            self::$detalle = filter_var($detalle, FILTER_SANITIZE_STRING);
            self::$imagen = filter_var($imagen, FILTER_SANITIZE_STRING);
            self::$etiquetas = filter_var($etiquetas, FILTER_SANITIZE_STRING);
            self::$estado = filter_var($estado, FILTER_SANITIZE_NUMBER_INT);

            $sql = "INSERT INTO blog (`id_usuario`, `titulo`, `detalle`, `imagen`, `etiquetas`, `estado`) VALUES (:id_usuario, :titulo, :detalle, :etiquetas, :imagen, :estado);";
            $stmt = Conexion::conectar()->prepare($sql);

            $stmt->bindParam(":id_usuario", self::$id_usuario, PDO::PARAM_STR);
            $stmt->bindParam(":titulo", self::$titulo, PDO::PARAM_STR);
            $stmt->bindParam(":detalle", self::$detalle, PDO::PARAM_STR);
            $stmt->bindParam(":etiquetas", self::$etiquetas, PDO::PARAM_STR);
            $stmt->bindParam(":imagen", self::$imagen, PDO::PARAM_STR);
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

    public static function ListadoPost($id_usuario) {

        try{

            self::$id_usuario = filter_var($id_usuario, FILTER_SANITIZE_NUMBER_INT);

            //consulta
            $sql = "SELECT * FROM `blog` WHERE id_usuario = :id_usuario ORDER BY `blog`.`id_blog` DESC";
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

    public static function EliminarPost($id_usuario, $id_blog) {

        try {

           self::$id_usuario = filter_var($id_usuario, FILTER_SANITIZE_NUMBER_INT);
           self::$id_blog = filter_var($id_blog, FILTER_SANITIZE_NUMBER_INT);

           $sql = "DELETE FROM blog WHERE id_blog = :id_blog AND id_usuario = :id_usuario";
           $stmt = Conexion::conectar()->prepare($sql);

           $stmt->bindParam(":id_blog", self::$id_blog, PDO::PARAM_INT);
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

    public static function CambiarEstado($id_usuario, $id_post, $estado) {

        try {

           self::$id_usuario = filter_var($id_usuario, FILTER_SANITIZE_NUMBER_INT);
           self::$id_blog = filter_var($id_blog, FILTER_SANITIZE_NUMBER_INT);
           self::$estado = filter_var($estado, FILTER_SANITIZE_NUMBER_INT);

           $sql = "UPDATE blog SET estado=:estado WHERE id_blog=:id_blog AND id_usuario=:id_usuario";
           $stmt = Conexion::conectar()->prepare($sql);

           $stmt->bindParam(":id_blog", self::$id_blog, PDO::PARAM_INT);
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
