<?php
require_once 'global.php';
try {
    $agendaController = new AgendaController();
    $pacienteController = new PacienteController();

    $agenda = $agendaController->carregar(filter_input(INPUT_GET, 'id'));
    $voltar = filter_input(INPUT_GET, 'vlt');
    $lstPaciente = $pacienteController->listar();
} catch (Exception $e) {
    Erro::trataErro($e);
}
foreach ($lstPaciente as $p) {
    if ($agenda->getPaciente() == $p['idPaciente']) {
        $paciente = $p['nomePaciente'];
    }
}
require_once 'cabecalho.php';
?>
<link href="assets/css/menu-agenda.css" rel="stylesheet">
<div class="row">
    <div class="col-md-12">
        <h2>Alterar status</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <h3><?php echo $paciente ?></h3>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <?php $dataHorario = date_create($agenda->getDataConsulta() . $agenda->getHorario()) ?>
        <h3><?php echo date_format($dataHorario, "d/m/Y - H:i") ?></h3>
    </div>    
</div>    
<form action="agenda-servlet.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-4">
            <input type="hidden" name="metodo" value="editar">
            <input type="hidden" name="vlt" value="<?php echo $voltar ?>">

            <input type="hidden" name="idAgendamento" value="<?php echo $agenda->getIdAgendamento() ?>">        
            <input type="hidden" name="paciente" value="<?php echo $agenda->getPaciente() ?>">
            <input type="hidden" name="convenio" value="<?php echo $agenda->getConvenio() ?>">
            <input type="hidden" name="profissional" value="<?php echo $agenda->getProfissional() ?>">        
            <input type="hidden" name="dataConsulta" value="<?php echo $agenda->getDataConsulta() ?>">
            <input type="hidden" name="dataAgendamento" value="<?php echo $agenda->getDataAgendamento() ?>">
            <input type="hidden" name="horario" value="<?php echo $agenda->getHorario() ?>">
            <input type="hidden" name="tipoAgendamento" value="<?php echo $agenda->getTipoAgendamento() ?>">
            <input type="hidden" name="valorConsulta" value="<?php echo $agenda->getValorConsulta() ?>">
            <input type="hidden" name="obs" value="<?php echo $agenda->getObs() ?>">


            <div class="form-group">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-block btn-agenda AG" name="status" value="AG">Agendado</button>
                    <button type="submit" class="btn btn-block btn-agenda CF" name="status" value="CF">Confirmado</button>
                    <button type="submit" class="btn btn-block btn-agenda AD" name="status" value="AD">Aguardando</button>
                    <button type="submit" class="btn btn-block btn-agenda EA" name="status" value="EA">Em atendimento</button>
                    <button type="submit" class="btn btn-block btn-agenda AT" name="status" value="AT">Atendido</button>
                    <button type="submit" class="btn btn-block btn-agenda NC" name="status" value="NC">Não compareceu</button>
                    <button type="submit" class="btn btn-block btn-agenda CA" name="status" value="CA">Cancelado</button>
                </div>                
            </div>                
        </div>                
    </div>
</form>            
<?php require_once 'rodape.php' ?>