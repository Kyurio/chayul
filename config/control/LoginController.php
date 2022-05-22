<?php

# comunicador entre front y back
require_once("../../config/core/Autoload.php");
require_once("../../config/extends/Session.php");

// validacion de  login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    function Login() {

        try {

            $request = json_decode(file_get_contents("php://input"), true);

            $mail = $request["str_mail_user"];
            $password = $request["str_password_user"];

            $log = Login::Ingresar($mail, $password);

            if(!empty($log)){

                foreach ($log as $key => $item) {
                    $id_usuario = $item["id_usuario"];
                    $nombre_usuario = $item["nombre"];
                }

                Session::start();
                Session::Add('usuario', $nombre_usuario);
                Session::Add('id_usuario', $id_usuario);

               return true;
            }else{
              return false;
            }


        } catch (\Throwable $e) {
            return $e->getMessage();
        }


    }

    // ejecuta la funcion principal
    echo Login();

}else{

    // al no ser post redirecciona a la pagina
    Redirecciones::Err(403);

}

?>
