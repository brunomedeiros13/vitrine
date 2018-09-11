<?php

/*
 * Controller de Comentários
 * Gerencia as ações relacionadas as avaliações de cada anúncio
 * 
 * Criado por Bruno Medeiros
 */

namespace App\Controller;

use App\Controller\AppController;

class ComentariosController extends AppController {

    public function isAuthorized($user) {
        //Permissão de Administrador
        if ($user['role'] == 1) {
            return true;
        }
        return false;
    }

    public function avaliacoes($id) {
        //Somente para Administrador
        $this->set('title', 'Painel de Administrador');
        $this->viewBuilder()->layout('default-administrador');
        $this->loadModel('Empresas');
        $comentarios = $this->paginate($this->Comentarios->find('all', ['conditions' => ['empresas_id' => $id], 'contain' => ['Empresas']]));
        $empresa = $this->Empresas->get($id);
        $this->set('empresa', $empresa);
        $this->set(compact('comentarios'));
    }

    public function delete($id = null) {
        //Somente para Administrador
        $this->request->allowMethod(['post', 'delete']);
        $comentario = $this->Comentarios->get($id);
        if ($this->Comentarios->delete($comentario)) {
            $this->Flash->success(__('O comentário foi excluído com sucesso..'));
        } else {
            $this->Flash->error(__('O comentário não foi excluído. Por favor, tente novamente.'));
        }
        return $this->redirect($this->referer());
    }

}
