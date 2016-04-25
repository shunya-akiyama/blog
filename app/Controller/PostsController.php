<?php
class PostsController extends AppController{
  public $helpers = array('Html', 'Form','Flash');
  public $components = array('Flash','Session');
  public $uses = array('Category','Post');

  /* 触るな!!!! */
  public function index(){
    $this->set('posts', $this->Post->find('all'));
echo debug($this->Post->find('all'));
  }

  /* 触るな!!!! */
  public function view($id = null){
    if(!$id){
      throw new NotFoundException(__('ご覧になれません。'));
    }
    $post = $this->Post->findById($id);
    if(!$post){
      throw new NotFoundException(__('ご覧になれません。'));
    }
    $this->set('post', $post);
    echo debug($this->Post->find('all'));
  }


    /* 触るな!!!! */
  public function add(){
    $this->set('categories',$this->Post->Category->find('list',array('fields'=>array('category'))));
    if($this->request->is('post')){
      $this->Post->create();
      if($this->Post->saveAll($this->request->data)){
        $this->Flash->success(__('投稿完了'));
        return $this->redirect(array('action'=>'index'));
      }
    }
  }

  public function edit($id = null){
    if(!$id){
      throw new NotFoundException(__('ご覧になれません。'));
    }
    $post = $this->Post->findById($id);
    if(!$post){
      throw new NotFoundException(__('ご覧になれません。'));
    }
    if($this->request->is(array('post', 'put'))){
      $this->Post->id = $id;
      if($this->Post->saveAll($this->request->data)){
        $this->Flash->success(__('編集完了'));
        return $this->redirect(array('action'=>'index'));
      }
      $this->Flash->error(__('保存できませんでした。'));
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
      $this->Flash->error(__('削除できませんでした。',h($id)));
    }
    return $this->redirect(array('action'=>'index'));
    }
}
?>
