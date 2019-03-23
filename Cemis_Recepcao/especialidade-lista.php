<?php 
    require_once 'global.php';
    try {
        $especialidadeController = new EspecialidadeController();
        $lista = $especialidadeController->listar();
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
    require_once 'cabecalho.php';
?>
<div class="row">
    <div class="col-md-12">
        <h2>Especialidades</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <a href="./especialidade-novo.php" class="btn btn-info btn-block">Nova Especialidade</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php if(count($lista) > 0): ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Especialidade</th>
                    <th class="acao">Editar</th>
                    <th class="acao">Excluir</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($lista as $linha): ?>
                    <tr>
                        <td><?php echo $linha['especialidade'] ?></td>
                        <td><a href="especialidade-editar.php?id=<?php echo $linha['idEspecialidade'] ?>" class="btn btn-info">Editar</a></td>
                        <td><a href="especialidade-excluir.php?id=<?php echo $linha['idEspecialidade'] ?>" class="btn btn-danger">Excluir</a></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhuma especialidade cadastrada!</p>
        <?php endif ?>
    </div>
</div>
<?php require_once 'rodape.php' ?>
