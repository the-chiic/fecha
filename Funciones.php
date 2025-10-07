<?php
    class Funciones{
        private int $dia;
        private int $mes;
        private int $año;

        private $array=[
                    1=>["Enero"=>31], 2=>["Febrero"=>28], 3=>["Marzo"=>31], 4=>["Abril"=>30], 5=>["Mayo"=>31],
                    6=>["Junio"=>30], 7=>["Julio"=>31], 8=>["Agosto"=>31], 9=>["Septiembre"=>30],
                    10=>["Octubre"=>31], 11=>["Noviembre"=>30], 12=>["Diciembre"=>31]
                ];

        public function __construct(int $dia, int $mes, int $año) {
            $this->dia=$dia;
            $this->mes=$mes;
            $this->año=$año;

            $this->bisiesto();
        }

        private function bisiesto(){
            if(($this->año%4==0 && $this->año%100!=0) || $this->año%4==0){
                $bisiesto=true;
            }else{
                $bisiesto=false;
            }

            $sw=0;
            foreach($this->array as $mes=>$datos){                //Recorro el array para el indice del mes tengo 2 datos
                foreach ($datos as $nombreMes=>$dia) {            //Y para los datos por cada nombre del mes se encuentra los dias que tiene
                    if($this->validarDia()==true && $this->validarMes()==true && $this->validarAño()==true){ //Valido que sean fechas correctas
                        $sw=1;
                        if($this->mes==$mes){                           //Compruebo si el mes se encuentra en el array
                            $mesNombre=$nombreMes;                      //Si existe cambio su numero por el nombre del mes
                            if($bisiesto==true && $mes==2){     //Compruebo si es año bisiesto y si el mes es febrero
                                $dia++;                         //Para añadir un día más
                                echo "Fecha: ".$this->dia."/".$mesNombre."/".$this->año;
                                echo "<br/>Días en ese Mes (Bisiesto): ".$dia;
                            }else{
                                echo "Fecha: ".$this->dia."/".$mesNombre."/".$this->año;
                                echo "<br/>Días en ese Mes: ".$dia;
                            }
                        }
                    }
                }
            }

            if($sw==0){
                echo "Fecha No Válida";
            }
        }

        private function validarAño(){
            if($this->año>2025 || $this->año<1900)
                return false;
            return true;
        }

        private function validarMes(){
            if($this->mes>12 || $this->mes<1)
                return false;
            return true;
        }

        private function validarDia(){
            switch($this->mes){
                case 1: case 3: case 5: case 7: case 8: case 10: case 12:
                    if($this->dia>31 || $this->dia<1)
                        return false;
                    return true;
                case 4: case 6: case 9: case 11:
                    if($this->dia>30 || $this->dia<1)
                        return false;
                    return true;
                case 2:
                    if($this->dia>28 || $this->dia<1)
                            return false;
                        return true;
                default:
                    return false;
            }
        }
    }
?>
