<?php
    require_once 'global.php';
    try {
        $agendaController = new AgendaController();
        $pacienteController = new PacienteController();
        
        $agenda = $agendaController->carregar(filter_input(INPUT_GET, 'id'));
        $lstPaciente = $pacienteController->listar();
        
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
    foreach ($lstPaciente as $p){
        if($agenda->getPaciente() == $p['idPaciente']){
            $paciente = $p['nomePaciente'];           
        }
    }
    require_once 'cabecalho.php';
?>
<div class="row">
    <div class="col-md-12">
        <h3>Confirma a exclusão do agendamento?</h3>
    </div>
</div>
<form action="agenda-servlet.php" method="post">
    <input type="hidden" name="metodo" value="excluir">
    <input type="hidden" name="idAgendamento" value="<?php echo $agenda->getIdAgendamento() ?>">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <h2><?php echo $paciente ?></h2>
                </div>                
                <div class="form-group">
                    <?php $dataHorario = date_create($agenda->getDataConsulta() . $agenda->getHorario()) ?>
                        <h3><?php echo date_format($dataHorario, "d/m/Y - H:i") ?></h3>
                </div>                
                <input type="submit" class="btn btn-success btn-block" value="Voltar" formaction="agenda-lista.php">
                <input type="submit" class="btn btn-danger btn-block" value="Excluir">
            </div>
        </div>
    </form>
<?php require_once 'rodape.php' ?>
