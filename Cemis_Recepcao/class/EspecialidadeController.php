<?php

class EspecialidadeController {
    private $especialidadeDao;
    
    public function __construct() {
        $this->especialidadeDao = new EspecialidadeDAO();
    }
    
    public function carregar($idEspecialidade){
        return $this->especialidadeDao->carregar($idEspecialidade);
    }

    public function listar(){
        return $this->especialidadeDao->listar();
    }
    
    public function inserir(Especialidade $especialidade){
        $this->especialidadeDao->inserir($especialidade);
    }
    
    public function atualizar(Especialidade $especialidade){
        $this->especialidadeDao->atualizar($especialidade);
    }
    
    public function excluir($idEspecialidade){
        $this->especialidadeDao->excluir($idEspecialidade);
    }
}

