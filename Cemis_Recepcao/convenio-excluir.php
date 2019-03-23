<?php
    require_once 'global.php';
    try {
        $convenioController = new ConvenioController();
        $convenio = $convenioController->carregar(filter_input(INPUT_GET, 'id'));
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
    require_once 'cabecalho.php';
?>
<div class="row">
    <div class="col-md-12">
        <h3>Confirma a exclusão do convênio?</h3>
    </div>
</div>
<form action="convenio-servlet.php" method="post">
    <input type="hidden" name="metodo" value="excluir">
    <input type="hidden" name="idConvenio" value="<?php echo $convenio->getIdConvenio() ?>">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <h2><?php echo $convenio->getConvenio() ?></h2>
                    <h3><?php echo $convenio->getTipo() ?></h3>
                </div>                
                <input type="submit" class="btn btn-success btn-block" value="Voltar" formaction="convenio-lista.php">
                <input type="submit" class="btn btn-danger btn-block" value="Excluir">
            </div>
        </div>
    </form>
<?php require_once 'rodape.php' ?>
