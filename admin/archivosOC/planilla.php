<?php 
class Porcentaje{
    public  function __construct($total, $porcentaje=0){
        $this->total= $total;
        $this->porcentaje = $porcentaje;
    }

    public  function calcular(){
        return floatval($this->total * $this->porcentaje);
    }
}


class Planilla
{
    private function __construct($sexo, $edad, $hijo, $civil){
        $this->sexo = $sexo.strtoupper($sexo);
        $this->civil = $civil.strtoupper($civil);
        $this->edad = $edad;
        $this->hijo = $hijo;
        $this->sueldo_base = 0;
    }

    private function get_sueldo_base(){
        ($this->sexo == "M") ? $this->sueldo_base = 5000 : $this->sueldo_base = 4000;
        return $this->sueldo_base;
    }

    private function definir_porcentaje_afp(){
        if ($this->civil == "SOLTERO" ){
            return 15;
        }
        if ($this->civil == "CASADO" ){
            return 10;
        }
        if ($this->civil == "DIVORCIADO"){
            return 5;
        }
        return 0;
    }

    private function get_aporte_afp(){
        $objeto = new Porcentaje($this->get_sueldo_base(), $this->definir_porcentaje_afp());
        return $objeto->calcular();
    }

    private function definir_porcentaje_essalud(){
        if ($this->hijo != 0){
            return 10;   
        }
        return 5;
    }

    private function aporte_essalud(){
        $objeto = new Porcentaje($this->get_sueldo_base(), $this->definir_porcentaje_afp());
        return $objeto->calcular();
    }

    private function aporte_especial(){
        $objeto = new Porcentaje($this->get_sueldo_base(),10);
        return $objeto->calcular();
    }

    private function total_aporte(){
        return $this->get_aporte_afp() + $this->aporte_especial() + $this->aporte_essalud();
    }

    private function __bonificacion1(){
        if ($this->sexo == "F" AND $this->hijo != 0){
            return 20;
        }
    }

    private function __bonificacion2(){
        if($this->sexo == "M" AND $this->hijo != 0 AND $this->civil == "CASADO"){
            return 20;
        }
    }

    private function __bonificacion3(){
        if (21 <= $this->edad AND  30 <= $this->edad){
            return 10;
        }else if(41 <= $this->edad AND  50 <= $this->edad ){
            return 20;
        }
    }

    private function bonificacion1(){
        if (!$this->__bonificacion1()){
            return "no elegible";
        }
        $num = new Porcentaje($this->get_sueldo_base(), $this->__bonificacion1());
        return $num->calcular();
    }

    private function bonificacion2(){
        if (!$this->__bonificacion2()){
            return "no elegible";
        }
        $num = new Porcentaje($this->get_sueldo_base(), $this->__bonificacion2());
        return $num->calcular();
    }

    private function bonificacion3(){
        if (!$this->__bonificacion3()){
            return "no elegible";
        }
        $num = new Porcentaje($this->get_sueldo_base(), $this->__bonificacion3());
        return $num->calcular();
    }

    private function total_bonificacion(){
         if ($this->bonificacion1() != "No elegible"){
            $bono1 = $this->bonificacion1();
         } else{
            $bono1 = 0;
         } 

        
         if ($this->bonificacion2() != "No elegible"){
            $bono2 = $this->bonificacion2();
         } else{
            $bono2 = 0;
         }

         
         if ($this->bonificacion3() != "No elegible"){
            $bono3 = $this->bonificacion3();
         } else{
            $bono3 = 0;
         }  
         return $bono1 + $bono2 + $bono3;
    }

    private function sueldo_neto(){
        return ($this->get_sueldo_base() + $this->total_bonificacion()) - $this->total_aporte();
    }
}