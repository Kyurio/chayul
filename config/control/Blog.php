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
            
            $id_usuario =  session_name("usuario");
            $titulo = $request["str_titulo_blog"];
            $detalle = $request["str_detalle_blog"];

            $log = Login::Ingresar($titulo, $detalle);
  
            return $log;

        } catch (\Throwable $e) {
            return $e->getMessage();
        }
         

    }

    // ejecuta la funcion principal
    echo Login();  

}else{  

    // al no ser post redirecciona a la pagina 
    //Redirecciones::Err(403);

}

?>