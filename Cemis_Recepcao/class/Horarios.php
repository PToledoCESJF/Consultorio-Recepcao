<?php

class Horarios {
    private $idHorarios;
    private $Profissional;
    private $diaSemana;
    private $inicio;
    private $fim;
    
    public function __construct($idHorarios = false)
    {
        if($idHorarios){
            $this->idHorarios = $idHorarios;
            HorariosDAO::carregar();
        }
    }

    public function getIdHorarios() {
        return $this->idHorarios;
    }

    public function getProfissional() {
        return $this->Profissional;
    }

    public function getDiaSemana() {
        return $this->diaSemana;
    }

    public function getInicio() {
        return $this->inicio;
    }

    public function getFim() {
        return $this->fim;
    }

    public function setIdHorarios($idHorarios) {
        $this->idHorarios = $idHorarios;
    }

    public function setProfissional($Profissional) {
        $this->Profissional = $Profissional;
    }

    public function setDiaSemana($diaSemana) {
        $this->diaSemana = $diaSemana;
    }

    public function setInicio($inicio) {
        $this->inicio = $inicio;
    }

    public function setFim($fim) {
        $this->fim = $fim;
    }

}
