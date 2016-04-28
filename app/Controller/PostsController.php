<?php
class PostsController extends AppController{
  public $name = 'Posts';
  public $uses = array('Post','Category','PostsTag');
  public $helpers = array('Html', 'Form','Flash');
  public $components = array('Flash','Session','Search.Prg');
  public $presetVars = true;
  public $hasAndBelongsToMany = array('tag');
  /* 触るな!!!! */
/*
  public function index(){
    $posts=$this->Post->PostsTag->find('all',array('recursive'=>2));
    $categories=$this->Post->Category->find('all');
    //$this->set('posts', $posts);
     $this->set(compact('posts','categories'));
  }
*/
/*
public function beforeFilter(){
  $this->presetVars = $this->Post->presetVars;
  $pager_numbers = array(
    'before'=>' - ',
    'after'=>' - ',
    'modules'=>'5',
    'separator'=>' ',
    'class'=>'pagenumbers',
  );
  $this->set('pager_numbers',$pager_numbers);
}
*/
  public function index(){
    $this->Prg->commonProcess();
    $this->paginate = array(
      'Post'=>array(
        'conditions'=>array(
          $this->Post->parseCriteria($this->passedArgs)
        )
      )
    );
    $this->set('posts',$this->Paginator->paginate());
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
    //echo debug($post);
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
