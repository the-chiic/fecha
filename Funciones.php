<?php
    class Funciones{
        public int $dia;
        public int $mes;
        public int $año;

        public function __construct(int $dia, int $mes, int $año) {
            $this->dia=$dia;
            $this->mes=$mes;
            $this->año=$año;
        }

        public function bisiesto(){
            if(($this->año%4==0 && $this->año%100!=0) || $this->año%4==0){
                return true;
            }else{
                return false;
            }
        }

        public function validarAño(){
            if($this->año>2025 || $this->año<1900)
                return false;
            return true;
        }

        public function validarMes(){
            if($this->mes>12 || $this->mes<1)
                return false;
            return true;
        }

        public function validarDia(){
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
                    if($this->bisiesto()==true){
                        if($this->dia>29 || $this->dia<1)
                            return false;
                        return true;
                    }else{
                        if($this->dia>28 || $this->dia<1)
                            return false;
                        return true;
                    }
                default:
                    return false;
            }
        }
    }
?>