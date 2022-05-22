<?php

# comunicador entre front y back
require_once("../../config/core/Autoload.php");
require_once("../../config/extends/Session.php");

// validacion de  login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    function About() {

        try {

            session_start();

            $request = json_decode(file_get_contents("php://input"), true);

            $id_usuario =  $_SESSION["id_usuario"];
            $titulo = $request["str_titulo_about"];
            $detalle = $request["str_detalle_about"];
            $estado = 1;
            $img = "";

            $post = About::GrabarAbout($id_usuario, $titulo, $detalle, $etiquetas, $img, $estado);

            return $post;

        } catch (\Throwable $e) {
            echo $e->getMessage();
        }


    }

    // ejecuta la funcion principal
    echo About();

}else{

    // al no ser post redirecciona a la pagina
    Redirecciones::Err(403);

}

?>
