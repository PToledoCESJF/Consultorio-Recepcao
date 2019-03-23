<?php
    require_once 'global.php';
    try {
        $profissionalController = new ProfissionalController();
        $especialidadeController = new EspecialidadeController();
        
        $profissional = $profissionalController->carregar(filter_input(INPUT_GET, 'id'));
        $lstEspecialidade = $especialidadeController->listar();
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
    foreach ($lstEspecialidade as $e){
        if($profissional->getEspecialidade() == $e['idEspecialidade']){
            $especialidade = $e['especialidade'];
        }
    }
    require_once 'cabecalho.php';
?>
<div class="row">
    <div class="col-md-12">
        <h3>Confirma a exclusão do profissional?</h3>
    </div>
</div>
<form action="profissional-servlet.php" method="post">
    <input type="hidden" name="metodo" value="excluir">
    <input type="hidden" name="idProfissional" value="<?php echo $profissional->getIdProfissional() ?>">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <h2><?php echo $profissional->getNomeProfissional() ?></h2>
                    <H3>CRM: <?php echo $profissional->getCrm() ?> - <?php echo $especialidade ?></h3>
                </div>                
                <input type="submit" class="btn btn-success btn-block" value="Voltar" formaction="profissional-lista.php">
                <input type="submit" class="btn btn-danger btn-block" value="Excluir">
            </div>
        </div>
    </form>
<?php require_once 'rodape.php' ?>
