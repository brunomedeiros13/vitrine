<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categoria $categoria
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Categoria'), ['action' => 'edit', $categoria->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Categoria'), ['action' => 'delete', $categoria->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoria->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categorias view large-9 medium-8 columns content">
    <h3><?= h($categoria->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nomecategoria') ?></th>
            <td><?= h($categoria->nomecategoria) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($categoria->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($categoria->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($categoria->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Empresas') ?></h4>
        <?php if (!empty($categoria->empresas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nomeempresa') ?></th>
                <th scope="col"><?= __('Endereco') ?></th>
                <th scope="col"><?= __('Numero') ?></th>
                <th scope="col"><?= __('Complemento') ?></th>
                <th scope="col"><?= __('Bairro') ?></th>
                <th scope="col"><?= __('Cidade') ?></th>
                <th scope="col"><?= __('Cep') ?></th>
                <th scope="col"><?= __('Telefone1') ?></th>
                <th scope="col"><?= __('Telefone2') ?></th>
                <th scope="col"><?= __('Site') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Categorias Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($categoria->empresas as $empresas): ?>
            <tr>
                <td><?= h($empresas->id) ?></td>
                <td><?= h($empresas->nomeempresa) ?></td>
                <td><?= h($empresas->endereco) ?></td>
                <td><?= h($empresas->numero) ?></td>
                <td><?= h($empresas->complemento) ?></td>
                <td><?= h($empresas->bairro) ?></td>
                <td><?= h($empresas->cidade) ?></td>
                <td><?= h($empresas->cep) ?></td>
                <td><?= h($empresas->telefone1) ?></td>
                <td><?= h($empresas->telefone2) ?></td>
                <td><?= h($empresas->site) ?></td>
                <td><?= h($empresas->email) ?></td>
                <td><?= h($empresas->created) ?></td>
                <td><?= h($empresas->modified) ?></td>
                <td><?= h($empresas->categorias_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Empresas', 'action' => 'view', $empresas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Empresas', 'action' => 'edit', $empresas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Empresas', 'action' => 'delete', $empresas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $empresas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
