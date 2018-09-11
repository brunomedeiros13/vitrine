<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Meu Usuário</h1>
</div>


<div class="editar-empresa">
    <div class="add-empresa">
        <?= $this->Form->create($user) ?>
        <div class="row">
            <div class="col-12" style="background-color: #e9ecef; padding: 20px;">
                <?= $this->Flash->render() ?>
                <h4 class="mb-3">Dados Básicos</h4>
                <hr>
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
                        <label for="firstName">E-mail</label>
                        <?php echo $this->Form->control('email', ['class' => 'form-control', 'label' => FALSE]); ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Telefone</label>
                        <?php echo $this->Form->control('telefone', ['class' => 'form-control', 'label' => FALSE]); ?>
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
</div> 
<br>

