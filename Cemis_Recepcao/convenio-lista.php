<?php 
    require_once 'global.php';
    try {
        $convenioController = new ConvenioController();
        $lista = $convenioController->listar();
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
    require_once 'cabecalho.php';
?>
<div class="row">
    <div class="col-md-12">
        <h2>Convênios</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="convenio-novo.php" class="btn btn-info btn-block">Novo Convênio</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php if(count($lista) > 0): ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Convênio</th>
                    <th>Tipo</th>
                    <th>Telefone</th>
                    <th class="acao">Editar</th>
                    <th class="acao">Excluir</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($lista as $linha): ?>
                    <tr>
                        <td><?php echo $linha['convenio'] ?></td>
                        <td><?php echo $linha['tipo'] ?></td>
                        <td><?php echo $linha['telefone'] ?></td>
                        <td><a href="convenio-editar.php?id=<?php echo $linha['idConvenio'] ?>" class="btn btn-info">Editar</a></td>
                        <td><a href="convenio-excluir.php?id=<?php echo $linha['idConvenio'] ?>" class="btn btn-danger">Excluir</a></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum convênio cadastrado!</p>
        <?php endif ?>
    </div>
</div>
<?php require_once 'rodape.php' ?>
