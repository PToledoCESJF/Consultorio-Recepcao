        <input type="hidden" name="idAgendamento" value="<?php echo $agenda->getIdAgendamento() ?>">        
                
                <div class="form-group">
                    <label for="profissional">Profissional</label>
                    <select class="form-control" name="profissional">
                        <?php 
                            $selectedMed = '';
                            foreach ($listaProfissional as $linha): 
                                if($linha['idProfissional'] == $agenda->getProfissional()){
                                    $selectedMed = 'selected';
                                }
                        ?>
                            <option <?php echo $selectedMed ?> value="<?php echo $linha['idProfissional'] ?>"><?php echo $linha['nomeProfissional'] ?></option>
                        <?php 
                            $selectedMed = '';
                            endforeach;
                        ?>
                    </select>
                </div> 
        
                <div class="form-group">
                    <label for="convenio">Convênio</label>
                    <select class="form-control" name="convenio">
                        <?php 
                            $selectedConv = '';
                            foreach ($listaConvenio as $linha): 
                                if($linha['idConvenio'] == $agenda->getConvenio()){
                                    $selectedConv = 'selected';
                                }
                        ?>
                            <option <?php echo $selectedConv ?> value="<?php echo $linha['idConvenio'] ?>"><?php echo $linha['convenio'] ?></option>
                        <?php 
                            $selectedConv = '';
                            endforeach;
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dataConsulta">Data da consulta</label>
                    <input type="date" name="dataConsulta" value="<?php echo $agenda->getDataConsulta() ?>" class="form-control" required>
                </div>                
                <div class="form-group">
                    <label for="horario">Horário</label>
                    <input type="time" name="horario" value="<?php echo $agenda->getHorario() ?>" class="form-control">
                </div>                
                <div class="form-group">
                    <label for="$tpAgendamento">Tipo de Agendamento</label>
                    <select class="form-control" name="tipoAgendamento">
                        <?php
                            $selectedTpAg = '';
                            foreach($arrayTpAg as $idTp=>$tp): 
                                if ($idTp == $agenda->getTipoAgendamento()){
                                    $selectedTpAg = 'selected';
                                }
                        ?>
                            <option <?php echo $selectedTpAg ?> value="<?php echo $idTp ?>"><?php echo $tp ?></option>
                        <?php 
                            $selectedTpAg = '';
                            endforeach;
                        ?>
                    </select>
                </div>
<?php /*        
                <div class="form-group">
                    <label for="valorConsulta">Valor da consulta</label>
                    <input type="text" name="valorConsulta" class="form-control" 
                           value="<?php echo $agenda->getValorConsulta() ?>" 
                           onkeypress="return(MascaraMoeda(this,'.',',',event))"
                           onfocus="mostrarPlace(this, 'Ex.: 0.000,00 - somente números')" 
                           onblur="esconderPlace(this)">
                </div>
*/?>
                <div class="form-group">
                    <label for="obs">Observações</label>
                    <textarea name="obs" rows="5" cols="40" class="form-control"
                              onfocus="mostrarPlace(this, 'Observações')" 
                              onblur="esconderPlace(this)"><?php echo $agenda->getObs() ?></textarea>
                </div>
                <input type="submit" class="btn btn-success btn-block" value="Salvar">
            </div>
        </div>
    </form>
    
    <script src="./assets/js/mascara.js"> </script>