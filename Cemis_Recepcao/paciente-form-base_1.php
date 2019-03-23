        <input type="hidden" name="idPaciente" value="<?php echo $paciente->getIdPaciente() ?>">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <label for="nomePaciente">Nome do Paciente</label>
                    <input type="text" name="nomePaciente" value="<?php echo $paciente->getNomePaciente() ?>" class="form-control" placeholder="Nome do Paciente" required>
                </div>                
                <div class="form-group">
                    <label for="prontuario">Prontuário</label>
                    <input type="text" name="prontuario" value="<?php echo $paciente->getProntuario() ?>" class="form-control" placeholder="Prontuario" required>
                </div>              
                <div class="form-group">
                    <label for="dataNascimento">Data de Nascimento</label>
                    <input type="date" name="dataNascimento" value="<?php echo $paciente->getDataNascimento() ?>" class="form-control" placeholder="Data de Nascimento">
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" value="<?php echo $paciente->getCpf() ?>" class="form-control" placeholder="CPF">
                </div>
                <div class="form-group">
                    <label for="rg">Documento de Identificação</label>
                    <input type="text" name="rg" value="<?php echo $paciente->getRg() ?>" class="form-control" placeholder="Documento de Identificação">
                </div>
                <div class="form-group">
                    <label for="convenio">Convênio</label>
                    <select class="form-control" name="convenio">
                        <?php 
                            $selectedConv = '';
                            foreach ($listaConvenio as $linha): 
                                if($linha['idConvenio'] == $paciente->getConvenio()){
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
                    <label for="cartaoConvenio">Cartão Convênio</label>
                    <input type="text" name="cartaoConvenio" value="<?php echo $paciente->getCartaoConvenio() ?>" class="form-control" placeholder="Cartão Convênio">
                </div>
                <div class="form-group">
                    <label for="logradouro">Endereço</label>
                    <input type="text" name="logradouro" value="<?php echo $paciente->getLogradouro() ?>"  class="form-control" placeholder="Nome da rua">
                </div>
                <div class="form-group">
                    <label for="numero">Número</label>
                    <input type="text" name="numero" value="<?php echo $paciente->getNumero() ?>"  class="form-control" placeholder="Número">
                </div>
                <div class="form-group">
                    <label for="complemento">Complemento</label>
                    <input type="text" name="complemento" value="<?php echo $paciente->getComplemento() ?>" class="form-control" placeholder="Complemento">
                </div>
                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" name="bairro" value="<?php echo $paciente->getBairro() ?>" class="form-control" placeholder="Bairro">
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" value="<?php echo $paciente->getCidade() ?>" class="form-control" placeholder="Cidade">
                </div>
                <?php
                    $estados = ['AC'=>'Acre', 'AL'=>'Alagoas', 'AP'=>'Amapá', 'AM'=>'Amazonas',
                        'BA'=>'Bahia', 'CE'=>'Ceará', 'DF'=>'Distrito Federal', 'ES'=>'Espírito Santo',
                        'GO'=>'Goiás', 'MA'=>'Maranhão', 'MT'=>'Mato Grosso', 'MS'=>'Mato Grosso do Sul',
                        'MG'=>'Minas Gerais','PA'=>'Pará', 'PB'=>'Paraíba', 'PR'=>'Paraná',
                        'PE'=>'Pernambuco', 'PI'=>'Piauí', 'RJ'=>'Rio de Janeiro', 'RN'=>'Rio Grande do Norte',
                        'RS'=>'Rio Grande do Sul', 'RO'=>'Rondônia', 'RR'=>'Roraima', 'SC'=>'Santa Catarina',
                        'SP'=>'São Paulo', 'SE'=>'Sergipe', 'TO'=>'Tocantins'];
                ?>
                <div class="form-group">
                    <label for="uf">Estado</label>
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
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="tel" name="telefone" value="<?php echo $paciente->getTelefone() ?>" class="form-control" placeholder="Telefone">
                </div>
                <div class="form-group">
                    <label for="obs">Observações</label>
                    <textarea name="obs" rows="5" cols="40" placeholder="Observações" class="form-control"><?php echo $paciente->getObs() ?></textarea>
                </div>
                <input type="submit" class="btn btn-success btn-block" value="Salvar">
            </div>
        </div>
    </form>