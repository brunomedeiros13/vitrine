<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'CakeDC/Auth' => $baseDir . '/vendor/cakedc/auth/',
        'CakeDC/Users' => $baseDir . '/vendor/cakedc/users/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Josegonzalez/Upload' => $baseDir . '/vendor/josegonzalez/cakephp-upload/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'Muffin/Slug' => $baseDir . '/vendor/muffin/slug/',
        'Search' => $baseDir . '/plugins/Search/',
        'Sluggable' => $baseDir . '/plugins/Sluggable/',
        'WyriHaximus/TwigView' => $baseDir . '/vendor/wyrihaximus/twig-view/'
    ]
];