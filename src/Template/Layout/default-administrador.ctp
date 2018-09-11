<?php
/**
  Layout Padrão do Site

  Por Bruno Medeiros
 */
$tituloSite = 'Vitrine São José';
?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= $tituloSite ?> - <?= $title ?>
        </title>
        <?= $this->Html->meta('icon') ?>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <?= $this->Html->css(['bootstrap.min', 'dashboard']); ?>
        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body>
        <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/vitrine" target="_blank">Vitrine São José</a>

            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <?php echo $this->Html->link('Sair', ['controller' => 'Users', 'action' => 'logout'], ['class' => 'nav-link']); ?>
                </li>
            </ul>
        </nav>
        
        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-3 d-none d-md-block bg-light sidebar col-lg-1">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link <?php if ($this->request->here == '/vitrine/empresas'){ echo 'active'; } ?>" href="/vitrine/empresas">
                                    <span data-feather="home"></span>
                                    Anúncios <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if ($this->request->here == '/vitrine/users'){ echo 'active'; } ?>" href="/vitrine/users">
                                    <span data-feather="users"></span>
                                    Usuários
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if ($this->request->here == '/vitrine/categorias/admin'){ echo 'active'; } ?>" href="/vitrine/categorias/admin">
                                    <i class="fas fa-grip-horizontal feather"></i>
                                    Categorias
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link <?php if ($this->request->here == '/vitrine/bairros/admin'){ echo 'active'; } ?>" href="/vitrine/bairros/admin">
                                    <i class="fas fa-building feather"></i>
                                    Bairros
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/vitrine/sair">
                                    <span data-feather="log-out"></span>
                                    Sair
                                </a>
                            </li>
                            
                        </ul>                        
                    </div>
                </nav>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-11 px-4">
                    <?= $this->fetch('content') ?> 
                </main>
            </div>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <?= $this->Html->script(['bootstrap.min', 'bootstrap.bundle.min', 'holder.min', 'jquery-slim.min']); ?>
        <!-- Icons -->
        <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
        <script>
            feather.replace()
        </script>

    </body>
</html>
