<?php
class PostsController extends AppController{
  public $helpers = array('Html','Form','Flash');
public $components = array('Flash');
	public function index(){
		$this->set('posts', $this->Post->find('all'));
	}
  public function view($id = null){
    if(!$id){
			throw new NotFoundException(__('InvaildPost'));
		}
	$post = $this->Post->findById($id);
	if (!$post){
		throw new NotFoundException(__('InvaildPost'));
	}
	$this->set('post',$post);
	}
public function add(){
	if($this->request->is('post')){
    $this->request->data['Post']['user_id'] = $this->Auth->user('id');
		$this->Post->create();
		if($this->Post->save($this->request->data)){
			$this->Flash->success(__('投稿完了'));
			return $this->redirect(array('action'=>'index'));
		}
		$this->Flash->error(__('投稿失敗'));
	}
}

public function isAuthorized($user){
  if($this->action === 'add'){
    return true;
  }
  if(in_array($this->action, array('edit','delete'))){
    $postId = (int) $this->request->params['pass'][0];
    if($this->Post->isOwnedBy($postId, $user['id'])){
      return true;
    }
  }
  return parent::isAuthorized($user);
}

public function edit($id = null){
  if(!$id){
    throw new NotFoundException(__('InvaildPost'));
  }
  $post = $this->Post->findById($id);
  if(!$post){
    throw new NotFoundException(__('InvaildPost'));
  }
  if($this->request->is(array('post', 'put'))){
    $this->Post->id = $id;
    if($this->Post->save($this->request->data)){
      $this->Flash->success(__('編集完了'));
      return $this->redirect(array('action'=>'index'));
    }
    $this->Flash->error(__('投稿失敗'));
  }
  if(!$this->request->data){
    $this->request->data = $post;
  }
}
public function delete($id){
  if($this->request->is('get')){
    throw new MethodNotAllowedException();
  }
  if($this->Post->delete($id)){
    $this->Flash->success(__('削除完了',h($id)));
  }else{
    $this->Flash->error(__('削除失敗',h($id)));
  }
  return $this->redirect(array('action'=>'index'));
}
}
