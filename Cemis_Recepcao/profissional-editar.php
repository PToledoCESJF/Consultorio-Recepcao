<?php
    require_once 'global.php';
    try {
        $profissionalController = new ProfissionalController();
        $profissional = $profissionalController->carregar(filter_input(INPUT_GET, 'id'));
        $especialidadeController = new EspecialidadeController();
        $listaEspecialidade = $especialidadeController->listar();
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
    require_once 'cabecalho.php';
?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar Profissional de saúde</h2>
    </div>
</div>
<form action="profissional-servlet.php" method="post">
    <input type="hidden" name="metodo" value="editar">

<?php include './profissional-form-base.php'; ?>

<?php require_once 'rodape.php' ?>