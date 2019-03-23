        <input type="hidden" name="idEspecialidade" value="<?php echo $especialidade->getIdEspecialidade() ?>">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <label for="especialidade">Especialidade</label>
                    <input type="text" name="especialidade" value="<?php echo $especialidade->getEspecialidade() ?>" class="form-control" placeholder="Especialidade" autofocus="true" required>
                </div>                
                <input type="submit" class="btn btn-success btn-block" value="Salvar">
            </div>
        </div>
    </form>