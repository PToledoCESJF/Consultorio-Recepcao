<?php
    require_once 'global.php'; 
    try {
        $paciente = new Paciente();
        $arreios = new ArreiosAux();

        $estados = $arreios->getEstados();
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
    require_once 'cabecalho.php';
?>
<div class="row">
    <div class="col-md-12">
        <h2>Novo Paciente</h2>
    </div>
</div>
<form action="paciente-servlet.php" method="post">
    <input type="hidden" name="metodo" value="inserir">
<?php include './paciente-form-base.php'; ?>

<?php require_once 'rodape.php' ?>