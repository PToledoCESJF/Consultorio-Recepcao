<?php
    require_once 'global.php';
    require_once 'cabecalho.php';
    
    $method = filter_input(INPUT_POST, 'metodo');
    
    if($method == 'inserir'){
        try {
            $especialidade = new Especialidade();
            $especialidadeController = new EspecialidadeController();

            $especialidade->setEspecialidade(filter_input(INPUT_POST, 'especialidade'));
            
            $especialidadeController->inserir($especialidade);
            header('Location: especialidade-lista.php');

        } catch (Exception $e) {
            Erro::trataErro($e);
        }
    }

    if($method == 'editar'){
        try {
            $especialidade = new Especialidade();
            $especialidadeController = new EspecialidadeController();

            $especialidade->setIdEspecialidade(filter_input(INPUT_POST, 'idEspecialidade'));
            $especialidade->setEspecialidade(filter_input(INPUT_POST, 'especialidade'));
            
            $especialidadeController->atualizar($especialidade);
            header('Location: especialidade-lista.php');

        } catch (Exception $e) {
            Erro::trataErro($e);
        }
    }

    if($method == 'excluir'){
        try {
            $especialidadeController = new EspecialidadeController();
            $idEspecialidade = filter_input(INPUT_POST, 'idEspecialidade');

            $especialidadeController->excluir($idEspecialidade);

            header('Location: especialidade-lista.php');

        } catch (Exception $e) {
            Erro::trataErro($e);
        }        
    }
