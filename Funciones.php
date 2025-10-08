<?php
    class Funciones{
        private $dia;
        private $mes;
        private $año;
        private $array=[
                    1=>["Enero"=>31], 2=>["Febrero"=>28], 3=>["Marzo"=>31], 4=>["Abril"=>30], 5=>["Mayo"=>31],
                    6=>["Junio"=>30], 7=>["Julio"=>31], 8=>["Agosto"=>31], 9=>["Septiembre"=>30],
                    10=>["Octubre"=>31], 11=>["Noviembre"=>30], 12=>["Diciembre"=>31]
                ];

        public function modificarFecha($fechaString){

            list($this->dia,$this->mes,$this->año)=explode("/",$fechaString);  //Separa una palabra con el separador que le indiques

            $dia=(int)$this->dia;
            $mes=(int)$this->mes;
            $año=(int)$this->año;

            if($this->validarDia()==false || $this->validarMes()==false || $this->validarAño()==false){ //Valido que sean fechas correctas
                return "Fecha No Válida";
            }

            $nombreMes=array_key_first($this->array[$mes]); //Devuelve la primera parte del array de dentro
            
            if($this->bisiesto()==true && $mes==2){       //Compruebo si es año bisiesto y si el mes es febrero
                $this->array[$mes][$nombreMes]=29;
                $diasMes=$this->array[$mes][$nombreMes];                                //Para añadir un día más
                return "Fecha: ".$this->dia."/".$nombreMes."/".$this->año."<br/>Días en ese Mes (Bisiesto): ".$diasMes;
            }else{
                $diasMes=$this->array[$mes][$nombreMes];
                return "Fecha: ".$this->dia."/".$nombreMes."/".$this->año."<br/>Días en ese Mes: ".$diasMes;
            }

        }
        private function bisiesto(): bool{
            if(($this->año%4==0 && $this->año%100!=0) || $this->año%4==0){
                $bisiesto=true;
                return $bisiesto;
            }
            $bisiesto=false;
            return $bisiesto;
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

