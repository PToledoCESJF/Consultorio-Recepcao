<?php
    require_once 'global.php';
    try {
        $convenioController = new ConvenioController();
        $arreios = new ArreiosAux();
        
        $convenio = $convenioController->carregar(filter_input(INPUT_GET, 'id'));
        $tpConvenio = $arreios->getTpConvenio();
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
    require_once 'cabecalho.php';
?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar Convênio</h2>
    </div>
</div>
<form action="convenio-servlet.php" method="post">
    <input type="hidden" name="metodo" value="editar">

<?php include './convenio-form-base.php'; ?>

<?php require_once 'rodape.php' ?>