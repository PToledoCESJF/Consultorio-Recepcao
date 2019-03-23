<?php

class PacienteDAO {
    private $conexao;
    private $queryCarregar;
    private $queryListar;
    private $queryInserir;
    private $queryAtualizar;
    private $queryExcluir;
    
    public function __construct() {
        try {
            $this->conexao = Conexao::conectar();
            $this->queryCarregar = "SELECT * FROM paciente_tb WHERE idPaciente = :idPaciente";
            $this->queryListar = "SELECT * FROM paciente_tb ORDER BY nomePaciente";
            $this->queryInserir = "INSERT INTO paciente_tb(nomePaciente, prontuario, dataNascimento, "
                    . "cpf, rg, logradouro, numero, complemento, bairro, "
                    . "cidade, uf, telefone, obs) VALUES(:nomePaciente, :prontuario, "
                    . ":dataNascimento, :cpf, :rg, :logradouro, "
                    . ":numero, :complemento, :bairro, :cidade, :uf, :telefone, :obs)";
            $this->queryAtualizar = "UPDATE paciente_tb SET nomePaciente = :nomePaciente, "
                    . "prontuario = :prontuario, dataNascimento = :dataNascimento, cpf = :cpf, "
                    . "rg = :rg, logradouro = :logradouro, numero = :numero, complemento = :complemento, "
                    . "bairro = :bairro, cidade = :cidade, uf = :uf, telefone = :telefone, obs = :obs "
                    . "WHERE idPaciente = :idPaciente";
            $this->queryExcluir = "DELETE FROM paciente_tb WHERE idPaciente = :id";
        } catch (Exception $ex) {
            Erro::trataErro($exc);            
        }
    }
    
    public function carregar($idPaciente){
        try {
            $paciente = new Paciente();
            $stmt = $this->conexao->prepare($this->queryCarregar);
            $stmt->bindValue(':idPaciente', $idPaciente);
            $stmt->execute();
            $linha = $stmt->fetch();
            $paciente->setIdPaciente($linha['idPaciente']);
            $paciente->setNomePaciente($linha['nomePaciente']);
            $paciente->setProntuario($linha['prontuario']);
            $paciente->setDataNascimento($linha['dataNascimento']);
            $paciente->setCpf($linha['cpf']);
            $paciente->setRg($linha['rg']);
            $paciente->setLogradouro($linha['logradouro']);
            $paciente->setNumero($linha['numero']);
            $paciente->setComplemento($linha['complemento']);
            $paciente->setBairro($linha['bairro']);
            $paciente->setCidade($linha['cidade']);
            $paciente->setUf($linha['uf']);
            $paciente->setTelefone($linha['telefone']);
            $paciente->setObs($linha['obs']);
            return $paciente;
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public function listar(){
        try {
            $stmt = $this->conexao->query($this->queryListar);
            $stmt->execute();
            $lista = $stmt->fetchAll();
            return $lista;
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }

    }
    
    public function inserir(Paciente $paciente){
        try {
            $stmt = $this->conexao->prepare($this->queryInserir);
            $stmt->bindValue(':nomePaciente', $paciente->getNomePaciente());
            $stmt->bindValue(':prontuario', $paciente->getProntuario());
            $stmt->bindValue(':dataNascimento', $paciente->getDataNascimento());
            $stmt->bindValue(':cpf', $paciente->getCpf());
            $stmt->bindValue(':rg', $paciente->getRg());
            $stmt->bindValue(':logradouro', $paciente->getLogradouro());
            $stmt->bindValue(':numero', $paciente->getNumero());
            $stmt->bindValue(':complemento', $paciente->getComplemento());
            $stmt->bindValue(':bairro', $paciente->getBairro());
            $stmt->bindValue(':cidade', $paciente->getCidade());
            $stmt->bindValue(':uf', $paciente->getUf());
            $stmt->bindValue(':telefone', $paciente->getTelefone());
            $stmt->bindValue(':obs', $paciente->getObs());
            $stmt->execute();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }
    
    public function atualizar(Paciente $paciente){
        try {
            $stmt = $this->conexao->prepare($this->queryAtualizar);
            $stmt->bindValue(':nomePaciente', $paciente->getNomePaciente());
            $stmt->bindValue(':prontuario', $paciente->getProntuario());
            $stmt->bindValue(':dataNascimento', $paciente->getDataNascimento());
            $stmt->bindValue(':cpf', $paciente->getCpf());
            $stmt->bindValue(':rg', $paciente->getRg());
            $stmt->bindValue(':logradouro', $paciente->getLogradouro());
            $stmt->bindValue(':numero', $paciente->getNumero());
            $stmt->bindValue(':complemento', $paciente->getComplemento());
            $stmt->bindValue(':bairro', $paciente->getBairro());
            $stmt->bindValue(':cidade', $paciente->getCidade());
            $stmt->bindValue(':uf', $paciente->getUf());
            $stmt->bindValue(':telefone', $paciente->getTelefone());
            $stmt->bindValue(':obs', $paciente->getObs());
            $stmt->bindValue(':idPaciente', $paciente->getIdPaciente());
            $stmt->execute();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }
    
    public function excluir($id){
        try {
            $stmt = $this->conexao->prepare($this->queryExcluir);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }
    
}