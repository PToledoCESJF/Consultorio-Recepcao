<?php

class ConvenioDAO {
    private $conexao;
    private $queryCarregar;
    private $queryListar;
    private $queryInserir;
    private $queryAtualizar;
    private $queryExcluir;

    public function __construct() {
        try {
            $this->conexao = Conexao::conectar();
            $this->queryCarregar = "SELECT * FROM convenio_tb WHERE idConvenio = :idConvenio";
            $this->queryListar = "SELECT * FROM convenio_tb ORDER BY idConvenio";
            $this->queryInserir = "INSERT INTO convenio_tb(convenio, telefone, "
                    . "obs, tipo) VALUES(:convenio, :telefone, :obs, :tipo)";
            $this->queryAtualizar = "UPDATE convenio_tb SET convenio = :convenio, "
                    . "telefone = :telefone, obs = :obs, tipo = :tipo "
                    . "WHERE idConvenio = :idConvenio";
            $this->queryExcluir = "DELETE FROM convenio_tb WHERE idConvenio = :id";
        } catch (Exception $ex) {
            Erro::trataErro($ex);            
        }
    }
    
    public function carregar($idConvenio){
        try{
            $convenio = new Convenio();
            $stmt = $this->conexao->prepare($this->queryCarregar);
            $stmt->bindValue(':idConvenio', $idConvenio);
            $stmt->execute();
            $linha = $stmt->fetch();
            $convenio->setIdConvenio($linha['idConvenio']);
            $convenio->setConvenio($linha['convenio']);
            $convenio->setTelefone($linha['telefone']);
            $convenio->setObs($linha['obs']);
            $convenio->setTipo($linha['tipo']);
            return $convenio;
        } catch (Exception $ex) {
            Erro::trataErro($ex);            
        }
    }
    
    public function listar(){
        try{
            $stmt = $this->conexao->query($this->queryListar);
            $stmt->execute();
            $lista = $stmt->fetchAll();
            return $lista;
        } catch (Exception $ex) {
            Erro::trataErro($ex);            
        }
    }
    
    public function inserir(Convenio $convenio){
        try{
            $stmt = $this->conexao->prepare($this->queryInserir);
            $stmt->bindValue(':convenio', $convenio->getConvenio());
            $stmt->bindValue(':telefone', $convenio->getTelefone());
            $stmt->bindValue(':obs', $convenio->getObs());
            $stmt->bindValue(':tipo', $convenio->getTipo());
            $stmt->execute();
        } catch (Exception $ex) {
            Erro::trataErro($ex);            
        }
    }
    
    public function atualizar(Convenio $convenio){
        try{
            $stmt = $this->conexao->prepare($this->queryAtualizar);
            $stmt->bindValue(':convenio', $convenio->getConvenio());
            $stmt->bindValue(':telefone', $convenio->getTelefone());
            $stmt->bindValue(':obs', $convenio->getObs());
            $stmt->bindValue(':tipo', $convenio->getTipo());
            $stmt->bindValue(':idConvenio', $convenio->getIdConvenio());
            $stmt->execute();
        } catch (Exception $ex) {
            Erro::trataErro($ex);            
        }
    }
    
    public function excluir($id){
        try{
            $stmt = $this->conexao->prepare($this->queryExcluir);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        } catch (Exception $ex) {
            Erro::trataErro($ex);            
        }
    }
}