<?php

App::uses('AppController', 'Controller');

class CategoriesController extends AppController
{
    public $components = ['RequestHandler', 'Paginator', 'Session', 'Flash'];
    public $helpers = array("Form", "Html");

    public function index()
    {
        $this->set('title', 'Listar Categorias');
        $categories = $this->Category->find('all');

        $this->set([
            'categories' => $categories,
            '_serialize' => ['categories']
        ]);
    }

    public function view($id)
    {
        $category = $this->Category->findById($id);
        $this->set([
            'category' => $category,
            '_serialize' => ['category']
        ]);
    }

    public function add()
    {
        $this->set('title', 'Adicionar categoria');

        if ($this->request->is("post")) {

            $this->Category->create();

            if ($this->Category->saveAssociated($this->request->data)) {
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
        $this->set("title", "Editar Categoria");

        $this->Category->id = $id;

        if (!$this->Category->exists()) {
            throw new NotFoundException(__('Registro não encontrado.'));
        }

        if ($this->request->is('category') || $this->request->is('put')) {

            if ($this->Category->saveAssociated($this->request->data)) {
                $this->Flash->success(__('Registro salvo com sucesso.'));
                $this->redirect(array('action' => '/'));
            } else {
                $this->Flash->error(__('Erro: não foi possível salvar o registro.'));
            }
        } else {
            $this->request->data = $this->Category->read(NULL, $id);
        }
    }

    public function delete($id = NULL)
    {
        if (!$this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        $this->Category->id = $id;

        if (!$this->Category->exists()) {
            throw new NotFoundException(__('Registro não encontrado.'));
        }

        if ($this->Category->delete()) {
            $this->Flash->error(__('Registro excluído com sucesso.'));
            $this->redirect(array('action' => '/'));
        }
        $this->Flash->error(__('Erro: não foi possível excluir o registro.'));

        $this->redirect(array('action' => '/'));
    }
}
