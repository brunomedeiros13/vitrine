<?php

/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::prefix('admin', function ($routes) {
    // All routes here will be prefixed with `/admin`
    // And have the prefix => admin route element added.
    $routes->fallbacks(DashedRoute::class);
});

Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'home']);
    $routes->connect('/entrar', ['controller' => 'Users', 'action' => 'login']);
    $routes->connect('/sair', ['controller' => 'Users', 'action' => 'logout']);
    $routes->connect('/anuncie', ['controller' => 'Empresas', 'action' => 'anuncie']);
    $routes->connect('/anunciegrátis', ['controller' => 'Empresas', 'action' => 'anunciegratis']);
    $routes->connect('/meusanuncios', ['controller' => 'Empresas', 'action' => 'meusanuncios']);
    $routes->connect('/meuusuario', ['controller' => 'Users', 'action' => 'meuusuario']);
    $routes->connect('/assineagora', ['controller' => 'Users', 'action' => 'assineagora']);
    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
  



    
    $routes->connect(
        '/empresa/:slug',
        ['controller' => 'Empresas', 'action' => 'view'],
        [
            'pass' => ['slug'],
            'slug' => '[^\/]+' // Taken from your example
        ]
    );
    
    
    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks(DashedRoute::class);
});
