<div style="margin-top: 100px"></div>
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
        <?= $this->Form->create($user) ?>
        <h4 class="mb-3">Assine Agora</h4>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName">Nome</label>
                    <?php echo $this->Form->control('nome', ['class' => 'form-control', 'label' => FALSE]); ?>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="firstName">Sobrenome</label>
                    <?php echo $this->Form->control('sobrenome', ['class' => 'form-control', 'label' => FALSE]); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName">Senha</label>
                    <?php echo $this->Form->control('password', ['class' => 'form-control', 'label' => FALSE]); ?>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="firstName">Confirme a Senha</label>
                    <?php echo $this->Form->control('password_confirme', ['class' => 'form-control', 'label' => FALSE,'type' => 'password']); ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="firstName">E-mail</label>
                <?php echo $this->Form->control('email', ['class' => 'form-control', 'label' => FALSE, 'placeholder' => 'email@email.com.br']); ?>
            </div>

            <div class="mb-3">
                <label for="firstName">Telefone</label>
                <?php echo $this->Form->control('telefone', ['class' => 'form-control', 'label' => FALSE, 'placeholder' => '(99) 99999-9999']); ?>
            </div>          
            <?= $this->Form->button('Continuar', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
            <?= $this->Form->end() ?>
            <br>
    </div>
</div>
<div style="margin-bottom: 150px"></div>