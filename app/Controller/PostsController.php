<?php
class PostsController extends AppController{
  public $helpers = array('Html', 'Form','Flash');
  public $components = array('Flash','Session');
  public $uses = array('Category','Post','PostsTag');
  public $name = 'Posts';
  public $hasAndBelongsToMany = array('tag');
  /* 触るな!!!! */
  public function index(){
    $posts=$this->Post->PostsTag->find('all',array('recursive'=>2));
    $categories=$this->Post->Category->find('all');
    //$this->set('posts', $posts);
     $this->set(compact('posts','categories'));
}
  /* 触るな!!!! */
  public function view($id = null){
    if(!$id){
      throw new NotFoundException(__('ご覧になれません。'));
    }
    //$tag = $this->PostsTag->findById($id,null,null,1);
    $post = $this->Post->findById($id);
    if(!$post){
      throw new NotFoundException(__('ご覧になれません。'));
    }
    echo debug($post);
    $this->set('post', $post);
    //$this->set(compact($post,$tag));
    }


    /* 触るな!!!! */
  public function add(){
    if($this->request->is('post')){
      $this->Post->create();
      if($this->Post->saveAll($this->request->data)){
        $this->Flash->success(__('投稿完了'));
        return $this->redirect(array('action'=>'index'));
      }
    }
    //カテゴリ、タグの呼び出し
    $category = $this->set('categories',$this->Post->Category->find('list',array('fields'=>array('category'))));
    $tag = $this->set('tags',$this->Post->Tag->find('list',array('fields'=>array('tag'))));
    $this->set(compact('categories','tags'));
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
