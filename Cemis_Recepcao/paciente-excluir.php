<?php
    require_once 'global.php';
    try {
        $pacienteController = new PacienteController();
        $paciente = $pacienteController->carregar(filter_input(INPUT_GET, 'id'));
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
    require_once 'cabecalho.php';
?>
<div class="row">
    <div class="col-md-12">
        <h3>Confirma a exclusão do paciente?</h3>
    </div>
</div>
<form action="paciente-servlet.php" method="post">
    <input type="hidden" name="metodo" value="excluir">
    <input type="hidden" name="idPaciente" value="<?php echo $paciente->getIdPaciente() ?>">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <h2><?php echo $paciente->getNomePaciente() ?></h2>
                </div>                
                <div class="form-group">
                    <h3>Prontuário: <?php echo $paciente->getProntuario() ?></h3>
                    
                </div>                
                <input type="submit" class="btn btn-success btn-block" value="Voltar" formaction="paciente-lista.php">
                <input type="submit" class="btn btn-danger btn-block" value="Excluir">
            </div>
        </div>
    </form>
<?php require_once 'rodape.php' ?>
