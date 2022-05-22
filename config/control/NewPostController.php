<?php

# comunicador entre front y back
require_once("../../config/core/Autoload.php");
require_once("../../config/extends/Session.php");

// validacion de  login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    function Post() {

        try {

            session_start();

            $request = json_decode(file_get_contents("php://input"), true);

            $id_usuario =  $_SESSION["id_usuario"];
            $titulo = $request["str_titulo_blog"];
            $detalle = $request["str_detalle_blog"];
            $etiquetas = $request["str_etiquetas_blog"];
            $estado = 1;
            $img = "";

            $post = Blog::GrabarPost($id_usuario, $titulo, $detalle, $etiquetas, $img, $estado);

            return $post;

        } catch (\Throwable $e) {
            echo $e->getMessage();
        }


    }

    // ejecuta la funcion principal
    echo Post();

}else{

    // al no ser post redirecciona a la pagina
    Redirecciones::Err(403);

}

?>
