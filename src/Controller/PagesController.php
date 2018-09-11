<?php

/*
 * Controller de Pages
 * Gerencia páginas estáticas
 * 
 * Criado por Bruno Medeiros
 */

namespace App\Controller;

use App\Controller\AppController;

class PagesController extends AppController {

    public function initialize() {
        parent::initialize();

        $this->Auth->allow(['home', 'finalizacao']);
    }

    public function home() {
        $this->set('title', 'Guia online de empresas e negócios em São José');
        $this->viewBuilder()->layout('default-home');
        $this->loadModel('Categorias');
        $this->loadModel('Bairros');
        $this->loadModel('Empresas');
        $categorias = $this->Categorias->find('all', ['limit' => '28', 'order' => 'quantidade DESC']);
        $bairros = $this->Bairros->find('all', ['order' => 'nomeBairro']);
        $empresas = $this->Empresas->find('all', ['conditions' => ['Empresas.destaque' => '1', 'Empresas.photo <>' => '']]);
        $this->set('totaldestaques', $empresas->count());
        $this->set(compact('bairros'));
        $this->set('categorias', $categorias);
        $this->set('empresas', $empresas);
    }

    public function finalizacao() {
        $this->set('title', 'Anúncio criado com sucesso!');
        $this->viewBuilder()->layout('default-finalizacao');
    }

}
