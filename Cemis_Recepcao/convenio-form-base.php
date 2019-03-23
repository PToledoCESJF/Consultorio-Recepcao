        <input type="hidden" name="idConvenio" value="<?php echo $convenio->getIdConvenio() ?>">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <label for="convenio">Convênio</label>
                    <input type="text" name="convenio" value="<?php echo $convenio->getConvenio() ?>" 
                           class="form-control" onfocus="mostrarPlace(this, 'Convênio')" 
                               onblur="esconderPlace(this)" autofocus="true" required>
                </div>                
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="tel" name="telefone" value="<?php echo $convenio->getTelefone() ?>" 
                           class="form-control" oninput="maskTelefone(this)" 
                           onfocus="mostrarPlace(this, 'Ex.: (00)0000-0000 - somente números')" 
                           onblur="esconderPlace(this)">
                </div> 
                <div class="form-group">
                    <label for="tipo"></label>
                    <select class="form-control" name="tipo" >
                        
                    <?php 
                        $selected = '';
                        foreach ($tpConvenio as $tp):
                            if ($tp == $convenio->getTipo()){
                                $selected = 'selected';
                            }
                    ?>
                            <option <?php echo $selected ?> value="<?php echo $tp ?>" ><?php echo $tp ?></option>
                    <?php
                        $selected = '';
                        endforeach;
                    ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="obs">Observações</label>
                    <textarea name="obs" rows="5" cols="40" class="form-control"
                              onfocus="mostrarPlace(this, 'Observações')" 
                              onblur="esconderPlace(this)" ><?php echo $convenio->getObs() ?></textarea>
                </div>
                <input type="submit" class="btn btn-success btn-block" value="Salvar">
            </div>
        </div>
    </form>
    
    <script src="./assets/js/mascara.js"> </script>