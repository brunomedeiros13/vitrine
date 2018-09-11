<?= $this->Html->script(['tinymce/tinymce.min']); ?>
<script>
    tinymce.init({
        selector: 'textarea',
        language: 'pt_BR',
        menubar: false,
        statusbar: false,
        height: 200,
        theme: 'modern',
        plugins: 'print preview fullpage autolink directionality visualblocks visualchars fullscreen image link media template codesample pagebreak nonbreaking anchor lists textcolor contextmenu colorpicker textpattern',
        toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat'
    });
</script>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Editar <?= $empresa->nomeempresa ?> <small><?php if ($empresa->destaque == '1'){ ?> <span class="badge badge-warning">Destaque</span><?php } ?></small></h1>
</div>
<div class="editar-empresa">
    <div class="add-empresa">
        <?= $this->Form->create($empresa, ['type' => 'file']) ?>
        <div class="row">
            <div class="col-12" style="background-color: #e9ecef; padding: 20px;">
                <?= $this->Flash->render() ?>
                <h4 class="mb-3">Dados Básicos</h4>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Nome da Empresa</label>
                        <?php echo $this->Form->control('nomeempresa', ['class' => 'form-control', 'label' => FALSE]); ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Categoria</label>
                        <?php echo $this->Form->control('categorias_id', ['class' => 'form-control custom-select d-block w-100', 'label' => FALSE, 'options' => $categorias]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Usuário</label>
                        <?php echo $this->Form->control('user_id', ['class' => 'form-control custom-select d-block w-100', 'label' => FALSE, 'options' => $users, 'empty' => true]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="firstName">Descrição Curta (até 200 caracteres)</label>
                        <?php echo $this->Form->control('desccurta', ['class' => 'form-control', 'label' => FALSE]); ?>
                    </div>
                </div>
                <div class="row">
                    <?php if ($empresa->photo != null) { ?>
                        <div class="col-md-12 mb-3">
                            <?php
                            $diretorio = str_replace('\\', '/', $empresa->dir);
                            echo $this->Html->image('/' . $diretorio . $empresa->photo, ['style' => 'max-width: 250px']);
                            ?>
                        </div>                        
                    <?php } ?>
                    <div class="col-md-12 mb-3">
                        <label for="firstName">Imagem Principal</label>
                        <?= $this->Form->control('photo', ['type' => 'file', 'label' => false]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9 mb-3">
                        <label for="firstName">Endereço</label>
                        <?php echo $this->Form->control('endereco', ['class' => 'form-control', 'label' => FALSE]); ?>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="lastName">Número</label>
                        <?php echo $this->Form->control('numero', ['class' => 'form-control', 'label' => FALSE]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="firstName">Complemento</label>
                        <?php echo $this->Form->control('complemento', ['class' => 'form-control', 'label' => FALSE]); ?>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="lastName">Bairro</label>
                        <?php echo $this->Form->control('bairros_id', ['class' => 'form-control custom-select d-block w-100', 'label' => FALSE, 'options' => $bairros]); ?>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="lastName">CEP</label>
                        <?php echo $this->Form->control('cep', ['class' => 'form-control', 'label' => FALSE]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Cidade</label>
                        <?php echo $this->Form->control('cidade', ['class' => 'form-control', 'label' => FALSE, 'disabled' => true, 'value' => 'São José']); ?>
                        <?php echo $this->Form->control('cidade', ['type' => 'hidden', 'label' => FALSE, 'value' => 'São José']); ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Estado</label>
                        <?php echo $this->Form->control('estado', ['class' => 'form-control', 'label' => FALSE, 'disabled' => true, 'value' => 'Santa Catarina']); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Telefone 1</label>
                        <?php echo $this->Form->control('telefone1', ['class' => 'form-control', 'label' => FALSE]); ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Telefone 2</label>
                        <?php echo $this->Form->control('telefone2', ['class' => 'form-control', 'label' => FALSE]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">E-mail (Opcional)</label>
                        <?php echo $this->Form->control('email', ['class' => 'form-control', 'label' => FALSE, 'required' => FALSE]); ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Website (Opcional)</label>
                        <?php echo $this->Form->control('site', ['class' => 'form-control', 'label' => FALSE]); ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Proprietário</label>
                        <?php echo $this->Form->control('nomeproprietario', ['class' => 'form-control', 'label' => FALSE, 'required' => FALSE]); ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">E-mail do Proprietário</label>
                        <?php echo $this->Form->control('emailproprietario', ['class' => 'form-control', 'label' => FALSE]); ?>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12" style="background-color: #e9ecef; padding: 20px;">
                <h4 class="mb-3">Dados Adicionais</h4>
                <hr>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <?php $preço = ['1' => 'Baixa', '2' => 'Média', '3' => 'Alta']; ?>
                        <label for="firstName">Faixa de Preços</label>
                        <?php echo $this->Form->control('preço', ['class' => 'form-control custom-select d-block w-100', 'label' => FALSE, 'options' => $preço, 'empty' => true]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="lastName">Formas de Pagamento</label>
                        <?php
                        if ($empresa->pagamento == null) {
                            $empresa->pagamento = ':::::';
                        }
                        $pagamentos = explode(":", $empresa->pagamento);
                        ?> 
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="dinheiro" name="dinheiro" value="Dinheiro" 
                            <?php
                            if ($pagamentos[0] != null) {
                                echo "checked";
                            }
                            ?>>
                            <label class="custom-control-label" for="dinheiro">Dinheiro</label>                            
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="debito" name="debito" value="Cartão de Débito"
                            <?php
                            if ($pagamentos[1] != null) {
                                echo "checked";
                            }
                            ?>>
                            <label class="custom-control-label" for="debito">Cartão de Débito</label>                            
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="credito" name="credito" value="Cartão de Crédito"
                            <?php
                            if ($pagamentos[2] != null) {
                                echo "checked";
                            }
                            ?>>
                            <label class="custom-control-label" for="credito">Cartão de Crédito</label>                            
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cheque" name="cheque" value="Cheque"
                            <?php
                            if ($pagamentos[3] != null) {
                                echo "checked";
                            }
                            ?>>
                            <label class="custom-control-label" for="cheque">Cheque</label>                            
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="valimentacao" name="valimentacao" value="Vale Alimentação"
                            <?php
                            if ($pagamentos[4] != null) {
                                echo "checked";
                            }
                            ?>>
                            <label class="custom-control-label" for="valimentacao">Vale Alimentação</label>                            
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="vrefeicao" name="vrefeicao" value="Vale Refeição"
                            <?php
                            if ($pagamentos[5] != null) {
                                echo "checked";
                            }
                            ?>>
                            <label class="custom-control-label" for="vrefeicao">Vale Refeição</label>                            
                        </div>
                    </div>
                </div>
                <div class="row">                    
                    <div class="col-md-12">
                        <label for="firstName">Saiba Mais</label>
                        <?php echo $this->Form->control('saibamais', ['class' => 'form-control', 'label' => FALSE]); ?>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12" style="background-color: #e9ecef; padding: 20px;">
                <h4 class="mb-3">Redes Sociais</h4>
                <hr>
                <div class="row">                    
                    <div class="col-md-4 mb-3">
                        <label for="firstName">Facebook</label>
                        <?php echo $this->Form->control('facebook', ['class' => 'form-control', 'label' => FALSE]); ?>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="lastName">Instagram</label>
                        <?php echo $this->Form->control('instagram', ['class' => 'form-control', 'label' => FALSE]); ?>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="lastName">Twitter</label>
                        <?php echo $this->Form->control('twitter', ['class' => 'form-control', 'label' => FALSE]); ?>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <?= $this->Form->button('Salvar', ['class' => 'btn btn-secondary btn-lg btn-block']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <br>
</div>
<br>
