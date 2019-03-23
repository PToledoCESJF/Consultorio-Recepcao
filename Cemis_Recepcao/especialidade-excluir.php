<?php
    require_once 'global.php';
    try {
        $especialidadeController = new EspecialidadeController();
        $especialidade = $especialidadeController->carregar(filter_input(INPUT_GET, 'id'));
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
    require_once 'cabecalho.php';
?>
<div class="row">
    <div class="col-md-12">
        <h3>Confirma a exclusão da especialidade?</h3>
    </div>
</div>
<form action="./especialidade-servlet.php" method="post">
    <input type="hidden" name="metodo" value="excluir">
    <input type="hidden" name="idEspecialidade" value="<?php echo $especialidade->getIdEspecialidade() ?>">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <h2><?php echo $especialidade->getEspecialidade() ?></h2>
                </div>                
                <input type="submit" class="btn btn-success btn-block" value="Voltar" formaction="especialidade-lista.php">
                <input type="submit" class="btn btn-danger btn-block" value="Excluir">
            </div>
        </div>
    </form>
<?php require_once 'rodape.php' ?>
