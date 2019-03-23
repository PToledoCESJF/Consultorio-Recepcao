<?php
require_once 'global.php';
try {
    $agendaController = new AgendaController();
    $pacienteController = new PacienteController();
    $profissionalController = new ProfissionalController();
    $convenioController = new ConvenioController();
    $arreios = new ArreiosAux();

    $agenda = $agendaController->listarPorPaciente(filter_input(INPUT_GET, 'id'));
    $lstPaciente = $pacienteController->listar();
    $lstProfissional = $profissionalController->listar();
    $lstConvenio = $convenioController->listar();
    $arrayTpAg = $arreios->getTpAg();
    $arrayStatus = $arreios->getStatus();
} catch (Exception $e) {
    Erro::trataErro($e);
}
foreach ($lstPaciente as $p) {
    foreach ($agenda as $a) {
        if ($a['Paciente'] == $p['idPaciente']) {
            $paciente = $p['nomePaciente'];
            $prontuario = $p['prontuario'];
        }
    }
}
$volta = 'agpac';
require_once 'cabecalho.php';
?>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-4">
            <div class="row">
                <h4>Agendamentos do paciente:</h4>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <a href="paciente-lista.php" class="btn btn-success btn-block"><< Voltar</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <table class="table table-striped">
                    <thead class="tablink">
                        <tr>
                            <th><h3><i><?php echo $paciente ?></i></h3></th>
                        </tr>
                    </thead>
                    <?php
                    foreach ($agenda as $a):
                        $dataHorario = date_create($a['dataConsulta'] . $a['horario']);
                        $dataAgend = date_create($a['dataAgendamento']);
                        foreach ($lstProfissional as $prof) {
                            if ($a['Profissional'] == $prof['idProfissional']) {
                                $profissional = $prof['nomeProfissional'];
                            }
                        }
                        foreach ($lstConvenio as $conv){
                            if($a['Convenio'] == $conv['idConvenio']){
                                $convenio = $conv['convenio'];
                            }
                        }
                        foreach ($arrayTpAg as $idTa => $ta) {
                            if ($a['tipoAgendamento'] == $idTa) {
                                $tipo = $ta;
                            }
                        }
                        foreach ($arrayStatus as $idSt => $st) {
                            if ($a['status'] == $idSt) {
                                $status = $st;
                            }
                        }
                        ?>
                        <tbody>
                            <tr>
                                <td>
                                    <form action="agenda-editar.php" method="POST">
                                        <p>Data e horário do atendimento: <a href="agenda-editar.php?id=<?php echo $a['idAgendamento'] ?>&vlt=<?php echo $volta ?>"><b><?php echo date_format($dataHorario, "d-m-Y  /  H:i") ?></b></a></p>
                                        <input type="hidden" name="voltar" value="ag-pac">
                                    </form>
                                    
                                    <p>Profissional: <b><?php echo $profissional ?></b></p>
                                    <p>Convênio: <b><?php echo $convenio ?></b></p>
                                    <p>Data do agendamento: <b><?php echo date_format($dataAgend, "d-m-Y") ?></b></p>
                                    <p>Tipo de agendamento: <b><?php echo $tipo ?></b></p>
                                    <p>Status: <a href="agenda-editar-status.php?id=<?php echo $a['idAgendamento'] ?>&vlt=<?php echo $volta ?>"><b><?php echo $status ?></b></a></p>
                                    <p>Valor da consulta: <b>R$ <?php echo $a['valorConsulta'] ?></b></p>
                                    <p>Observações: <b><?php echo $a['obs'] ?></b></p>
                                </td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once 'rodape.php' ?>