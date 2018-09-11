<br>
<div class="users index large-9 medium-8 columns content">
    <h3><?= 'Usuários' ?> <?php echo $this->Html->link('<i class="fas fa-plus"></i> Novo Usuário', ['action' => 'add'], ['escape' => false, 'class' => 'btn btn-secondary btn-sm', 'style' => 'margin-bottom: 5px']); ?></h3>
    <?= $this->Flash->render() ?>    
    <table class="table table-striped text-center" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', 'ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome', 'Nome Completo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email', 'E-mail') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefone', 'Telefone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresas', 'Anúncios') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role', 'Permissão') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', 'Criado em') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified', 'Ultima Modificação') ?></th>
                <th scope="col" class="actions"><?= 'Ações' ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= $user->nome . ' ' . $user->sobrenome ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->telefone ?></td>
                    <td><ul class="lista-home ações"><?php foreach ($user->empresas as $empresa): ?>
                                <li> <?= $empresa->nomeempresa ?>
                                    <small><?= $this->Html->link('<i class="fas fa-search"></i>', ['controller' => 'empresas', 'action' => 'view', $empresa->slug], ['escape' => false, 'target' => '_blank']) ?>
                                        <?= $this->Html->link('<i class="fas fa-edit"></i>', ['controller' => 'empresas', 'action' => 'editaradmin', $empresa->slug], ['escape' => false]) ?>
                                    </small></li>                       
                            <?php endforeach; ?></ul></td>  
                    <td><?php
                        if ($user->role == 1) {
                            echo 'Administrador';
                        } else {
                            echo 'Padrão';
                        }
                        ?>
                    </td>
                    <td><?= $user->created->i18nFormat('dd/MM/yyyy HH:mm:ss'); ?></td>
                    <td><?= $user->modified->i18nFormat('dd/MM/yyyy HH:mm:ss') ?></td>  
                    <td class="ações">
                        <?= $this->Html->link('<i class="fas fa-key"></i>', ['action' => 'alterarsenha', $user->id], ['escape' => false]) ?>
                        <?= $this->Html->link('<i class="fas fa-edit"></i>', ['action' => 'editaradmin', $user->id], ['escape' => false]) ?>
                        <?= $this->Form->postLink('<i class="fas fa-trash-alt"></i>', ['action' => 'delete', $user->id], ['confirm' => __('Gostaria de excluir {0}?', $user->nome . ' ' . $user->sobrenome), 'escape' => false]) ?>
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
