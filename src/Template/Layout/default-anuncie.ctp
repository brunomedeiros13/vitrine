<?php
/**
  Layout Padrão do Site

  Por Bruno Medeiros
 */
$tituloSite = 'Vitrine ' . $titulo;
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
        <?= $this->Html->css(['bootstrap.min', 'album', 'default', 'jquery.mCustomScrollbar.min', 'jssocials', 'jssocials-theme-flat', 'fontawesome-stars']); ?>
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
        <?= $this->Flash->render() ?>
        <?php echo $this->element('footer'); ?>

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
    <script type="text/javascript">
        $(".empresas-destaque").click(function () {
            window.location = $(this).find("a").attr("href");
            return false;
        });
    </script>
</html>
