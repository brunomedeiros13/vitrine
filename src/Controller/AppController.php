<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller {

    public function initialize() {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'logoutAction' => [
                'controller' => 'Pages',
                'action' => 'home'
            ],
            'redirectUrl' => ['controller' => 'empresas', 'action' => 'meusanuncios'],
            //use isAuthorized in Controllers
            'authorize' => ['Controller'],
            // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer(),
            'authError' => 'Você não tem permissão para acessar essa área.'
        ]);

        // $this->loadComponent('Security');
    }

}
