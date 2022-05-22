<?php

# comunicador entre front y back
require_once("../../config/core/Autoload.php");
require_once("../../config/extends/Session.php");

// validacion de  login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    function Comments() {

        try {

            session_start();

            $request = json_decode(file_get_contents("php://input"), true);

            $id_usuario =  $_SESSION["id_usuario"];
            $cliente = $request["str_cliente"];
            $comentario = $request["str_comentario"];
            $estado = 1;
            $post = Comments::GrabarComentario($id_usuario, $cliente, $comentario, $estado);

            return $post;

        } catch (\Throwable $e) {
            echo $e->getMessage();
        }


    }

    // ejecuta la funcion principal
    echo Comments();

}else{

    // al no ser post redirecciona a la pagina
    Redirecciones::Err(403);

}

?>
