<?php

App::uses('AppController', 'Controller');

class PostsController extends AppController
{
    public $components = ['RequestHandler', 'Flash'];
    public $helpers = array("Form", "Html");

    public function index()
    {
        $this->set('title', 'Listar Posts');
        $posts = $this->Post->find('all');

        $this->loadModel('UserModel');
        $users = $this->UserModel->find('list', ['fields' => ['id', 'full_name']]);

        $this->set([
            'posts' => $posts,
            'users' => $users,
            '_serialize' => ['posts']
        ]);
    }

    public function view($id)
    {
        $post = $this->Post->findById($id);
        $this->set([
            'post' => $post,
            '_serialize' => ['post']
        ]);
    }

    public function add()
    {
        $this->loadModel('UserModel');
        $this->set('users', $this->UserModel->find('list', ['fields' => ['id', 'full_name']]));

        $this->loadModel('CategoryModel');
        $this->set('categories', $this->CategoryModel->find('list', ['fields' => ['id', 'name']]));

        $this->set('title', 'Adicionar Post');

        if ($this->request->is("post")) {

            $categoryId = $this->request->data['Post']['category_id'];
            unset($this->request->data['Post']['category_id']);

            $this->Post->create();
            if ($this->Post->saveAssociated($this->request->data)) {

                if ($categoryId) {
                    $this->loadModel('PostCategoryModel');
                    $data = ['category_id' => $categoryId, 'post_id' => $this->Post->id];
                    $this->PostCategoryModel->save($data);
                }

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
        $currentCategoryId = "";
        $this->set("title", "Editar Post");

        $result = $this->Post->find('first', ['conditions' => ['id' => $id]]);
        $this->set('authorId', $result['Post']['user_id']);

        $this->loadModel('UserModel');
        $this->set('users', $this->UserModel->find('list', ['fields' => ['id', 'full_name']]));

        $this->loadModel('CategoryModel');
        $this->set('categories', $this->CategoryModel->find('list', ['fields' => ['id', 'name']]));

        $this->Post->id = $id;

        $this->loadModel('PostCategoryModel');
        $currentPostCategory = $this->PostCategoryModel->find('first', ['conditions' => ['post_id' => $id]]);

        if ($currentPostCategory) {
            $currentCategoryId = $currentPostCategory['PostCategoryModel']['category_id'];
        }

        $this->set('currentCategoryId', $currentCategoryId);

        if (!$this->Post->exists()) {
            throw new NotFoundException(__('Registro não encontrado.'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {

            $categoryId = $this->request->data['Post']['category_id'];
            unset($this->request->data['Post']['category_id']);

            if ($this->Post->saveAssociated($this->request->data)) {
                if (is_array($currentPostCategory)) {
                    if (!empty($categoryId) && ($categoryId != $currentCategoryId)) {
                        $this->PostCategoryModel->save(['category_id' => $currentCategoryId]);
                    }
                }
                $this->Flash->success(__('Registro salvo com sucesso.'));
                $this->redirect(array('action' => '/'));
            } else {
                $this->Flash->error(__('Erro: não foi possível salvar o registro.'));
            }
        } else {
            $this->request->data = $this->Post->read(NULL, $id);
        }
    }

    public function delete($id = NULL)
    {
        if (!$this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        $this->Post->id = $id;

        if (!$this->Post->exists()) {
            throw new NotFoundException(__('Registro não encontrado.'));
        }

        if ($this->Post->delete()) {
            $this->Flash->error(__('Registro excluído com sucesso.'));
            $this->redirect(array('action' => '/'));
        }
        $this->Flash->error(__('Erro: não foi possível excluir o registro.'));

        $this->redirect(array('action' => '/'));
    }
}
