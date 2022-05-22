<?php

class Messages extends Conexion {

    private static $id_quienes_somos;
    private static $id_usuario;
    private static $titulo;
    private static $detalle;
    private static $estado;

    public static function ListadoMensajes($id_usuario) {

        try{

            self::$id_usuario = filter_var($id_usuario, FILTER_SANITIZE_NUMBER_INT);

            //consulta
            $sql = "SELECT * FROM `mensajes` WHERE `id_usuario` = :id_usuario";
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

    public static function CountMensajes($id_usuario) {

        try{

            self::$id_usuario = filter_var($id_usuario, FILTER_SANITIZE_NUMBER_INT);

            //consulta
            $sql = "SELECT count(`id_mensaje`)As cantidad_mensajes FROM `mensajes` WHERE `id_usuario` = :id_usuario";
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




}
