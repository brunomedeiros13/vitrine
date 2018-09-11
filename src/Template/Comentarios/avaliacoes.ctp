<br>
<div class="comentarioss index large-9 medium-8 columns content">
    <h3><?= 'Avaliações | '. $empresa->nomeempresa?></h3>
    <?= $this->Flash->render() ?>
    <table class="table table-striped text-center" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', 'ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comentario', 'Comentário') ?></th>
                <th scope="col"><?= $this->Paginator->sort('autor', 'Autor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rating', 'Nota') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', 'Criado em') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified', 'Ultima Modificação') ?></th>
                <th scope="col" class="actions"><?= 'Ações' ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comentarios as $comentario): ?>
                <tr>
                    <td><?= $this->Number->format($comentario->id) ?></td>
                    <td><?= $comentario->comentario ?></td>          
                    <td><?= $comentario->autor ?></td> 
                    <td>
                        <?php $comentario->rating = round($comentario->rating); ?>
                        <?php if ($comentario->rating == 1) { ?>
                            <i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                        <?php } elseif ($comentario->rating == 2) { ?>
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                        <?php } elseif ($comentario->rating == 3) { ?>
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                        <?php } elseif ($comentario->rating == 4) { ?>
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                        <?php } elseif ($comentario->rating == 5) { ?>
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        <?php } elseif ($comentario->rating == 0) { ?>
                            <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                        <?php } ?>
                    </td>  
                    <td><?= $comentario->created->i18nFormat('dd/MM/yyyy HH:mm:ss'); ?></td>
                    <td><?= $comentario->modified->i18nFormat('dd/MM/yyyy HH:mm:ss') ?></td>  
                    <td class="ações">
                        <?= $this->Form->postLink('<i class="fas fa-trash-alt"></i>', ['action' => 'delete', $comentario->id], ['confirm' => __('Gostaria de excluir a avaliação selecionada?'), 'escape' => false]) ?>
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
