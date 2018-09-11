<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comentario $comentario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Comentario'), ['action' => 'edit', $comentario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Comentario'), ['action' => 'delete', $comentario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comentario->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Comentarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comentario'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="comentarios view large-9 medium-8 columns content">
    <h3><?= h($comentario->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Empresa') ?></th>
            <td><?= $comentario->has('empresa') ? $this->Html->link($comentario->empresa->id, ['controller' => 'Empresas', 'action' => 'view', $comentario->empresa->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($comentario->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($comentario->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($comentario->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Comentario') ?></h4>
        <?= $this->Text->autoParagraph(h($comentario->comentario)); ?>
    </div>
</div>
