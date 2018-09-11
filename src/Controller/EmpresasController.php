<?php

/*
 * Controller de Empresas
 * Gerencia todas as ações relacionadas às Empresas
 * 
 * Criado por Bruno Medeiros
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;

class EmpresasController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Search.Prg', ['actions' => ['pesquisar']
        ]);
        $this->Auth->allow(['pesquisar', 'avaliar', 'view', 'destaques', 'anunciegratis', 'anuncie', 'adicionar']);
        $this->set('titulo', Configure::read('Vitrine.nome'));
    }
    
    public function isAuthorized($user) {
        //Permissão de Administrador
        if ($user['role'] == 1) {
            return true;
        }
        //Permissão de Usuário Logado
        $action = $this->request->getParam('action');
        if (in_array($action, ['meusanuncios', 'edit'])) {
            return true;
        }
        return false;
    }

    public function index() {
        //Somente para Administrador
        $this->set('title', 'Painel de Administrador');
        $this->viewBuilder()->setLayout('default-administrador');
        $empresas = $this->paginate($this->Empresas->find('all', ['contain' => ['Categorias', 'Bairros', 'Comentarios']]));
        $this->set(compact('empresas'));
    }

    public function alteraativa($id, $ativa) {
        //Somente para Administrador
        $this->set('title', 'Painel de Administrador');
        $this->viewBuilder()->setLayout('default-administrador');
        $empresa = $this->Empresas->get($id);
        if ($ativa == 1) {
            $empresa->ativa = '0';
        } else {
            $empresa->ativa = '1';
        }
        if ($this->Empresas->save($empresa)) {
            return $this->redirect(['action' => 'index']);
        }
    }

    public function alteradestaque($id, $destaque) {
        //Somente para Administrador
        $this->set('title', 'Painel de Administrador');
        $this->viewBuilder()->setLayout('default-administrador');
        $empresa = $this->Empresas->get($id);
        if ($destaque == 1) {
            $empresa->destaque = '0';
        } else {
            $empresa->destaque = '1';
        }
        if ($this->Empresas->save($empresa)) {
            return $this->redirect(['action' => 'index']);
        }
    }

    public function destaques() {
        $this->set('title', 'Empresas destaques em São José');
        $empresas = $this->Empresas->find('all', ['conditions' => ['destaque' => '1']], ['contain' => ['Categorias', 'Comentarios']]);
        $this->set(compact('empresas'));
    }

    public function view($id = null, $slug = null) {
        $empresa = $this->Empresas->get($id, [
            'contain' => ['Categorias', 'Bairros', 'Comentarios']
        ]);
        $visitas = $empresa->views + 1;
        $empresa->views = $visitas;
        $this->Empresas->save($empresa);
        $this->set('empresa', $empresa);
        $this->set('title', $empresa->nomeempresa . ' | ' . $empresa->bairro->nomeBairro . ', São José');
    }

    public function add() {
        $this->set('title', 'Painel de Administrador');
        $this->viewBuilder()->setLayout('default-administrador');
        $this->loadModel('Categorias');
        $empresa = $this->Empresas->newEntity();
        $categorias = $this->Empresas->Categorias->find('list', ['valueField' => 'nomecategoria', 'order' => 'nomecategoria ASC']);
        $bairros = $this->Empresas->Bairros->find('list', ['valueField' => 'nomeBairro', 'order' => 'nomeBairro ASC']);
        if ($this->request->is('post')) {
            $empresa = $this->Empresas->patchEntity($empresa, $this->request->getData());
            if ($this->Empresas->save($empresa)) {
                $id_categoria = $this->request->getData('categorias_id');
                $categoria = $this->Categorias->get($id_categoria);
                $categoria->quantidade = $categoria->quantidade + 1;
                $this->Categorias->save($categoria);
                $this->Flash->sucesso('O novo anúncio foi salvo com sucesso.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The empresa could not be saved. Please, try again.'));
        }
        $this->set(compact('empresa'));
        $this->set(compact('categorias'));
        $this->set(compact('bairros'));
    }

    public function anunciegratis() {
        $this->set('title', 'Anuncie grátis em São José');
        $this->viewBuilder()->setLayout('default-anuncie');
        $this->loadModel('Categorias');
        $empresa = $this->Empresas->newEntity();
        $categorias = $this->Empresas->Categorias->find('list', ['valueField' => 'nomecategoria', 'order' => 'nomecategoria ASC']);
        $bairros = $this->Empresas->Bairros->find('list', ['valueField' => 'nomeBairro', 'order' => 'nomeBairro ASC']);
        if ($this->request->is('post')) {
            $empresa = $this->Empresas->patchEntity($empresa, $this->request->getData());
            if ($this->Empresas->save($empresa)) {
                $id_categoria = $this->request->getData('categorias_id');
                $categoria = $this->Categorias->get($id_categoria);
                $categoria->quantidade = $categoria->quantidade + 1;
                $this->Categorias->save($categoria);
                $this->Flash->sucesso('Obrigado! Seu anúncio foi cadastrado com sucesso no Vitrine São José.');
                return $this->redirect(['controller' => 'pages', 'action' => 'home']);
            }
            $this->Flash->error(__('The empresa could not be saved. Please, try again.'));
        }
        $this->set(compact('empresa'));
        $this->set(compact('categorias'));
        $this->set(compact('bairros'));
    }

    public function edit($id = null, $slug = null) {
        $this->set('title', 'Editar Anúncio');
        $this->viewBuilder()->setLayout('default-central');
        $empresa = $this->Empresas->get($id, [
            'contain' => ['Categorias', 'Bairros']
        ]);
        if ($empresa->user_id <> $this->Auth->user('id')) {
            return $this->redirect(['controller' => 'pages', 'action' => 'home']);
        }
        $bairros = $this->Empresas->Bairros->find('list', ['valueField' => 'nomeBairro']);
        $categorias = $this->Empresas->Categorias->find('list', ['valueField' => 'nomecategoria']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $empresa->pagamento = $this->request->getData('dinheiro') . ':' . $this->request->getData('debito') . ':' . $this->request->getData('credito') . ':' .
                    $this->request->getData('cheque') . ':' . $this->request->getData('valimentacao') . ':' . $this->request->getData('vrefeicao');
            $empresa = $this->Empresas->patchEntity($empresa, $this->request->getData());
            if ($this->Empresas->save($empresa)) {
                $this->Flash->success(__('As alterações foram salvas com sucesso!'));
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('As alterações não foram salvas. Tente novamente.'));
        }
        $this->set(compact('empresa'));
        $this->set(compact('categorias'));
        $this->set(compact('bairros'));
    }

    public function editaradmin($id = null, $slug = null) {
        //Somente para Administrador
        $this->set('title', 'Editar Anúncio');
        $this->viewBuilder()->setLayout('default-administrador');
        if ($this->Auth->user('role') != '1') {
            return $this->redirect(['controller' => 'pages', 'action' => 'home']);
        }
        $empresa = $this->Empresas->get($id, [
            'contain' => ['Categorias', 'Bairros']
        ]);
        $bairros = $this->Empresas->Bairros->find('list', ['valueField' => 'nomeBairro']);
        $categorias = $this->Empresas->Categorias->find('list', ['valueField' => 'nomecategoria']);
        $users = $this->Empresas->Users->find('list', ['valueField' => 'email']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $empresa->pagamento = $this->request->getData('dinheiro') . ':' . $this->request->getData('debito') . ':' . $this->request->getData('credito') . ':' .
                    $this->request->getData('cheque') . ':' . $this->request->getData('valimentacao') . ':' . $this->request->getData('vrefeicao');
            $empresa = $this->Empresas->patchEntity($empresa, $this->request->getData());
            if ($this->Empresas->save($empresa)) {
                $this->Flash->success(__('As alterações foram salvas com sucesso!'));
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('As alterações não foram salvas. Tente novamente.'));
        }
        $this->set(compact('empresa'));
        $this->set(compact('categorias'));
        $this->set(compact('bairros'));
        $this->set(compact('users'));
    }

    public function delete($id = null) {
        //Somente para Administrador
        $this->request->allowMethod(['post', 'delete']);
        $empresa = $this->Empresas->get($id);
        if ($this->Empresas->delete($empresa)) {
            $this->Flash->success(__('The empresa has been deleted.'));
        } else {
            $this->Flash->error(__('The empresa could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function pesquisar() {
        if ($this->request->getQuery('q') != NULL) {
            $this->set('title', $this->request->getQuery('q') . ' em São José');
        } elseif ($this->request->getQuery('q') == NULL AND $this->request->getQuery('categoria') != NULL) {
            $this->set('title', $this->request->getQuery('categoria') . ' em São José');
        } elseif ($this->request->getQuery('q') == NULL AND $this->request->getQuery('bairro') != NULL) {
            $this->set('title', 'Busca em ' . $this->request->getQuery('bairro') . ', São José');
        }
        $query = $this->Empresas->find('search', ['search' => $this->request->getQueryParams()])
                ->contain(['Categorias', 'Bairros'])
                ->order('rating DESC')
                ->where(['nomeempresa IS NOT' => null, 'destaque' => '0']);

        $destaques = $this->Empresas->find('search', ['search' => $this->request->getQueryParams()])
                ->contain(['Categorias', 'Bairros'])
                ->order('rating DESC')
                ->where(['nomeempresa IS NOT' => null, 'destaque' => '1']);

        $this->set('empresas', $this->paginate($query, ['limit' => '10']));
        $this->set('destaques', $destaques);
        $this->set('totaldestaques', $destaques->count());
        $bairros = $this->Empresas->Bairros->find('all', ['order' => 'nomeBairro']);
        $categorias = $this->Empresas->Categorias->find('all', ['order' => 'nomecategoria']);
        $this->set('bairros', $bairros);
        $this->set('categorias', $categorias);
    }

    public function avaliar($id = null) {
        $this->loadModel('Comentarios');
        $empresa = $this->Empresas->get($id, [
            'contain' => ['Categorias', 'Bairros', 'Comentarios']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rating = $this->request->getData('rating');
            if ($empresa->ratingfirst == 0) {
                $empresa->rating = $rating;
                $empresa->ratingfirst = 1;
            } else {
                $media = ($empresa->rating + $rating) / 2;
                $empresa->rating = $media;
            }
            $this->Empresas->save($empresa);
            $comentario = $this->Comentarios->newEntity();
            $comentario->comentario = $this->request->getData('comentario');
            $comentario->autor = $this->request->getData('autor');
            $comentario->empresas_id = $id;
            $comentario->rating = $rating;
            $this->Comentarios->save($comentario);
            return $this->redirect(['action' => 'view', $id]);
        }
        $this->set(compact('empresa'));
    }

    public function meusanuncios() {
        $this->set('title', 'Meus Anúncios');
        $this->viewBuilder()->setLayout('default-central');
        $empresas = $this->Empresas->find('all', ['conditions' => ['user_id' => $this->Auth->user('id')], ['contain' => ['Categorias', 'Comentarios']]]);
        $this->set(compact('empresas'));
    }

    public function anuncie() {
        $this->set('title', 'Anuncie em São José');
        $this->viewBuilder()->setLayout('default-anuncie');
    }

    public function adicionar() {
        $this->set('title', 'Novo Anúncio');
        $this->viewBuilder()->setLayout('default-anuncie');
        $empresa = $this->Empresas->newEntity();
        $bairros = $this->Empresas->Bairros->find('list', ['valueField' => 'nomeBairro', 'order' => 'nomeBairro']);
        $categorias = $this->Empresas->Categorias->find('list', ['valueField' => 'nomecategoria', 'order' => 'nomecategoria']);
        foreach ($this->request->getParam('pass') as $cod):
            $user_id = $cod / 145890523;
        endforeach;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $empresa = $this->Empresas->patchEntity($empresa, $this->request->getData());
            $empresa->user_id = $user_id;
            $empresa->destaque = '1';
            if ($this->Empresas->save($empresa)) {
                return $this->redirect(['controller' => 'pages', 'action' => 'finalizacao']);
            }
            $this->Flash->error(__('The empresa could not be saved. Please, try again.'));
        }
        $this->set(compact('empresa'));
        $this->set(compact('categorias'));
        $this->set(compact('bairros'));
    }

}
