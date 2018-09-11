<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bairro $bairro
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Bairros'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bairros form large-9 medium-8 columns content">
    <?= $this->Form->create($bairro) ?>
    <fieldset>
        <legend><?= __('Add Bairro') ?></legend>
        <?php
            echo $this->Form->control('nomeBairro');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
