        <input type="hidden" name="idPaciente" value="<?php echo $paciente->getIdPaciente() ?>">
        <div class="row">
            <div class="col-md-7 col-lg-offset-2">
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="nomePaciente">Nome do Paciente</label>
                    </div>                
                    <div class="col-md-7">
                        <input type="text" name="nomePaciente" value="<?php echo $paciente->getNomePaciente() ?>"
                               class="form-control" onfocus="mostrarPlace(this, 'Nome do paciente')" 
                               onblur="esconderPlace(this)" autofocus="true" required>
                    </div> 
                </div> 
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="prontuario">Prontuário</label>
                    </div>                
                    <div class="col-md-7">
                        <input type="text" name="prontuario" value="<?php echo $paciente->getProntuario() ?>"
                               class="form-control" onfocus="mostrarPlace(this, 'Prontuario')" 
                               onblur="esconderPlace(this)" required>
                    </div>              
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="dataNascimento">Data de Nascimento</label>
                    </div>
                    <div class="col-md-7">
                        <input type="date" name="dataNascimento" value="<?php echo $paciente->getDataNascimento() ?>"
                               class="form-control" placeholder="Data de Nascimento">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="cpf">CPF</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" name="cpf" oninput="maskCpf(this)" value="<?php echo $paciente->getCpf() ?>"
                               class="form-control" onfocus="mostrarPlace(this, 'Ex.: 000.000.000-00 - somente números')" 
                               onblur="esconderPlace(this)">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="rg">Documento de Identificação</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" name="rg" value="<?php echo $paciente->getRg() ?>"
                               class="form-control" onfocus="mostrarPlace(this, 'Documento de Identificação')" 
                               onblur="esconderPlace(this)">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="telefone">Telefone</label>
                    </div>
                    <div class="col-md-7">
                        <input type="tel" name="telefone" oninput="maskTelefone(this)" value="<?php echo $paciente->getTelefone() ?>" 
                               class="form-control" onfocus="mostrarPlace(this, 'Ex.: (00)0000-0000 - somente números')" 
                               onblur="esconderPlace(this)">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="logradouro">Endereço</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" name="logradouro" value="<?php echo $paciente->getLogradouro() ?>"  
                               class="form-control" onfocus="mostrarPlace(this, 'Nome da rua / av. / praça')" 
                               onblur="esconderPlace(this)">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="numero">Número</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" name="numero" value="<?php echo $paciente->getNumero() ?>"
                               class="form-control" onfocus="mostrarPlace(this, 'Número')" 
                               onblur="esconderPlace(this)">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="complemento">Complemento</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" name="complemento" value="<?php echo $paciente->getComplemento() ?>"
                               class="form-control" onfocus="mostrarPlace(this, 'Complemento')" 
                               onblur="esconderPlace(this)">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="bairro">Bairro</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" name="bairro" value="<?php echo $paciente->getBairro() ?>" 
                               class="form-control" onfocus="mostrarPlace(this, 'Bairro')" 
                               onblur="esconderPlace(this)">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="cidade">Cidade</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" name="cidade" value="<?php echo $paciente->getCidade() ?>" 
                               class="form-control" onfocus="mostrarPlace(this, 'Cidade')" 
                               onblur="esconderPlace(this)">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="uf">Estado</label>
                    </div>
                    <div class="col-md-7">
                        <select class="form-control" name="uf">
                            <?php
                                $selectedUf = '';
                                foreach($estados as $uf => $estado): 
                                    if ($uf == $paciente->getUf()){
                                        $selectedUf = 'selected';
                                    }
                            ?>
                            <option <?php echo $selectedUf ?> value="<?php echo $uf ?>"><?php echo $estado ?></option>
                            <?php 
                                $selectedUf = '';
                                endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="obs">Observações</label>
                    </div>
                    <div class="col-md-7">
                        <textarea name="obs" rows="5" cols="40" class="form-control"
                                  onfocus="mostrarPlace(this, 'Observações')" 
                                  onblur="esconderPlace(this)"><?php echo $paciente->getObs() ?></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-7">
                        <input type="submit" class="btn btn-success btn-block" value="Salvar">
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <script src="./assets/js/mascara.js"> </script>