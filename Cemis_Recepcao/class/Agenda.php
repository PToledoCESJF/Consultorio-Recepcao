<?php

class Agenda {
    private $idAgendamento;
    private $Profissional;
    private $Paciente;
    private $Convenio;
    private $dataConsulta;
    private $dataAgendamento;
    private $horario;
    private $tipoAgendamento;
    private $status;
    private $valorConsulta;
    private $obs;
    
    // Método Construtor
    public function __construct($idAgendamento = false)
    {
        if($idAgendamento){
            $this->idAgendamento = $idAgendamento;
            AgendaDAO::carregar();
        }
    }
        
    // Getters e Setters
    public function getIdAgendamento() {
        return $this->idAgendamento;
    }

    public function getProfissional() {
        return $this->Profissional;
    }

    public function getPaciente() {
        return $this->Paciente;
    }
    
    public function getConvenio() {
        return $this->convenio;
    }

    public function getDataConsulta() {
        return $this->dataConsulta;
    }

    public function getDataAgendamento() {
        return $this->dataAgendamento;
    }

    public function getHorario() {
        return $this->horario;
    }

    public function getTipoAgendamento() {
        return $this->tipoAgendamento;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getValorConsulta() {
        return $this->valorConsulta;
    }

    public function getObs() {
        return $this->obs;
    }
    
    public function setIdAgendamento($idAgendamento) {
        $this->idAgendamento = $idAgendamento;
    }

    public function setProfissional($Profissional) {
        $this->Profissional = $Profissional;
    }

    public function setPaciente($Paciente) {
        $this->Paciente = $Paciente;
    }

    public function setConvenio($convenio) {
        $this->convenio = $convenio;
    }

    public function setDataConsulta($dataConsulta) {
        $this->dataConsulta = $dataConsulta;
    }

    public function setDataAgendamento($dataAgendamento) {
        $this->dataAgendamento = $dataAgendamento;
    }

    public function setHorario($horario) {
        $this->horario = $horario;
    }

    public function setTipoAgendamento($tipoAgendamento) {
        $this->tipoAgendamento = $tipoAgendamento;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setValorConsulta($valorConsulta) {
        $this->valorConsulta = $valorConsulta;
    }

    public function setObs($obs) {
        $this->obs = $obs;
    }
    
}
