<?php
    require_once 'global.php';
    try {
        $agendaController =  new AgendaController();
        $pacienteController = new PacienteController();
        $profissionalController = new ProfissionalController();
        $convenioController = new ConvenioController();
        $arreios = new ArreiosAux();
        
        $agenda = $agendaController->carregar(filter_input(INPUT_GET, 'id'));
        $voltar = filter_input(INPUT_GET, 'vlt');
        $listaPaciente = $pacienteController->listar();
        $listaProfissional = $profissionalController->listar();
        $listaConvenio = $convenioController->listar();
        $arrayTpAg = $arreios->getTpAg();

    } catch (Exception $e) {
        Erro::trataErro($e);
    }
    require_once 'cabecalho.php';
?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar Agendamento</h2>
    </div>
</div>
<form action="agenda-servlet.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <input type="hidden" name="metodo" value="editar">
            <input type="hidden" name="vlt" value="<?php echo $voltar ?>">
            <input type="hidden" name="dataAgendamento" value="<?php echo $agenda->getDataAgendamento() ?>">
            <input type="hidden" name="status" value="<?php echo $agenda->getStatus() ?>">
            <input type="hidden" name="paciente" value="<?php echo $agenda->getPaciente() ?>">
            <div class="form-group">
                <?php 
                    $pac = "";
                    foreach ($listaPaciente as $linha): 
                        if($linha['idPaciente'] == $agenda->getPaciente()):
                    ?>
                            <h2><i><?php echo $linha['nomePaciente'] ?></i></h2>
                    <?php 
                        endif;
                    endforeach;
                ?>
            </div> 

<?php include './agenda-form-base.php'; ?>

<?php require_once 'rodape.php' ?>