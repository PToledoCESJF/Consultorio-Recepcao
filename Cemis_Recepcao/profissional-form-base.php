        <input type="hidden" name="idProfissional" value="<?php echo $profissional->getIdProfissional() ?>">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <label for="nomeCompleto">Nome completo</label>
                    <input type="text" name="nomeCompleto" value="<?php echo $profissional->getNomeCompleto() ?>" 
                           class="form-control" onfocus="mostrarPlace(this, 'Nome do completo')" 
                               onblur="esconderPlace(this)" autofocus="true" required>
                </div>                
                <div class="form-group">
                    <label for="nomeProfissional">Nome</label>
                    <input type="text" name="nomeProfissional" value="<?php echo $profissional->getNomeProfissional() ?>" 
                           class="form-control" onfocus="mostrarPlace(this, 'Nome profissional')" 
                               onblur="esconderPlace(this)" required>
                </div>                
                <div class="form-group">
                    <label for="especialidade">Especialidade</label>
                    <select class="form-control" name="especialidade">
                        <?php 
                            $selected = '';
                            foreach ($listaEspecialidade as $linha): 
                                if($linha['idEspecialidade'] == $profissional->getEspecialidade()){
                                    $selected = 'selected';
                                }
                        ?>
                            <option <?php echo $selected ?> value="<?php echo $linha['idEspecialidade'] ?>"><?php echo $linha['especialidade'] ?></option>
                        <?php 
                            $selected = '';
                            endforeach;
                        ?>
                    </select>
                </div> 
                <div class="form-group">
                    <label for="crm">CRM</label>
                    <input type="text" name="crm" value="<?php echo $profissional->getCrm() ?>" 
                           class="form-control" onfocus="mostrarPlace(this, 'CRM')" 
                               onblur="esconderPlace(this)" >
                </div>
                <input type="submit" class="btn btn-success btn-block" value="Salvar">
            </div>
        </div>
    </form>
    
    <script src="./assets/js/mascara.js"> </script>