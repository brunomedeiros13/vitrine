<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Alterar Senha de <?= $user->nome.' '.$user->sobrenome ?></h1>
</div>
<div class="editar-empresa">
    <div class="add-empresa">
        <?= $this->Form->create($user) ?>
        <div class="row">
            <div class="col-12" style="background-color: #e9ecef; padding: 20px;">
                <?= $this->Flash->render() ?>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Nova Senha</label>
                        <?php echo $this->Form->control('password', ['class' => 'form-control', 'label' => FALSE,'value' => '']); ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Repita a Nova Senha</label>
                        <?php echo $this->Form->control('passwrepeat', ['class' => 'form-control', 'label' => FALSE,'type' => 'password']); ?>
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

