<?php

class EspecialidadeDAO {
    private $conexao;
    private $queryCarregar;
    private $queryListar;
    private $queryInserir;
    private $queryAtualizar;
    private $queryExcluir;

    public function __construct() {
        try{
            $this->conexao = Conexao::conectar();
            $this->queryCarregar = "SELECT * FROM especialidade_tb WHERE idEspecialidade = :idEspecialidade";
            $this->queryListar = "SELECT * FROM especialidade_tb ORDER BY especialidade";
            $this->queryInserir = "INSERT INTO especialidade_tb(especialidade) VALUES(:especialidade)";
            $this->queryAtualizar = "UPDATE especialidade_tb SET especialidade = :especialidade "
                    . "WHERE idEspecialidade = :idEspecialidade";
            $this->queryExcluir = "DELETE FROM especialidade_tb WHERE idEspecialidade = :id";
        } catch (Exception $ex) {
            Erro::trataErro($ex);            
        }
    }
    
    public function carregar($idEspecialidade){
        try {
            $especialidade = new Especialidade();
            $stmt = $this->conexao->prepare($this->queryCarregar);
            $stmt->bindValue(':idEspecialidade', $idEspecialidade);
            $stmt->execute();
            $linha = $stmt->fetch();
            $especialidade->setIdEspecialidade($linha['idEspecialidade']);
            $especialidade->setEspecialidade($linha['especialidade']);
            return $especialidade;
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
    
    public function inserir(Especialidade $especialidade){
        try {
            $stmt = $this->conexao->prepare($this->queryInserir);
            $stmt->bindValue(':especialidade', $especialidade->getEspecialidade());
            $stmt->execute();
        } catch (Exception $ex) {
            Erro::trataErro($ex);            
        }
    }
    
    public function atualizar(Especialidade $especialidade){
        try {
            $stmt = $this->conexao->prepare($this->queryAtualizar);
            $stmt->bindValue(':especialidade', $especialidade->getEspecialidade());
            $stmt->bindValue(':idEspecialidade', $especialidade->getIdEspecialidade());
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
