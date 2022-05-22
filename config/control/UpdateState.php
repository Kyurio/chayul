<?php

# comunicador entre front y back
require_once("../../config/core/Autoload.php");
require_once("../../config/extends/Session.php");

// validacion de  login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    function Delete() {

        try {

            session_start();
            $request = json_decode(file_get_contents("php://input"), true);

            $id_usuario =  $_SESSION["id_usuario"];
            $id_post = $request["int_id"];
            $estado = $request["int_estado"];

            $updateEstado = Blog::CambiarEstado($id_usuario, $id_post, $estado);

            echo $updateEstado;

        } catch (\Throwable $e) {
            echo $e->getMessage();
        }


    }

    // ejecuta la funcion principal
    echo Delete();

}else{

    // al no ser post redirecciona a la pagina
    Redirecciones::Err(403);

}

?>
