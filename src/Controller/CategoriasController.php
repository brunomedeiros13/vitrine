<?php

/*
 * Controller de Categorias
 * Gerencia todas as ações relacionadas às Categorias
 * 
 * Criado por Bruno Medeiros
 */

namespace App\Controller;

use App\Controller\AppController;

class CategoriasController extends AppController {

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
        $this->set('title', 'Categorias de empresas em São José');
        $categorias = $this->Categorias->find('all', ['order' => 'nomecategoria']);
        $this->set(compact('categorias'));
    }

    public function admin() {
        //Somente Administrador
        $this->set('title', 'Painel Administrativo');
        $this->viewBuilder()->layout('default-administrador');
        $categorias = $this->paginate($this->Categorias->find('all'));
        $this->set(compact('categorias'));
    }

    public function add() {
        //Somente Administrador
        $categoria = $this->Categorias->newEntity();
        $categoria = $this->Categorias->patchEntity($categoria, $this->request->getData());
        if ($this->Categorias->save($categoria)) {
            $this->Flash->success(__('A nova categoria foi criada com sucesso.'));
            return $this->redirect(['action' => 'admin']);
        }
        $this->Flash->error(__('A categoria não foi salva. Por favor, tente novamente.'));
        $this->set(compact('categoria'));
    }

    public function edit($id = null) {
        //Somente Administrador
        $this->set('title', 'Painel Administrativo');
        $this->viewBuilder()->layout('default-administrador');
        $categoria = $this->Categorias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categoria = $this->Categorias->patchEntity($categoria, $this->request->getData());
            if ($this->Categorias->save($categoria)) {
                $this->Flash->success(__('A categoria foi alterada com sucesso'));

                return $this->redirect(['action' => 'admin']);
            }
            $this->Flash->error(__('A categoria não foi alterada. Por favor, tente novamente.'));
        }
        $this->set(compact('categoria'));
    }

    public function delete($id = null) {
        //Somente Administrador
        $this->request->allowMethod(['post', 'delete']);
        $categoria = $this->Categorias->get($id);
        if ($this->Categorias->delete($categoria)) {
            $this->Flash->success(__('A categoria foi excluída.'));
        } else {
            $this->Flash->error(__('A categoria não foi excluída. Por favor, tente novamente.'));
        }
        return $this->redirect(['action' => 'admin']);
    }

}
