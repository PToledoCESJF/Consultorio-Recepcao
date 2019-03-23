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
        <h2>Editar Especialidade</h2>
    </div>
</div>
<form action="./especialidade-servlet.php" method="post">
    <input type="hidden" name="metodo" value="editar">

<?php include './especialidade-form-base.php'; ?>

<?php require_once 'rodape.php' ?>