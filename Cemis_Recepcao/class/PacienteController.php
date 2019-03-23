<?php
    
class PacienteController {
    private $pacienteDao;
    
    public function __construct(){
        $this->pacienteDao= new PacienteDAO();
    }
    public function carregar($idPaciente) {
        return $this->pacienteDao->carregar($idPaciente);
    }
    
    public function listar(){
        return $this->pacienteDao->listar();
    }
    
    public function inserir(Paciente $paciente){
        $this->pacienteDao->inserir($paciente);
    }
    
    public function atualizar(Paciente $paciente){
        $this->pacienteDao->atualizar($paciente);
    }
    
    public function excluir($idPaciente){
        $this->pacienteDao->excluir($idPaciente);
    }
    
}
