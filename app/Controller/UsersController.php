<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController{
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('add', 'logout');
	}

public function login(){
	if($this->request->is('post')){
		if($this->Auth->login()){
			$this->redirect($this->Auth->redirect());
		}else{
			$this->Flash->error(__('無効なログイン情報です。'));
		}
	}
}
public function logout(){
	$this->redirect($this->Auth->logout());
}
	public function index(){
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	public function view($id = null){
		$this->User->id = $id;
		if(!$this->User->exists()){
			throw new NotFoundException(__('そのユーザーはいません'));
		}
		$this->set('user', $this->User->findById($id));
	}
	public function add(){
		if($this->request->is('post')){
			$this->User->create();
			if($this->User->save($this->request->data)){
				$this->Flash->success(__('ユーザー登録完了'));
				return $this->redirect(array('action'=>'index'));
			}
			$this->Flash->error(__('登録できませんでした.'));
		}
	}
	public function edit($id = null){
		$this->User->id = $id;
    if(!$this->User->exists()){
			throw new NotFoundException(__('そのユーザーはいません'));
		}
		if($this->request->is('post') || $this->request->is('put')){
			if($this->User->save($this->request->data)){
				$this->Flash->success(__('保存完了'));
				return $this->redirect(array('action'=>'index'));
			}
			$this->Flash->error(__('保存失敗'));
		}else{
			$this->request->data = $this->User->findById($id);
			unset($this->request->data['User']['password']);
		}
	}
	public function delete($id = null){
		$this->request->allowMethod('post');
		$this->User->id = $id;
    if(!$this->User->exists()){
			throw new NotFoundException(__('そのユーザーはいません'));
		}
		if($this->User->delete()){
			$this->Flash->success(__('削除完了'));
			return $this->redirect(array('action'=>'index'));
		}
		$this->Flash->error(__('削除できませんでした。'));
		return $this->redirect(array('action'=>'index'));
	}
}
 ?>
