<?php
$tituloSite = 'Vitrine São José';
?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= $tituloSite ?> - 
            <?= $title ?>
        </title>
        <?= $this->Html->meta('icon') ?>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <?= $this->Html->css(['bootstrap.min', 'album', 'default']); ?>
        <?= $this->Html->meta('description', 'Guia online de negócios e empresas de São José - SC. Encontre restaurantes, hotéis, lanchonetes, academias e muito mais.'); ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body>
        <header>
            <?= $this->element('navbar'); ?>
        </header>
        <div class="container">
            <?= $this->fetch('content') ?>
        </div>         
        <footer class="text-muted bg-dark footer-site text-center fixed-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <h5>Vitrine <?= $titulo ?></h5>
                        <ul class="lista-home"> 
                            <li><?= $this->Html->link('Destaques', ['controller' => 'empresas', 'action' => 'destaques']) ?></li>
                            <li><?= $this->Html->link('Categorias', ['controller' => 'categorias']) ?></li>
                            <li><?= $this->Html->link('Bairros', ['controller' => 'bairros']) ?></li>
                            <li><?= $this->Html->link('Fale Conosco', ['controller' => 'categorias']) ?></li>
                        </ul>
                    </div>
                    <div class="col-4">
                        <h5>Para sua Empresa</h5>
                        <ul class="lista-home"> 
                            <li class="divulgue"><?= $this->Html->link('Divulgue seu Negócio', ['controller' => 'empresas', 'action' => 'anuncie']) ?></li>
                            <li><?= $this->Html->link('Central do Anunciante', ['controller' => 'users', 'action' => 'login']) ?></li>
                        </ul>
                    </div>
                    <div class="col-4 siga-nos">
                        <h5>Siga-nos!</h5>
                        <p><?php echo $this->Html->image('facebook.png'); ?> <?php echo $this->Html->image('instagram.png'); ?></p>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-12">
                        <p>Vitrine São José 2018 | Todos os direitos reservados.</p>
                    </div>
                </div>
            </div>
        </footer>
    </body>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <?= $this->Html->script(['jquery-slim.min']); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <?= $this->Html->script(['bootstrap.min', 'bootstrap.bundle.min', 'holder.min', 'jquery-slim.min', 'jquery.mCustomScrollbar', 'jssocials', 'jquery.barrating.min']); ?>
    <script>
        (function ($) {
            $(window).on("load", function () {
                $("#categorias").mCustomScrollbar({
                    setHeight: 180,
                    theme: "dark"
                });
            });
        })(jQuery);
    </script>

    <script>
        (function ($) {
            $(window).on("load", function () {
                $("#bairros").mCustomScrollbar({
                    setHeight: 180,
                    theme: "dark"
                });
            });
        })(jQuery);
    </script>
    <script>
        $("#share").jsSocials({
            showLabel: false,
            showCount: false,
            shares: ["facebook", "twitter", "googleplus", "email"]
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $('#rating').barrating({
                theme: 'fontawesome-stars',
                allowEmpty: true,
                emptyValue: '0'
            });
        });
    </script>
</html>
