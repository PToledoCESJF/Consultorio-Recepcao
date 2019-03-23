<?php

class Convenio {
    private $idConvenio;
    private $convenio;
    private $telefone;
    private $tipo;
    private $obs;

    public function __construct($idConvenio = false)
    {
        if($idConvenio){
            $convenioController = new ConvenioController();
            return $convenioController->carregar($idConvenio);
        }
    }
    
    public function getIdConvenio() {
        return $this->idConvenio;
    }

    public function getConvenio() {
        return $this->convenio;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getObs() {
        return $this->obs;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setIdConvenio($idConvenio) {
        $this->idConvenio = $idConvenio;
    }

    public function setConvenio($convenio) {
        $this->convenio = $convenio;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setObs($obs) {
        $this->obs = $obs;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }


    
}
