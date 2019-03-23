<?php
    require_once 'global.php'; 
    try {
        $especialidade = new Especialidade();
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
    require_once 'cabecalho.php';
?>
<div class="row">
    <div class="col-md-12">
        <h2>Nova Especialidade</h2>
    </div>
</div>

<form action="especialidade-servlet.php" method="post">
    <input type="hidden" name="metodo" value="inserir">

    <?php include './especialidade-form-base.php'; ?>

<?php require_once 'rodape.php' ?>