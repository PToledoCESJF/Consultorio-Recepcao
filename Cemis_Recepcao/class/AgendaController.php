<?php

class AgendaController {
    private $agendaDao;
    
    public function __construct() {
        $this->agendaDao = new AgendaDAO();
    }
    
    public function carregar($idAgendamento){
        return $this->agendaDao->carregar($idAgendamento);
    }

    public function listar(){
        return $this->agendaDao->listar();
    }
    
    public function listarPorProfissional($idProfissional){
        return $this->agendaDao->listarPorProfissional($idProfissional);
    }
    
    public function listarPorPaciente($idPaciente){
        return $this->agendaDao->listarPorPaciente($idPaciente);
    }
    
    public function inserir(Agenda $agenda){
        $this->agendaDao->inserir($agenda);
    }
    
    public function atualizar(Agenda $agenda){
        $this->agendaDao->atualizar($agenda);
    }
    
    public function excluir($idAgendamento){
        $this->agendaDao->excluir($idAgendamento);
    }
}

