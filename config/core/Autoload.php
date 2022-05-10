<?php

  require_once("../../config/core/Conexion.php");


  function Autoload($clase){

    require_once("../../config/query/".$clase.".php");

  }

  spl_autoload_register("Autoload");

 ?>
