<?php
    require_once 'global.php'; 
    try {
        $convenio = new Convenio();
        $arreios = new ArreiosAux();
        
        $tpConvenio = $arreios->getTpConvenio();
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
    require_once 'cabecalho.php';
?>
<div class="row">
    <div class="col-md-12">
        <h2>Novo Convênio</h2>
    </div>
</div>

<form action="convenio-servlet.php" method="post">
    <input type="hidden" name="metodo" value="inserir">

    <?php include './convenio-form-base.php'; ?>

<?php require_once 'rodape.php' ?>