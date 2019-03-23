<?php
    require_once 'global.php';
    require_once 'cabecalho.php';
    
    $method = filter_input(INPUT_POST, 'metodo');
    
    if($method == 'inserir'){
        try {
            $profissional = new Profissional();
            $profissionalController = new ProfissionalController();

            $profissional->setNomeCompleto(filter_input(INPUT_POST, 'nomeCompleto'));
            $profissional->setNomeProfissional(filter_input(INPUT_POST, 'nomeProfissional'));
            $profissional->setEspecialidade(filter_input(INPUT_POST, 'especialidade'));
            $profissional->setCrm(filter_input(INPUT_POST, 'crm'));
            
            $profissionalController->inserir($profissional);
            header('Location: profissional-lista.php');

        } catch (Exception $e) {
            Erro::trataErro($e);
        }
    }

    if($method == 'editar'){
        try {
            $profissional = new Profissional();
            $profissionalController = new ProfissionalController();

            $profissional->setIdProfissional(filter_input(INPUT_POST, 'idProfissional'));
            $profissional->setNomeCompleto(filter_input(INPUT_POST, 'nomeCompleto'));
            $profissional->setNomeProfissional(filter_input(INPUT_POST, 'nomeProfissional'));
            $profissional->setEspecialidade(filter_input(INPUT_POST, 'especialidade'));
            $profissional->setCrm(filter_input(INPUT_POST, 'crm'));
            
            $profissionalController->atualizar($profissional);
            header('Location: profissional-lista.php');

        } catch (Exception $e) {
            Erro::trataErro($e);
        }
    }

    if($method == 'excluir'){
        try {
            $profissionalController = new ProfissionalController();
            $idProfissional = filter_input(INPUT_POST, 'idProfissional');

            $profissionalController->excluir($idProfissional);
            header('Location: profissional-lista.php');
        } catch (Exception $e) {
            Erro::trataErro($e);
        }        
    }
