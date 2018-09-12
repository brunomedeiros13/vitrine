<?php

/*
 * Controller de Users
 * Gerencia ações relacionadas aos Usuários.
 * 
 * Criado por Bruno Medeiros
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;

class UsersController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['login', 'logout', 'assineagora']);
        $this->set('titulo', Configure::read('Vitrine.nome'));
    }

    public function isAuthorized($user) {
        //Permissão de Administrador
        if ($user['role'] == 1) {
            return true;
        }
        //Permissão de Usuário Logado
        $action = $this->request->getParam('action');
        if (in_array($action, ['meuusuario','alterarsenhauser'])) {
            return true;
        }
        return false;
    }

    public function index() {
        //Somente para Administrador
        $this->set('title', 'Painel de Administrador');
        $this->viewBuilder()->setLayout('default-administrador');
        $users = $this->paginate($this->Users, ['contain' => ['Empresas']]);
        $this->set(compact('users'));
    }

    public function meuusuario() {
        $this->set('title', 'Meu Usuário');
        $this->viewBuilder()->setLayout('default-central');
        $user = $this->Users->get($this->Auth->user('id'), [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success('As alterações foram realizadas com sucesso.');
                return $this->redirect(['action' => 'meuusuario']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set('user', $user);
    }

    public function add() {
        //Somente para Administrador
        $this->set('title', 'Painel de Administrador');
        $this->viewBuilder()->setLayout('default-administrador');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('O novo usuário foi criado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function editaradmin($id = null) {
        //Somente para Administrador
        $this->set('title', 'Painel de Administrador');
        $this->viewBuilder()->setLayout('default-administrador');
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('As alterações foram salvas com sucesso.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function alterarsenha($id = null) {
        //Somente para Administrador
        $this->set('title', 'Painel de Administrador');
        $this->viewBuilder()->setLayout('default-administrador');
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('A senha do usuária foi alterada com sucesso.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function alterarsenhauser($id = null) {        
        $this->set('title', 'Alterar Senha');
        $this->viewBuilder()->setLayout('default-central');
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('A senha do usuária foi alterada com sucesso.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function delete($id = null) {
        //Somente para Administrador
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('O usuário foi excluído com sucesso.'));
        } else {
            $this->Flash->error(__('O usuário não foi excluído. Tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function login() {
        $this->set('title', 'Central do Anunciante');
        $this->viewBuilder()->setLayout('default-login');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                if ($user['role'] == 1) {
                    return $this->redirect(['controller' => 'empresas', 'action' => 'index']);
                } else {
                    return $this->redirect(['controller' => 'empresas', 'action' => 'meusanuncios']);
                }
            }
            $this->Flash->error('Usuário e/ou senha incorretos.');
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function assineagora() {
        $this->set('title', 'Assine Agora');
        $this->viewBuilder()->setLayout('default-anuncie');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $cod = $user->id * 145890523;
                return $this->redirect(['controller' => 'empresas', 'action' => 'adicionar', $cod]);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

}
