<?php 
    require_once 'global.php';
    try {
        $pacienteController = new PacienteController();
        $lista = $pacienteController->listar();
    } catch (Exception $e) {
        Erro::trataErro($e);
    }

    require_once 'cabecalho.php';
?>
<div class="row">
    <div class="col-md-12">
        <h2>Pacientes</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="paciente-novo.php" class="btn btn-info btn-block">Novo Paciente</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php if(count($lista) > 0): ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Prontuario</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th class="acao">Editar</th>
                    <th class="acao">Excluir</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($lista as $linha): ?>
                    <tr>
                        <td><a href="agendamento-por-paciente.php?id=<?php echo $linha['idPaciente'] ?>"><?php echo $linha['nomePaciente'] ?></a></td>
                        <td><?php echo $linha['prontuario'] ?></td>
                        <td><?php echo $linha['cpf'] ?></td>
                        <td><?php echo $linha['telefone'] ?></td>
                        <td><a href="paciente-editar.php?id=<?php echo $linha['idPaciente'] ?>" class="btn btn-info">Editar</a></td>
                        <td><a href="paciente-excluir.php?id=<?php echo $linha['idPaciente'] ?>" class="btn btn-danger">Excluir</a></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum paciente Cadastrado!</p>
        <?php endif ?>
    </div>
</div>
<?php require_once 'rodape.php' ?>
