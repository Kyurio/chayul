<?php

 require_once("../../templates/template.config.php");

class Redirecciones {

  public function index(){

    header('location: ' . RUTA_URL);

  }

  public function redireccionar($pagina = null) {

    header('location: ' . RUTA_URL . $pagina );

  }

  public function Err($codigo){

    switch ($codigo) {

      case '500':

        self::redireccionar("error/500.php");
        break;

      case '404':
      
        self::redireccionar("error/404.php");
        break;

      case '403':

        self::redireccionar("error/403.php");
        break;

      case '300':

        self::redireccionar("error/300.php");
        break;
      
      default:

        self::redireccionar("error/500.php");
        break;
      
    }  
  
  }


}

?>