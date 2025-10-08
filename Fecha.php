<?php

    require_once "Funciones.php";


    $fechaString=$_POST["fecha"];

    $arrayFecha = new Funciones();

    echo $arrayFecha->modificarFecha(($fechaString));
?>

