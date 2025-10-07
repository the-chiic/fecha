<?php

    require_once "Funciones.php";


    $fechaString=$_POST["fecha"];

    list($dd,$mm,$aa)=explode("/",$fechaString);  //Separa una palabra con el separador que le indiques


    $fecha=new Funciones($dd, $mm, $aa);
?>
