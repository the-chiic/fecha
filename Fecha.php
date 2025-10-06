<?php

    require_once "Funciones.php";

    $array=[
        1=>["Enero"=>31], 2=>["Febrero"=>28], 3=>["Marzo"=>31], 4=>["Abril"=>30], 5=>["Mayo"=>31],
        6=>["Junio"=>30], 7=>["Julio"=>31], 8=>["Agosto"=>31], 9=>["Septiembre"=>30],
        10=>["Octubre"=>31], 11=>["Noviembre"=>30], 12=>["Diciembre"=>31]
    ];

    $fechaString=$_POST["fecha"];

    list($dd,$mm,$aa)=explode("/",$fechaString);  //Separa una palabra con el separador que le indiques


    $fecha=new Funciones($dd, $mm, $aa);

    $sw=0;
    foreach($array as $mes=>$datos){
        foreach ($datos as $nombreMes=>$dia) {
            if($fecha->validarDia()==true && $fecha->validarMes()==true && $fecha->validarAño()==true){
                $sw=1;
                if($mm==$mes){
                    $mm=$nombreMes;
                    if($fecha->bisiesto()==true && $mes==2){
                        $dia++;
                        echo "Fecha: ".$dd."/".$mm."/".$aa;
                        echo "<br/>Días en ese Mes (Bisiesto): ".$dia;
                    }else{
                        echo "Fecha: ".$dd."/".$mm."/".$aa;
                        echo "<br/>Días en ese Mes: ".$dia;
                    }
                }
            }
        }
    }

    if($sw==0){
        echo "Fecha No Válida";
    }
?>