<?php

class AgendaDAO {
    private $conexao;
    private $queryCarregar;
    private $queryListar;
    private $queryListarPorProfissional;
    private $queryListarPorPaciente;
    private $queryInserir;
    private $queryAtualizar;
    private $queryExcluir;

    public function __construct() {
        try {
            $this->conexao = Conexao::conectar();
            $this->queryCarregar = "SELECT * FROM agenda_tb WHERE idAgendamento = :idAgendamento";
            $this->queryListar = "SELECT * FROM agenda_tb ORDER BY dataConsulta, horario";
            $this->queryListarPorProfissional = "SELECT * FROM agenda_tb WHERE Profissional = :idProfissional "
                    . "ORDER BY dataConsulta, horario";
            $this->queryListarPorPaciente = "SELECT * FROM agenda_tb WHERE Paciente = :idPaciente "
                    . "ORDER BY dataConsulta, horario";
            $this->queryInserir = "INSERT INTO agenda_tb(Profissional, Paciente, Convenio, dataConsulta, "
                    . "dataAgendamento, horario, tipoAgendamento, status, valorConsulta, obs) "
                    . "VALUES(:M, :P, :C, :dC, :dA, :hr, :tA, :st, :vC, :obs)";
            $this->queryAtualizar = "UPDATE agenda_tb SET Profissional = :Profissional, Paciente = :Paciente, "
                    . "Convenio = :Convenio, dataConsulta = :dataConsulta, dataAgendamento = :dataAgendamento, "
                    . "horario = :horario, tipoAgendamento = :tipoAgendamento, "
                    . "status = :status, valorConsulta = :valorConsulta, obs = :obs "
                    . "WHERE idAgendamento = :idAgendamento";
            $this->queryExcluir = "DELETE FROM agenda_tb WHERE idAgendamento = :id";
        } catch (Exception $ex) {
            Erro::trataErro($ex);            
        }
    }
    
    public function carregar($idAgendamento){
        try {
            $agenda = new Agenda();
            $stmt = $this->conexao->prepare($this->queryCarregar);
            $stmt->bindValue(':idAgendamento', $idAgendamento);
            $stmt->execute();
            $linha = $stmt->fetch();
            $agenda->setIdAgendamento($linha['idAgendamento']);
            $agenda->setProfissional($linha['Profissional']);
            $agenda->setPaciente($linha['Paciente']);
            $agenda->setConvenio($linha['Convenio']);
            $agenda->setDataConsulta($linha['dataConsulta']);
            $agenda->setDataAgendamento($linha['dataAgendamento']);
            $agenda->setHorario($linha['horario']);
            $agenda->setTipoAgendamento($linha['tipoAgendamento']);
            $agenda->setStatus($linha['status']);
            $agenda->setValorConsulta($linha['valorConsulta']);
            $agenda->setObs($linha['obs']);
            return $agenda;
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
    
    public function listarPorProfissional($idProfissional){
        try {
            $stmt = $this->conexao->prepare($this->queryListarPorProfissional);
            $stmt->bindValue(':idProfissional', $idProfissional);
            $stmt->execute();
            $lista = $stmt->fetchAll();
            return $lista;
        } catch (Exception $ex) {
            Erro::trataErro($ex);            
        }
    }
    
    public function listarPorPaciente($idPaciente){
        try {
            $stmt = $this->conexao->prepare($this->queryListarPorPaciente);
            $stmt->bindValue(':idPaciente', $idPaciente);
            $stmt->execute();
            $lista = $stmt->fetchAll();
            return $lista;
        } catch (Exception $ex) {
            Erro::trataErro($ex);            
        }
    }
    
    public function inserir(Agenda $agenda){
        try {
            $stmt = $this->conexao->prepare($this->queryInserir);
            $stmt->bindValue(':M', $agenda->getProfissional());
            $stmt->bindValue(':P', $agenda->getPaciente());
            $stmt->bindValue(':C', $agenda->getConvenio());
            $stmt->bindValue(':dC', $agenda->getDataConsulta());
            $stmt->bindValue(':dA', $agenda->getDataAgendamento());
            $stmt->bindValue(':hr', $agenda->getHorario());
            $stmt->bindValue(':tA', $agenda->getTipoAgendamento());
            $stmt->bindValue(':st', $agenda->getStatus());
            $stmt->bindValue(':vC', $agenda->getValorConsulta());
            $stmt->bindValue(':obs', $agenda->getObs());
            $stmt->execute();
        } catch (Exception $ex) {
            Erro::trataErro($ex);            
        }
    }
    
    public function atualizar(Agenda $agenda){
        try {
            $stmt = $this->conexao->prepare($this->queryAtualizar);
            $stmt->bindValue(':Profissional', $agenda->getProfissional());
            $stmt->bindValue(':Paciente', $agenda->getPaciente());
            $stmt->bindValue(':Convenio', $agenda->getConvenio());
            $stmt->bindValue(':dataConsulta', $agenda->getDataConsulta());
            $stmt->bindValue(':dataAgendamento', $agenda->getDataAgendamento());
            $stmt->bindValue(':horario', $agenda->getHorario());
            $stmt->bindValue(':tipoAgendamento', $agenda->getTipoAgendamento());
            $stmt->bindValue(':status', $agenda->getStatus());
            $stmt->bindValue(':valorConsulta', $agenda->getValorConsulta());
            $stmt->bindValue(':obs', $agenda->getObs());
            $stmt->bindValue(':idAgendamento', $agenda->getIdAgendamento());
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
