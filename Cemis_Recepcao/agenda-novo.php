<?php
    require_once 'global.php'; 
    try {
        $agenda = new Agenda();
        $pacienteController = new PacienteController();
        $profissionalController = new ProfissionalController();
        $convenioController = new ConvenioController();
        $arreios = new ArreiosAux();
        
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
        <h2>Novo Agendamento</h2>
    </div>
</div>

<form action="agenda-servlet.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <input type="hidden" name="metodo" value="inserir">
            <input type="hidden" name="dataAgendamento" value="<?php echo date('Y-m-d') ?>">
            <input type="hidden" name="status" value="AG">
            <div class="form-group">
                <label for="paciente">Paciente</label>
                <select class="form-control" name="paciente">
                    <?php 
                        $selectedPac = '';
                        foreach ($listaPaciente as $linha): 
                            if($linha['idPaciente'] == $agenda->getPaciente()){
                                $selectedPac = 'selected';
                            }
                    ?>
                        <option <?php echo $selectedPac ?> value="<?php echo $linha['idPaciente'] ?>"><?php echo $linha['nomePaciente'] ?></option>
                    <?php 
                        $selectedPac = '';
                        endforeach;
                    ?>
                </select>
            </div> 
    <?php include './agenda-form-base.php'; ?>

<?php require_once 'rodape.php' ?>