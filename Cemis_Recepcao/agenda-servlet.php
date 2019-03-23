<?php

require_once 'global.php';
require_once 'cabecalho.php';

$method = filter_input(INPUT_POST, 'metodo');

if ($method == 'inserir') {
    try {
        $agenda = new Agenda();
        $agendaController = new AgendaController();

        $agenda->setProfissional(filter_input(INPUT_POST, 'profissional'));
        $agenda->setPaciente(filter_input(INPUT_POST, 'paciente'));
        $agenda->setConvenio(filter_input(INPUT_POST, 'convenio'));
        $agenda->setDataConsulta(filter_input(INPUT_POST, 'dataConsulta'));
        $agenda->setDataAgendamento(filter_input(INPUT_POST, 'dataAgendamento'));
        $agenda->setHorario(filter_input(INPUT_POST, 'horario'));
        $agenda->setTipoAgendamento(filter_input(INPUT_POST, 'tipoAgendamento'));
        $agenda->setStatus(filter_input(INPUT_POST, 'status'));
        $valor = filter_input(INPUT_POST, 'valorConsulta');
        $agenda->setObs(filter_input(INPUT_POST, 'obs'));

        if (!isset($valor)) {
            $agenda->setValorConsulta(0.0);
        } 
 /*       
        else {
            $arrValor = str_split($valor);
            $pontos = 0;
            $semPontos;
            for ($i = 0; $i < strlen($valor); $i++) {
                if ($arrValor[$i] === '.') {
                    $pontos++;
                }
            }
            if (strlen($valor) > 7) {
                $fim = 1;

                if (strlen($valor) > 11) {
                    $fim++;
                }
                $arrV = array();
                $j = 0;
                $p = 2;
                $vezes = 0;

                for ($i = 0; $i < strlen($valor) - 1; $i++) {
                    if ($arrValor[$i] === '.') {
                        $vezes++;
                        if ($vezes === 2) {
                            $p = $i + 1;
                            $j++;
                        } else {
                            $j += 2;
                        }
                        $arrV[$i] = $arrValor[$p];
                    } else {
                        $arrV[$i] = $arrValor[$j++];
                    }
                }

                if ($fim == 2) {
                    $j = 0;
                    for ($i = 0; $i < (strlen($valor) - $fim); $i++) {
                        if ($arrV[$i] === '.') {
                            $arrV[$i] = $arrV[++$j];
                            $j++;
                        } else {
                            $arrV[$i] = $arrV[$j++];
                        }
                    }
                    $novoArray = array();
                    for ($i = 0; $i < strlen($valor) - $pontos; $i++) {
                        $novoArray[$i] = $arrV[$i];
                    }
                    $semPontos = $novoArray;
                } else {
                    $semPontos = $arrV;
                }
            } else {
                $semPontos = $arrValor;
            }
            echo '<pre>';
            print_r($semPontos);
            echo '</pre>';

            for ($i = 0; $i < strlen($valor); $i++) {

                if ($semPontos[$i] === ',') {
                    $semPontos[$i] = '.';
                }
            }
            $valor = implode('', $semPontos);
            $agenda->setValorConsulta($valor);
        }
        echo '<pre>';
        print_r($semPontos);
        echo '</pre>';
*/
        
        $agendaController->inserir($agenda);
        header('Location: agenda-lista.php');
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
}

if ($method == 'editar') {
    try {

        $agenda = new Agenda();
        $agendaController = new AgendaController();

        $agenda->setIdAgendamento(filter_input(INPUT_POST, 'idAgendamento'));
        $agenda->setProfissional(filter_input(INPUT_POST, 'profissional'));
        $agenda->setPaciente(filter_input(INPUT_POST, 'paciente'));
        $agenda->setConvenio(filter_input(INPUT_POST, 'convenio'));
        $agenda->setDataConsulta(filter_input(INPUT_POST, 'dataConsulta'));
        $agenda->setDataAgendamento(filter_input(INPUT_POST, 'dataAgendamento'));
        $agenda->setHorario(filter_input(INPUT_POST, 'horario'));
        $agenda->setTipoAgendamento(filter_input(INPUT_POST, 'tipoAgendamento'));
        $agenda->setStatus(filter_input(INPUT_POST, 'status'));
        $valor = filter_input(INPUT_POST, 'valorConsulta');
        $agenda->setObs(filter_input(INPUT_POST, 'obs'));

        if (!isset($valor)) {
            $agenda->setValorConsulta(0.0);
        } 
        
        $agendaController->atualizar($agenda);

        $voltar = filter_input(INPUT_POST, 'vlt');

        if ($voltar == 'aglst') {
            $header = 'Location: agenda-lista.php';
        }
        if ($voltar == 'agpac') {
            $header = 'Location: agendamento-por-paciente.php?id=' . $agenda->getPaciente();
        }

        header($header);
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
}

if ($method == 'excluir') {
    try {
        $agendaController = new AgendaController();
        $idAgendamento = filter_input(INPUT_POST, 'idAgendamento');

        $agendaController->excluir($idAgendamento);
        header('Location: agenda-lista.php');
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
}
