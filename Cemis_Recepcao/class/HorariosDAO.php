<?php

class HorariosDAO {
    private $conexao;
    private $queryCarregar;
    private $queryListar;
    private $queryInserir;
    private $queryAtualizar;
    private $queryExcluir;

    public function __construct() {
        $this->conexao = Conexao::conectar();
        $this->queryCarregar = "SELECT * FROM horarios_tb WHERE idHorarios = :idHorarios";
        $this->queryListar = "SELECT * FROM horarios_tb ORDER BY Profissional";
        $this->queryInserir = "INSERT INTO horarios_tb(Profissional, diaSemana, inicio, fim) "
                . "VALUES(:Profissional, :diaSemana, :inicio, :fim)";
        $this->queryAtualizar = "UPDATE horarios_tb SET Profissional = :Profissional, diaSemana = :diaSemana, "
                . "inicio = :inicio, fim = :fim WHERE idHorarios = :idHorarios";
        $this->queryExcluir = "DELETE FROM horarios_tb WHERE idHorarios = :id";
    }
    
    public function carregar(){
        $horario = new Horarios();
        $stmt = $this->conexao->prepare($this->queryCarregar);
        $stmt->bindValue(':idHorarios', $horario->getIdHorarios());
        $stmt->execute();
        $linha = $stmt->fetch();
        $horario->setProfissional($linha['Profissional']);
        $horario->setDiaSemana($linha['diaSemana']);
        $horario->setInicio($linha['inicio']);
        $horario->setFim($linha['fim']);
    }
    
    public function listar(){
        $stmt = $this->conexao->query($this->queryListar);
        $stmt->execute();
        $lista = $stmt->fetchAll();
        return $lista;
    }
    
    public function inserir(Horarios $horario){
        $stmt = $this->conexao->prepare($this->queryInserir);
        $stmt->bindValue(':Profissional', $horario->getProfissional());
        $stmt->bindValue(':diaSemana', $horario->getDiaSemana());
        $stmt->bindValue(':inicio', $horario->getInicio());
        $stmt->bindValue(':fim', $horario->getFim());
        $stmt->execute();
    }
    
    public function atualizar(Horarios $horario){
        $stmt = $this->conexao->prepare($this->queryAtualizar);
        $stmt->bindValue(':Profissional', $horario->getProfissional());
        $stmt->bindValue(':diaSemana', $horario->getDiaSemana());
        $stmt->bindValue(':inicio', $horario->getInicio());
        $stmt->bindValue(':fim', $horario->getFim());
        $stmt->bindValue(':idHorarios', $horario->getIdHorarios());
        $stmt->execute();
    }

    public function excluir($id){
        $stmt = $this->conexao->prepare($this->queryExcluir);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}
