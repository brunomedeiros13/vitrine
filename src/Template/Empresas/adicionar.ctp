<div style="margin-top: 100px"></div>
<div class="container">
    <h2>Informações da Empresa</h2>
    <br>
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Carrinho de Compras</span>
                <span class="badge badge-secondary badge-pill">1</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Plano Destaque</h6>

                    </div>
                    <span class="text-muted">R$ 49,90</span>
                </li>
                <li class="list-group-item d-flex justify-content-between bg-light">
                    <div class="text-success">
                        <h6 class="my-0">Oferta Exclusiva</h6>
                    </div>
                    <span class="text-success">-R$10,00</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (R$)</span>
                    <strong>R$ 39,90/mês</strong>
                </li>
            </ul>
        </div>
        <div class="col-md-8 order-md-1">
            <div class="add-empresa">
                <div class="row">
                    <div class="col-12">
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
                                <label for="firstName">E-mail</label>
                                <?php echo $this->Form->control('email', ['class' => 'form-control', 'label' => FALSE, 'required' => FALSE]); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Website</label>
                                <?php echo $this->Form->control('site', ['class' => 'form-control', 'label' => FALSE]); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo $this->Form->control('user_id', ['type' => 'hidden','label' => FALSE]); ?>
                <?php echo $this->Form->control('destaque', ['type' => 'hidden','label' => FALSE]); ?>
                <?= $this->Form->button('Salvar', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
<br>
