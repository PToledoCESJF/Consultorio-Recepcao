<?php

class Paciente {
    private $idPaciente;
    private $nomePaciente;
    private $prontuario;
    private $dataNascimento;
    private $cpf;
    private $rg;
    private $logradouro;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $uf;
    private $telefone;
    private $obs;
        
    public function __construct($idPaciente = false)
    {
        if($idPaciente){
            $pacienteController = new PacienteController();
            return $pacienteController->carregar($idPaciente);
            
        }
    }

    public function getIdPaciente() {
        return $this->idPaciente;
    }

    public function getNomePaciente() {
        return $this->nomePaciente;
    }

    public function getProntuario() {
        return $this->prontuario;
    }

    public function getDataNascimento() {
        return $this->dataNascimento;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getRg() {
        return $this->rg;
    }

    public function getLogradouro() {
        return $this->logradouro;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getComplemento() {
        return $this->complemento;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getUf() {
        return $this->uf;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getObs() {
        return $this->obs;
    }

    public function setIdPaciente($idPaciente) {
        $this->idPaciente = $idPaciente;
    }

    public function setNomePaciente($nomePaciente) {
        $this->nomePaciente = $nomePaciente;
    }

    public function setProntuario($prontuario) {
        $this->prontuario = $prontuario;
    }

    public function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setRg($rg) {
        $this->rg = $rg;
    }

    public function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setUf($uf) {
        $this->uf = $uf;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setObs($obs) {
        $this->obs = $obs;
    }

}
