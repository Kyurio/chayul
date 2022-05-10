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
               Session::start();
               Session::Add('usuario', $mail);
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
    //Redirecciones::Err(403);

}

?>