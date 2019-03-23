<?php 
    require_once 'global.php';
    try {
        $profissionalController = new ProfissionalController();
        $lista = $profissionalController->listar();
        $especialidadeController = new EspecialidadeController();
        $listaEspecialidade = $especialidadeController->listar();
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
    require_once 'cabecalho.php';
?>
<div class="row">
    <div class="col-md-12">
        <h2>Profissional</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <a href="profissional-novo.php" class="btn btn-info btn-block">Novo Profissional de saúde</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php if(count($lista) > 0): ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nome profissional</th>
                    <th>Especialidade</th>
                    <th class="acao">Editar</th>
                    <th class="acao">Excluir</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                        $espc = '';
                        foreach($lista as $linha): 
                            foreach ($listaEspecialidade as $le){
                                if($linha['especialidade'] == $le['idEspecialidade']){
                                    $espc = $le['especialidade'];
                                }
                            }
                    ?>
                    <tr>
                        <td><?php echo $linha['nomeProfissional'] ?></td>
                        <td><?php echo $espc ?></td>
                        <td><a href="profissional-editar.php?id=<?php echo $linha['idProfissional'] ?>" class="btn btn-info">Editar</a></td>
                        <td><a href="profissional-excluir.php?id=<?php echo $linha['idProfissional'] ?>" class="btn btn-danger">Excluir</a></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum profissional cadastrado!</p>
        <?php endif ?>
    </div>
</div>
<?php require_once 'rodape.php' ?>
