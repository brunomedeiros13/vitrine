<?php

/*
 * Controller de Bairros
 * Gerencia todas as ações relacionadas aos Bairros
 * 
 * Criado por Bruno Medeiros
 */

namespace App\Controller;

use App\Controller\AppController;

class BairrosController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['index']);
    }

    public function isAuthorized($user) {
        //Permissão de Administrador
        if ($user['role'] == 1) {
            return true;
        }
        return false;
    }

    public function index() {
        $this->set('title', 'Bairros em São José');
        $bairros = $this->Bairros->find(all, ['order' => 'nomeBairro']);
        $this->set(compact('bairros'));
    }

    public function admin() {
        $this->set('title', 'Painel Administrativo');
        $this->viewBuilder()->layout('default-administrador');
        $bairros = $this->paginate($this->Bairros->find('all'));
        $this->set(compact('bairros'));
    }

    public function view($id = null) {
        $bairro = $this->Bairros->get($id, [
            'contain' => []
        ]);
        $this->set('bairro', $bairro);
    }

    public function add() {
        $bairro = $this->Bairros->newEntity();
        $bairro = $this->Bairros->patchEntity($bairro, $this->request->getData());
        if ($this->Bairros->save($bairro)) {
            $this->Flash->success(__('O novo bairro foi criado com sucesso'));
            return $this->redirect(['action' => 'admin']);
        }
        $this->Flash->error(__('The bairro could not be saved. Please, try again.'));

        $this->set(compact('bairro'));
    }

    public function edit($id = null) {
        $this->set('title', 'Painel Administrativo');
        $this->viewBuilder()->layout('default-administrador');
        $bairro = $this->Bairros->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bairro = $this->Bairros->patchEntity($bairro, $this->request->getData());
            if ($this->Bairros->save($bairro)) {
                $this->Flash->success(__('O bairro foi alterado com sucesso.'));
                return $this->redirect(['action' => 'admin']);
            }
            $this->Flash->error(__('The bairro could not be saved. Please, try again.'));
        }
        $this->set(compact('bairro'));
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $bairro = $this->Bairros->get($id);
        if ($this->Bairros->delete($bairro)) {
            $this->Flash->success(__('O bairro foi excuído.'));
        } else {
            $this->Flash->error(__('The bairro could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'admin']);
    }

}
