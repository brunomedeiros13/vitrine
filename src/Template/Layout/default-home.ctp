<?php
/*
 * Layout utilizado na página inicial do site
 * 
 * Criado por Bruno Medeiros
 */

$tituloSite = 'Vitrine '.$titulo;
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
        <?= $this->Html->css(['bootstrap.min', 'album', 'default']); ?>
        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body>
        <header>
            <?= $this->element('navbar'); ?>
        </header>                  
        <?= $this->fetch('content') ?>                
        <?= $this->element('footer'); ?>
    </body>
    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <?= $this->Html->script(['jquery-slim.min']); ?>
    <?= $this->Html->script(['bootstrap.bundle.min', 'holder.min', 'jquery-slim.min', 'jquery.mCustomScrollbar', 'jssocials', 'jquery.barrating.min']); ?>
    <script type="text/javascript">
        $(".empresas-destaque").click(function () {
            window.location = $(this).find("a").attr("href");
            return false;
        });
    </script>    
</html>
