<div style="margin-top: 100px"></div>
<div class="container">
    <h2>Cadastre uma Empresa</h2>
    <br>
    <p>Você pode cadastrar gratuitamente uma empresa no Vitrine <?= $titulo ?></p>
    <p>Primeiramente, faça uma busca pelo nome da empresa no site e verifique se ela não está cadastrada. Caso não esteja, preencha o formulário abaixo.</p>
    <p><b>Muito rápido e fácil!</b> Qualquer dúvida, entre em contato conosco, através do e-mail <a href="mailto:contato@vitrinesaojose.com.br">contato@vitrinesaojose.com.br</a>.</p>
    <br>
    <div class="add-empresa">
        <div class="row">
            <div class="col-12" style="background-color: #e9ecef; padding: 20px;">
                <h4 class="mb-3">Dados Básicos</h4>
                <hr>
                <?= $this->Form->create($empresa) ?>
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
                        <?php echo $this->Form->control('cidade', ['class' => 'form-control', 'label' => FALSE, 'disabled' => true, 'value' => $titulo]); ?>
                        <?php echo $this->Form->control('cidade', ['type' => 'hidden', 'label' => FALSE, 'value' => $titulo]); ?>
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
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12" style="background-color: #e9ecef; padding: 20px;">
                <h4 class="mb-3">Dados Adicionais</h4>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Nome do Proprietário</label>
                        <?php echo $this->Form->control('nomeproprietario', ['class' => 'form-control', 'label' => FALSE]); ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">E-mail para Contato</label>
                        <?php echo $this->Form->control('emailproprietario', ['class' => 'form-control', 'label' => FALSE]); ?>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <?= $this->Form->button('Salvar', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <br>
</div>
<br>
