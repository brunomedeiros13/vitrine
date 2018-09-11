<br>
<div class="categorias index large-9 medium-8 columns content">
    <h3><?= 'Categorias' ?> <a href="#" style="margin-bottom: 5px" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#adicionarModal"><i class="fas fa-plus"></i> Nova Categoria</a></h3>
    <?= $this->Flash->render() ?> 
    <table class="table table-striped text-center" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', 'ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nomecategoria', 'Categoria') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantidade', 'Quantidade de Anúncios') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', 'Criado em') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified', 'Última Modificação') ?></th>
                <th scope="col" class="actions"><?= 'Ações' ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria): ?>
                <tr>
                    <td><?= $this->Number->format($categoria->id) ?></td>
                    <td><span style="font-weight: 500"><?= $categoria->nomecategoria ?></span></td>                    
                    <td><?= $categoria->quantidade ?></td>                    
                    <td><?= $categoria->created->i18nFormat('dd/MM/yyyy HH:mm:ss'); ?></td>
                    <td><?= $categoria->modified->i18nFormat('dd/MM/yyyy HH:mm:ss') ?></td>                    
                    <td class="ações">                        
                        <?= $this->Html->link('<i class="fas fa-edit"></i>', ['action' => 'edit', $categoria->id], ['escape' => false]) ?>
                        <?= $this->Form->postLink('<i class="fas fa-trash-alt"></i>', ['action' => 'delete', $categoria->id], ['confirm' => __('Gostaria de excluir {0}?', $categoria->nomecategoria), 'escape' => false]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>    
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?php
            $this->Paginator->templates([
                'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                'current' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>'
            ]);
            ?>
            <?= $this->Paginator->prev('Anterior') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('Próximo') ?>
        </ul>
    </nav>
</div>
<br>
<div class="modal fade" id="adicionarModal" tabindex="-1" role="dialog" aria-labelledby="adicionarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?= $this->Form->create($categoria, ['url' => ['action' => 'add']]) ?>
            <div class="modal-header" style="border-bottom: 0px">
                <h5 class="modal-title" id="exampleModalLabel">Nova Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">                
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <?php echo $this->Form->control('nomecategoria', ['class' => 'form-control', 'label' => FALSE, 'value' => '', 'id' => 'nomecategoria']); ?>
                    </div>
                </div>               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <?= $this->Form->button('Salvar', ['class' => 'btn btn-primary']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
