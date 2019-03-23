<?php
    require_once 'global.php';
    require_once 'cabecalho.php';
    
    $method = filter_input(INPUT_POST, 'metodo');
    
    if($method == 'inserir'){
        try {
            $paciente = new Paciente();
            $pacienteController = new PacienteController();

            $paciente->setNomePaciente(filter_input(INPUT_POST, 'nomePaciente'));
            $paciente->setProntuario(filter_input(INPUT_POST, 'prontuario'));
            $paciente->setDataNascimento(filter_input(INPUT_POST, 'dataNascimento'));
            $paciente->setCpf(filter_input(INPUT_POST, 'cpf'));
            $paciente->setRg(filter_input(INPUT_POST, 'rg'));
            $paciente->setLogradouro(filter_input(INPUT_POST, 'logradouro'));
            $paciente->setNumero(filter_input(INPUT_POST, 'numero'));
            $paciente->setComplemento(filter_input(INPUT_POST, 'complemento'));
            $paciente->setBairro(filter_input(INPUT_POST, 'bairro'));
            $paciente->setCidade(filter_input(INPUT_POST, 'cidade'));
            $paciente->setUf(filter_input(INPUT_POST, 'uf'));
            $paciente->setTelefone(filter_input(INPUT_POST, 'telefone'));
            $paciente->setObs(filter_input(INPUT_POST, 'obs'));

            $pacienteController->inserir($paciente);
            header('Location: paciente-lista.php');

        } catch (Exception $e) {
            Erro::trataErro($e);
        }
    }

    if($method == 'editar'){
        try {
            $paciente = new Paciente();
            $pacienteController = new PacienteController();

            $paciente->setIdPaciente(filter_input(INPUT_POST, 'idPaciente'));
            $paciente->setNomePaciente(filter_input(INPUT_POST, 'nomePaciente'));
            $paciente->setProntuario(filter_input(INPUT_POST, 'prontuario'));
            $paciente->setDataNascimento(filter_input(INPUT_POST, 'dataNascimento'));
            $paciente->setCpf(filter_input(INPUT_POST, 'cpf'));
            $paciente->setRg(filter_input(INPUT_POST, 'rg'));
            $paciente->setTelefone(filter_input(INPUT_POST, 'telefone'));
            $paciente->setLogradouro(filter_input(INPUT_POST, 'logradouro'));
            $paciente->setNumero(filter_input(INPUT_POST, 'numero'));
            $paciente->setComplemento(filter_input(INPUT_POST, 'complemento'));
            $paciente->setBairro(filter_input(INPUT_POST, 'bairro'));
            $paciente->setCidade(filter_input(INPUT_POST, 'cidade'));
            $paciente->setUf(filter_input(INPUT_POST, 'uf'));
            $paciente->setObs(filter_input(INPUT_POST, 'obs'));

            $pacienteController->atualizar($paciente);

            header('Location: paciente-lista.php');

        } catch (Exception $e) {
            Erro::trataErro($e);
        }        
        
    }

    if($method == 'excluir'){
        try {
            $pacienteController = new PacienteController();
            $idPaciente = filter_input(INPUT_POST, 'idPaciente');

            $pacienteController->excluir($idPaciente);

            header('Location: paciente-lista.php');

        } catch (Exception $e) {
            Erro::trataErro($e);
        }        
    }
