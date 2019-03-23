<?php

class Profissional {
    private $idProfissional;
    private $nomeCompleto;
    private $nomeProfissional;
    private $especialidade;
    private $crm;
    
    public function __construct($idProfissional = false)
    {
        if($idProfissional){
            $this->idProfissional = $idProfissional;
            ProfissionalDAO::carregar();
        }
    }

    public function getIdProfissional() {
        return $this->idProfissional;
    }
    
    public function getNomeCompleto() {
        return $this->nomeCompleto;
    }
    
    public function getNomeProfissional() {
        return $this->nomeProfissional;
    }

    public function getEspecialidade() {
        return $this->especialidade;
    }

    public function getCrm() {
        return $this->crm;
    }

    public function setIdProfissional($idProfissional) {
        $this->idProfissional = $idProfissional;
    }
    
    public function setNomeCompleto($nomeCompleto) {
        $this->nomeCompleto = $nomeCompleto;
    }

    public function setNomeProfissional($nome) {
        $this->nomeProfissional = $nome;
    }

    public function setEspecialidade($especialidade) {
        $this->especialidade = $especialidade;
    }

    public function setCrm($crm) {
        $this->crm = $crm;
    }


}
