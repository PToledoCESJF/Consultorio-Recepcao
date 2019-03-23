<?php
    require_once 'global.php';
    try {
        $pacienteController = new PacienteController();
        $arreios = new ArreiosAux();
        
        $paciente = $pacienteController->carregar(filter_input(INPUT_GET, 'id'));
        $estados = $arreios->getEstados();
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
    require_once 'cabecalho.php';
?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar Paciente</h2>
    </div>
</div>
<form action="paciente-servlet.php" method="post">
    <input type="hidden" name="metodo" value="editar">

<?php include './paciente-form-base.php'; ?>

<?php require_once 'rodape.php' ?>