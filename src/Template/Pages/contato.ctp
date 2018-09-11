<div style="margin-top: 100px"></div>
<div class="container">
    <h2>Fale Conosco</h2> 
    <hr>
    <?= $this->Flash->render() ?>
    <p>Preencha o formulário abaixo para entrar em contato conosco, com relação a informações, dúvidas, esclarecimentos ou sugestões.</p>
    <div class="row">
        <div class="col-7">
            <?= $this->Form->create(null, ['url' => ['action' => 'contato']]) ?>               
            <div class="row">
                <div class="col-md-12 mb-3">
                    <?php echo $this->Form->control('nome', ['class' => 'form-control', 'label' => FALSE, 'placeholder' => 'Nome','required' => true]); ?>
                </div>
            </div>   
            <div class="row">
                <div class="col-md-12 mb-3">
                    <?php echo $this->Form->control('email', ['class' => 'form-control', 'label' => FALSE, 'placeholder' => 'E-Mail','required' => true]); ?>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-12 mb-3">
                    <?php echo $this->Form->control('telefone', ['class' => 'form-control', 'label' => FALSE, 'placeholder' => 'Telefone']); ?>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-12 mb-3">
                    <?php echo $this->Form->control('texto', ['class' => 'form-control', 'label' => FALSE, 'placeholder' => 'Mensagem', 'type' => 'textarea','required' => true]); ?>
                </div>
            </div> 
            <?= $this->Form->button('Enviar', ['class' => 'btn btn-secondary btn-lg']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<br>
<div style="margin-top: 120px"></div>