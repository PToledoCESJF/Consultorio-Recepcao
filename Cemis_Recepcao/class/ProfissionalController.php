<?php

class ProfissionalController {
    private $profissionalDao;
    
    public function __construct() {
        $this->profissionalDao = new ProfissionalDAO();
    }
    
    public function carregar($idProfissional){
        return $this->profissionalDao->carregar($idProfissional);
    }

    public function listar(){
        return $this->profissionalDao->listar();
    }
    
    public function inserir(Profissional $profissional){
        $this->profissionalDao->inserir($profissional);
    }
    
    public function atualizar(Profissional $profissional){
        $this->profissionalDao->atualizar($profissional);
    }
    
    public function excluir($idProfissional){
        $this->profissionalDao->excluir($idProfissional);
    }
}

