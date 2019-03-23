<?php 
    require_once 'global.php';
    try {
        $agendaController = new AgendaController();
        $pacienteController = new PacienteController();
        $profissionalController = new ProfissionalController();
        $arreios = new ArreiosAux();
        
        $idProfissional = filter_input(INPUT_GET, 'id');
        $lstAgendaTodos = $agendaController->listar();
        $lstAgendaProfissionals = $agendaController->listarPorProfissional($idProfissional);
        $hoje = date('Y-m-d');

        if($idProfissional == 0){
            $lstAgenda = $lstAgendaTodos;
        } else {
            $lstAgenda = $lstAgendaProfissionals;
        }
            
        $lstPaciente = $pacienteController->listar();
        $lstProfissional = $profissionalController->listar();
        $arrayTpAg = $arreios->getTpAg();
        $arrayStatus = $arreios->getStatus();
        
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
    $volta = 'aglst';
    require_once 'cabecalho.php';
?>
<link href="assets/css/menu-agenda.css" rel="stylesheet">
<div class="row"> <br>
    <div class="col-md-12">
        <div class="row">
        <a href="agenda-novo.php" class="btn btn-info">Novo Agendamento</a>
        <?php 
        $contaTodos = 0;
        foreach ($lstAgendaTodos as $agt){
            if($agt['dataConsulta'] >= $hoje){
                $contaTodos++;
            }
        }
        ?>
        <a href="agenda-lista.php?id=0" class="btn btn-agenda selecMed">Todos <sup class="contador"><b><?php echo $contaTodos ?></b></sup></a>
        <?php 
    // Cria os botões com os nomes dos profissionais
            foreach ($lstProfissional as $profissional){ 
                $contaAg = 0;
                foreach ($lstAgendaTodos as $linha){
                    if($linha['Profissional'] == $profissional['idProfissional'] && $linha['dataConsulta'] >= $hoje){
                        $contaAg ++;
                    }
                }
        ?>
        <a href="agenda-lista.php?id=<?php echo $profissional['idProfissional'] ?>" class="btn btn-agenda selecMed" id="<?php echo $profissional['idProfissional'] ?>"><?php echo $profissional['nomeProfissional']?> <sup class="contador"><b><?php echo $contaAg ?></b></sup></a>
        <?php } ?>
        </div>
        <?php if(count($lstAgenda) > 0): ?>
        <div class="row"> <br>
            <table class="table">
                <thead class="tablink">
                <tr>
                    <th class="acao">Data / Horário</th>
                    <th>Paciente</th>
                    <th>Telefone</th>
                    <th>Profissional</th>
                    <th>Agendamento</th>
                    <th>Status</th>
                    <th class="acao">Excluir</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $pac = '';
                    $tel = '';
                    $med = '';
                    $tipo = '';
                    $status = '';
                    $dataHorario = '';
                    foreach ($lstAgenda as $linha){
                        $dataHorario = date_create($linha['dataConsulta'] . $linha['horario']);
                        foreach ($lstPaciente as $p) {
                            if ($linha['Paciente'] == $p['idPaciente']) {
                                $pac = $p['nomePaciente'];
                                $tel = $p['telefone'];
                            }
                        }
                        foreach ($lstProfissional as $m) {
                            if ($linha['Profissional'] == $m['idProfissional']) {
                                $med = $m['nomeProfissional'];
                            }
                        }
                        foreach ($arrayTpAg as $tp => $ag) {
                            if ($linha['tipoAgendamento'] == $tp) {
                                $tipo = $ag;
                            }
                        foreach ($arrayStatus as $idSt => $nSt) {
                            if ($linha['status'] == $idSt) {
                                $status = $nSt;
                            }
                        }
                                
                        }
                        if($linha['dataConsulta'] >= $hoje ){ 
                            if($linha['dataConsulta'] == $hoje){
                                $classe = 'tr-hoje';
                            } else {
                                $classe = '';
                            }
                                                        
                        ?>
                        <tr  class="<?php echo $classe ?>">
                            <td><a href="agenda-editar.php?id=<?php echo $linha['idAgendamento'] ?>&vlt=<?php echo $volta ?>" class="btn btn-agenda selecDtHr"><?php echo date_format($dataHorario, "d/m/Y - H:i") ?></a></td>
                            <td><?php echo $pac ?></td>
                            <td><?php echo $tel ?></td>
                            <td><?php echo $med ?></td>
                            <td><?php echo $tipo ?></td>
                            <td><a href="agenda-editar-status.php?id=<?php echo $linha['idAgendamento'] ?>&vlt=<?php echo $volta ?>" class="btn btn-block btn-agenda <?php echo $linha['status'] ?>"><?php echo $status ?></a></td>
                            <td><a href="agenda-excluir.php?id=<?php echo $linha['idAgendamento'] ?>" class="btn btn-danger">Excluir</a></td>
                        <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php else: ?>
    <h3>Nenhum agendamento cadastrado!</h3>
<?php endif ?>
</div>
<?php require_once 'rodape.php' ?>