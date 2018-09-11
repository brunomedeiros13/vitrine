<br>
<div class="categorias index large-9 medium-8 columns content">
    <h3><?= 'Editar Categoria' ?></h3>
    <?= $this->Flash->render() ?> 
    <div class="categorias form large-9 medium-8 columns content">
        <?= $this->Form->create($categoria) ?>
        <div class="row">
            <div class="col-md-12 mb-3">
                <?php echo $this->Form->control('nomecategoria', ['class' => 'form-control', 'label' => FALSE]); ?>
            </div>
        </div>               
    </div>
    <?= $this->Form->button('Salvar', ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
