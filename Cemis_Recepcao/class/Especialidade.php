<?php

class Especialidade {
    private $idEspecialidade;
    private $especialidade;
    
     public function __construct($idEspecialidade = false)
    {
        if($idEspecialidade){
            $especialidadeController = new EspecialidadeController();
            return $especialidadeController->carregar($idEspecialidade);
        }
    }
    
    public function getIdEspecialidade() {
        return $this->idEspecialidade;
    }

    public function getEspecialidade() {
        return $this->especialidade;
    }

    public function setIdEspecialidade($idEspecialidade) {
        $this->idEspecialidade = $idEspecialidade;
    }

    public function setEspecialidade($especialidade) {
        $this->especialidade = $especialidade;
    }

}
