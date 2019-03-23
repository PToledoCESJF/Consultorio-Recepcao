<?php

class ConvenioController {
    private $convenioDao;
    
    public function __construct() {
        $this->convenioDao = new ConvenioDAO();
    }
    
    public function carregar($idConvenio){
        return $this->convenioDao->carregar($idConvenio);
    }

    public function listar(){
        return $this->convenioDao->listar();
    }
    
    public function inserir(Convenio $convenio){
        $this->convenioDao->inserir($convenio);
    }
    
    public function atualizar(Convenio $convenio){
        $this->convenioDao->atualizar($convenio);
    }
    
    public function excluir($idConvenio){
        $this->convenioDao->excluir($idConvenio);
    }
}

