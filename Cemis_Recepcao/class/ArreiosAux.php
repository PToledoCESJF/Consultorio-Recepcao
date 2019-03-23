<?php

class ArreiosAux {

    private $tpAg;
    private $status;
    private $tpConvenio;
    private $estados;

    public function __construct() {
        $this->tpAg = ['0' => 'Consulta', '1' => 'Retorno', '2' => 'Exame',
            '3' => 'Resultado de Exame', '4' => 'Cirurgia', '5' => 'Outros'];
        
        $this->status = ['AG' => 'Agendado', 'CF' => 'Confirmado','AD' => 'Aguardando', 
            'EA' => 'Em atendimento', 'AT' => 'Atendido', 'NC' => 'Não compareceu', 
            'CA' => 'Cancelado'];

        $this->tpConvenio = ['Individual', 'Familiar', 'Corporativo', 'Cooperativa'];
        
        $this->estados = ['AC'=>'Acre', 'AL'=>'Alagoas', 'AP'=>'Amapá', 'AM'=>'Amazonas',
                        'BA'=>'Bahia', 'CE'=>'Ceará', 'DF'=>'Distrito Federal', 'ES'=>'Espírito Santo',
                        'GO'=>'Goiás', 'MA'=>'Maranhão', 'MT'=>'Mato Grosso', 'MS'=>'Mato Grosso do Sul',
                        'MG'=>'Minas Gerais','PA'=>'Pará', 'PB'=>'Paraíba', 'PR'=>'Paraná',
                        'PE'=>'Pernambuco', 'PI'=>'Piauí', 'RJ'=>'Rio de Janeiro', 'RN'=>'Rio Grande do Norte',
                        'RS'=>'Rio Grande do Sul', 'RO'=>'Rondônia', 'RR'=>'Roraima', 'SC'=>'Santa Catarina',
                        'SP'=>'São Paulo', 'SE'=>'Sergipe', 'TO'=>'Tocantins'];
    }

    public function getTpAg() {
        return $this->tpAg;
    }
    
    public function getStatus() {
        return $this->status;
    }

    public function getTpConvenio() {
        return $this->tpConvenio;
    }

    public function getEstados() {
        return $this->estados;
    }

}
