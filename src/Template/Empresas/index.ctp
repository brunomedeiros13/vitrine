<br>
<div class="empresas index large-9 medium-8 columns content">
    <h3><?= 'Todos Anúncios' ?> <?php echo $this->Html->link('<i class="fas fa-plus"></i> Novo Anúncio', ['action' => 'add'], ['escape' => false, 'class' => 'btn btn-secondary btn-sm', 'style' => 'margin-bottom: 5px']); ?></h3>
    <table class="table table-striped text-center" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', 'ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nomeempresa', 'Empresa') ?></th>
                <th scope="col"><?= $this->Paginator->sort('endereco', 'Endereço') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Bairro.id', 'Bairro') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categoria', 'Categoria') ?></th>
                <th scope="col"><?= $this->Paginator->sort('views', 'Visualizações') ?></th>
                <th scope="col"><?= $this->Paginator->sort('destaque', 'Destaque') ?></th>                
                <th scope="col"><?= $this->Paginator->sort('ativa', 'Ativo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ativa', 'Avaliações') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', 'Criado em') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified', 'Última Modificação') ?></th>
                <th scope="col" class="actions"><?= 'Ações' ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empresas as $empresa): ?>
                <tr>
                    <td><?= $this->Number->format($empresa->id) ?></td>
                    <td><span style="font-weight: 500"><?= $empresa->nomeempresa ?></span></td>
                    <td><?= $empresa->endereco . ', ' . $empresa->numero ?></td>
                    <td><?= $empresa->bairro->nomeBairro ?></td>
                    <td><?= $empresa->categoria->nomecategoria ?></td>
                    <td><?= $empresa->views ?></td>
                    <td><?php if ($empresa->destaque == 1) { ?>
                            <span class="destaquesim"><?= $this->Form->postLink('<i class="fas fa-check-circle"></i>', ['action' => 'alteradestaque', $empresa->id, $empresa->destaque], ['escape' => false]) ?></span>                    
                        <?php } else { ?>
                            <span class="destaquenao"><?= $this->Form->postLink('<i class="fas fa-check-circle"></i>', ['action' => 'alteradestaque', $empresa->id, $empresa->destaque], ['escape' => false]) ?>
                            </span><?php } ?> 
                    </td> 
                    <td><?php if ($empresa->ativa == 0) { ?>
                            <span class="destaquesim"><?= $this->Form->postLink('<i class="fas fa-check-circle"></i>', ['action' => 'alteraativa', $empresa->id, $empresa->ativa], ['escape' => false]) ?></span>                    
                        <?php } else { ?>
                            <span class="destaquenao"><?= $this->Form->postLink('<i class="fas fa-check-circle"></i>', ['action' => 'alteraativa', $empresa->id, $empresa->ativa], ['escape' => false]) ?>
                            </span><?php } ?> 
                    </td> 
                    <td>
                        <?php $coment = 0; ?>
                        <?php foreach ($empresa->comentarios as $comentario): ?>
                            <?php $coment++; ?>
                        <?php endforeach; ?>
                        <?php if ($coment > 0){ ?>
                        <?= $this->Html->link($coment,['controller' => 'comentarios','action' => 'avaliacoes',$empresa->slug]); ?>
                        <?php } else { echo $coment; }?>
                    </td>
                    <td><?= $empresa->created->i18nFormat('dd/MM/yyyy HH:mm:ss'); ?></td>
                    <td><?= $empresa->modified->i18nFormat('dd/MM/yyyy HH:mm:ss') ?></td>                    
                    <td class="ações">
                        <?= $this->Html->link('<i class="fas fa-search"></i>', ['action' => 'view', $empresa->slug], ['escape' => false, 'target' => '_blank']) ?>
                        <?= $this->Html->link('<i class="fas fa-edit"></i>', ['action' => 'editaradmin', $empresa->slug], ['escape' => false]) ?>
                        <?= $this->Form->postLink('<i class="fas fa-trash-alt"></i>', ['action' => 'delete', $empresa->id], ['confirm' => __('Gostaria de excluir {0}?', $empresa->nomeempresa), 'escape' => false]) ?>
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
