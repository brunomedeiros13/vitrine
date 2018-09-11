<div class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark">
    <div class="container d-flex justify-content-between">
        <b><?= $this->Html->link('Vitrine '.$titulo, ['controller' => 'pages', 'action' => 'home'], ['class' => 'navbar-brand d-flex align-items-center']) ?></b>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
            <ul class="navbar-nav">
                <?php if ($this->Session->read("Auth.User") == NULL) { ?>
                    <li class="nav-item active">
                        <b><?= $this->Html->link("Divulgue seu Negócio", ['controller' => 'empresas', 'action' => 'anuncie'], ['class' => 'nav-link text-success']); ?></b>                                
                    </li>
                    <li class="nav-item active">
                        <?= $this->Html->link("Central do Anunciante", ['controller' => 'users', 'action' => 'login'], ['class' => 'nav-link']); ?>
                    </li>
                <?php } else { ?>
                    <?php if ($this->Session->read("Auth.User.role") == 1) { ?>
                        <li class="nav-item active"><a href="" class="nav-link">Olá, <?= $this->Session->read("Auth.User.nome"); ?>!</a></li>
                        <li class="nav-item active"><?= $this->Html->link("<i class='fas fa-home'></i> Painel Administrativo", ['controller' => 'empresas', 'action' => 'index'], ['class' => 'nav-link text-success', 'escape' => false]); ?></li>
                        <li class="nav-item active"><?= $this->Html->link("<i class='fas fa-sign-out-alt'></i> Sair", ['controller' => 'users', 'action' => 'logout'], ['class' => 'nav-link', 'escape' => false]); ?></li>
                    <?php } else { ?>
                        <li class="nav-item active"><a href="" class="nav-link">Olá, <?= $this->Session->read("Auth.User.nome"); ?>!</a></li>
                        <li class="nav-item active"><?= $this->Html->link("<i class='fas fa-home'></i> Meus Anúncios", ['controller' => 'empresas', 'action' => 'meusanuncios'], ['class' => 'nav-link text-success', 'escape' => false]); ?></li>
                        <li class="nav-item active"><?= $this->Html->link("<i class='far fa-user'></i> Meu Usuário", ['controller' => 'users', 'action' => 'meuusuario'], ['class' => 'nav-link', 'escape' => false]); ?></li>
                        <li class="nav-item active"><?= $this->Html->link("<i class='fas fa-sign-out-alt'></i> Sair", ['controller' => 'users', 'action' => 'logout'], ['class' => 'nav-link', 'escape' => false]); ?></li>
                        <?php } ?>
                    <?php } ?>
            </ul>
        </div>
    </div>		
</div>