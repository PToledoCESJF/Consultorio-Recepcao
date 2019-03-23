<?php
    require_once 'global.php'; 
    try {
        $profissional = new Profissional();
        $especialidadeController = new EspecialidadeController();
        $listaEspecialidade = $especialidadeController->listar();
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
    require_once 'cabecalho.php';
?>
<div class="row">
    <div class="col-md-12">
        <h2>Novo Profissional</h2>
    </div>
</div>

<form action="profissional-servlet.php" method="post">
    <input type="hidden" name="metodo" value="inserir">

    <?php include './profissional-form-base.php'; ?>

<?php require_once 'rodape.php' ?>