<?php

class About extends Conexion {

    private static $id_quienes_somos;
    private static $id_usuario;
    private static $titulo;
    private static $detalle;
    private static $estado;

    public static function GrabarAbout($id_usuario, $titulo, $detalle, $estado) {

        try {

            self::$id_usuario = filter_var($id_usuario, FILTER_SANITIZE_NUMBER_INT);
            self::$titulo = filter_var($titulo, FILTER_SANITIZE_STRING);
            self::$detalle = filter_var($detalle, FILTER_SANITIZE_STRING);
            self::$estado = filter_var($estado, FILTER_SANITIZE_NUMBER_INT);

            $sql = "INSERT INTO `quienes_somos` (`id_usuario`, `titulo`, `detalle`, `estado`) VALUES (:id_usuario, :titulo, :detalle, :estado)";
            $stmt = Conexion::conectar()->prepare($sql);

            $stmt->bindParam(":id_usuario", self::$id_usuario, PDO::PARAM_STR);
            $stmt->bindParam(":titulo", self::$titulo, PDO::PARAM_STR);
            $stmt->bindParam(":detalle", self::$detalle, PDO::PARAM_STR);
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

    public static function ListadoAbout($id_usuario) {

        try{

            self::$id_usuario = filter_var($id_usuario, FILTER_SANITIZE_NUMBER_INT);

            //consulta
            $sql = "SELECT * FROM `quienes_somos` WHERE id_usuario = :id_usuario ORDER BY `quienes_somos`.`id_quienes_somos` DESC";
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

    public static function EliminarAbout($id_usuario, $id_quienes_somos) {

        try {

           self::$id_usuario = filter_var($id_usuario, FILTER_SANITIZE_NUMBER_INT);
           self::$id_quienes_somos = filter_var($id_quienes_somos, FILTER_SANITIZE_NUMBER_INT);

           $sql = "DELETE FROM quienes_somos WHERE id_quienes_somos = :id_quienes_somos AND id_usuario = :id_usuario";
           $stmt = Conexion::conectar()->prepare($sql);

           $stmt->bindParam(":id_quienes_somos", self::$id_quienes_somos, PDO::PARAM_INT);
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

    public static function CambiarEstado($id_usuario, $id_quienes_somos, $estado) {

        try {

           self::$id_usuario = filter_var($id_usuario, FILTER_SANITIZE_NUMBER_INT);
           self::$id_blog = filter_var($id_blog, FILTER_SANITIZE_NUMBER_INT);
           self::$estado = filter_var($estado, FILTER_SANITIZE_NUMBER_INT);

           $sql = "UPDATE quienes_somos SET estado=:estado WHERE id_quienes_somos=:id_quienes_somos AND id_usuario=:id_usuario";
           $stmt = Conexion::conectar()->prepare($sql);

           $stmt->bindParam(":id_blog", self::$id_quienes_somos, PDO::PARAM_INT);
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
