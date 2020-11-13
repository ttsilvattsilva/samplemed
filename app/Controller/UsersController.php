<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController
{
    public $components = ['RequestHandler', 'Paginator', 'Session', 'Flash'];
    public $helpers = array("Form", "Html");

    public function index()
    {
        $this->set('title', 'Listar Users');
        $users = $this->User->find('all');

        $this->set([
            'users' => $users,
            '_serialize' => ['users']
        ]);
    }

    public function view($id)
    {
        $user = $this->User->findById($id);
        $this->set([
            'user' => $user,
            '_serialize' => ['user']
        ]);
    }

    public function add()
    {
        $this->set('title', 'Adicionar usuário');

        if ($this->request->is("post")) {

            $this->User->create();

            if ($this->User->saveAssociated($this->request->data)) {
                $this->Flash->success(__('Registro add com sucesso.'));
                $this->redirect(["action" => '/']);
            } else {
                $this->Flash->error(__('Erro: não foi possível add o registro.'));
                $this->redirect(["action" => '/add']);
            }
        }
    }

    public function edit($id = NULL)
    {
        $this->set("title", "Editar Usuário");

        $this->User->id = $id;

        if (!$this->User->exists()) {
            throw new NotFoundException(__('Registro não encontrado.'));
        }

        if ($this->request->is('user') || $this->request->is('put')) {


            if ($this->User->saveAssociated($this->request->data)) {
                $this->Flash->success(__('Registro salvo com sucesso.'));
                $this->redirect(array('action' => '/'));
            } else {
                $this->Flash->error(__('Erro: não foi possível salvar o registro.'));
            }
        } else {
            $this->request->data = $this->User->read(NULL, $id);
        }
    }

    public function delete($id = NULL)
    {
        if (!$this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;

        if (!$this->User->exists()) {
            throw new NotFoundException(__('Registro não encontrado.'));
        }

        if ($this->User->delete()) {
            $this->Flash->error(__('Registro excluído com sucesso.'));
            $this->redirect(array('action' => '/'));
        }
        $this->Flash->error(__('Erro: não foi possível excluir o registro.'));

        $this->redirect(array('action' => '/'));
    }
}
