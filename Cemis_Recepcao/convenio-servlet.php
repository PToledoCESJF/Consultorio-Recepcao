<?php
    require_once 'global.php';
    require_once 'cabecalho.php';
    
    $method = filter_input(INPUT_POST, 'metodo');
    
    if($method == 'inserir'){
        try {
            $convenio = new Convenio();
            $convenioController = new ConvenioController();

            $convenio->setConvenio(filter_input(INPUT_POST, 'convenio'));
            $convenio->setTelefone(filter_input(INPUT_POST, 'telefone'));
            $convenio->setObs(filter_input(INPUT_POST, 'obs'));
            $convenio->setTipo(filter_input(INPUT_POST, 'tipo'));
            
            $convenioController->inserir($convenio);
            header('Location: convenio-lista.php');

        } catch (Exception $e) {
            Erro::trataErro($e);
        }
    }

    if($method == 'editar'){
        try {
            $convenio = new Convenio();
            $convenioController = new ConvenioController();

            $convenio->setIdConvenio(filter_input(INPUT_POST, 'idConvenio'));
            $convenio->setConvenio(filter_input(INPUT_POST, 'convenio'));
            $convenio->setTelefone(filter_input(INPUT_POST, 'telefone'));
            $convenio->setObs(filter_input(INPUT_POST, 'obs'));
            $convenio->setTipo(filter_input(INPUT_POST, 'tipo'));
            
            $convenioController->atualizar($convenio);
            header('Location: convenio-lista.php');

        } catch (Exception $e) {
            Erro::trataErro($e);
        }
    }

    if($method == 'excluir'){
        try {
            $convenioController = new ConvenioController();
            $idConvenio = filter_input(INPUT_POST, 'idConvenio');

            $convenioController->excluir($idConvenio);

            header('Location: convenio-lista.php');

        } catch (Exception $e) {
            Erro::trataErro($e);
        }        
    }
