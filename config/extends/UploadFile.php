<?php

class UploadFile {

private static $directorio = "/rae/assets/files/";
private static $mensaje = "";

    public function upload_files($archivo, $nombre_generado){

        $archivo_temporal = $archivo["tmp_name"];
        $codigo_error = $archivo['error'];

        // Controles y tratamiento
        switch ($codigo_error) {

            case UPLOAD_ERR_OK: // Determina su destino final

                $destino = $_SERVER['DOCUMENT_ROOT'] . self::$directorio . $nombre_generado;
                
                // validaciones
                if (move_uploaded_file($archivo_temporal, $destino)) {

                    self::$mensaje = true;

                } else {

                    self::$mensaje = false;
                }

                break;

            case UPLOAD_ERR_NO_FILE: // Sin archivo

                self::$mensaje = 'Sin archivo.';
                break;

            case UPLOAD_ERR_INI_SIZE: // Tamaño archivo > UPLOAD_MAX_FILESIZE

                self::$mensaje = false;
                
                break;

            case UPLOAD_ERR_FORM_SIZE: // Tamaño archivo > MAX_FILE_SIZE

                self::$mensaje = false;
                break;

            case UPLOAD_ERR_PARTIAL: // Archivo parcialmente transferido

                self::$mensaje = false;
                break;

            case UPLOAD_ERR_NO_TMP_DIR: // Sin directorio temporal

                self::$mensaje = false;
                break;

            case UPLOAD_ERR_CANT_WRITE: // Error durante de la escritura del archivo en disco

                self::$mensaje = false;
                break;

            case UPLOAD_ERR_EXTENSION: // Transferencia detenida por la expresión

                self::$mensaje = false;
                break;

            default: // Error no previsto

                self::$mensaje = false;
                break;

        }

      return self::$mensaje;

    }

    
}