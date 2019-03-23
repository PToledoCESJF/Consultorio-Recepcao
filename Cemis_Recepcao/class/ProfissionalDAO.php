<?php

class ProfissionalDAO {
    private $conexao;
    private $queryCarregar;
    private $queryListar;
    private $queryInserir;
    private $queryAtualizar;
    private $queryExcluir;
    
    public function __construct() {
        try {
            $this->conexao = Conexao::conectar();
            $this->queryCarregar = "SELECT * FROM profissional_tb WHERE idProfissional = :idProfissional";
            $this->queryListar = "SELECT * FROM profissional_tb ORDER BY nomeProfissional";
            $this->queryInserir = "INSERT INTO profissional_tb(nomeCompleto, nomeProfissional, especialidade, crm) "
                    . "VALUES(:nomeCompleto, :nomeProfissional, :especialidade, :crm)";
            $this->queryAtualizar = "UPDATE profissional_tb SET nomeCompleto = :nomeCompleto, nomeProfissional = :nomeProfissional, "
                    . "especialidade = :especialidade, crm = :crm WHERE idProfissional = :idProfissional";
            $this->queryExcluir = "DELETE FROM profissional_tb WHERE idProfissional = :id";
        } catch (Exception $ex) {
            Erro::trataErro($ex);            
        }
    }
    
    public function carregar($idProfissional){
        try {
            $profissional = new Profissional();
            $stmt = $this->conexao->prepare($this->queryCarregar);
            $stmt->bindValue(':idProfissional', $idProfissional);
            $stmt->execute();
            $linha = $stmt->fetch();
            $profissional->setIdProfissional($linha['idProfissional']);
            $profissional->setNomeCompleto($linha['nomeCompleto']);
            $profissional->setNomeProfissional($linha['nomeProfissional']);
            $profissional->setEspecialidade($linha['especialidade']);
            $profissional->setCrm($linha['crm']);
            return $profissional;
        } catch (Exception $ex) {
            Erro::trataErro($ex);            
        }
    }
    
    public function listar(){
        try {
            $stmt = $this->conexao->query($this->queryListar);
            $stmt->execute();
            $lista = $stmt->fetchAll();
            return $lista;
        } catch (Exception $ex) {
            Erro::trataErro($ex);            
        }
    }
    
    public function inserir(Profissional $profissional){
        try {
            $stmt = $this->conexao->prepare($this->queryInserir);
            $stmt->bindValue(':nomeCompleto', $profissional->getNomeCompleto());
            $stmt->bindValue(':nomeProfissional', $profissional->getNomeProfissional());
            $stmt->bindValue(':especialidade', $profissional->getEspecialidade());
            $stmt->bindValue(':crm', $profissional->getCrm());
            $stmt->execute();
        } catch (Exception $ex) {
            Erro::trataErro($ex);            
        }
    }

    public function atualizar(Profissional $profissional){
        try {
            $stmt = $this->conexao->prepare($this->queryAtualizar);
            $stmt->bindValue(':nomeCompleto', $profissional->getNomeCompleto());
            $stmt->bindValue(':nomeProfissional', $profissional->getNomeProfissional());
            $stmt->bindValue(':especialidade', $profissional->getEspecialidade());
            $stmt->bindValue(':crm', $profissional->getCrm());
            $stmt->bindValue(':idProfissional', $profissional->getIdProfissional());
            $stmt->execute();
        } catch (Exception $ex) {
            Erro::trataErro($ex);            
        }
    }
    
    public function excluir($id){
        try {
            $stmt = $this->conexao->prepare($this->queryExcluir);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        } catch (Exception $ex) {
            Erro::trataErro($ex);            
        }
    }
}
