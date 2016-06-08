<?php
class TagsController extends AppController{
  public $helpers = array('Html','Form','Flash');
  public $components = array('Flash','Session','Paginator');
  public $name = 'Tags';
  public $uses = array('Post','Category','Tag','PostsTag','User');
  public $paginate = array(
    'limit'=>5,
    'fields' => array('Tag.id', 'Tag.tag'),
    );
  public $hasAndBelongsToMany = array('post');


  public function beforefilter(){
    parent::beforefilter();
  }

  public function add(){
    if($this->request->is('post')){
      $this->Tag->create();
      if($this->Tag->save($this->request->data)){
        $this->Flash->success(__('Tag追加完了'));
        return $this->redirect(array('controller'=>'tags','action'=>'index'));
      }
    }
  }
  public function edit($id = null) {
    $tag = $this->Tag->findById($id);

    if($this->request->is(array('post', 'put'))){
      $this->Tag->id = $id;
    if($this->Tag->saveall($this->request->data)){
      $this->Flash->success(__('編集完了'));
      return $this->redirect(array('controller'=>'users','action'=>'index'));
    }
      $this->Flash->error(__('保存できませんでした。'));
    }
    if(!$this->request->data){
      $this->request->data = $tag;
    }
    }

  public function delete($id){
    if($this->request->is('get')){
      throw new MethodNotAllowedException();
    }
    if($this->Tag->delete($id)){
      $this->Flash->success(__('削除完了',h($id)));
    }else{
      $this->Flash->error(__('削除できませんでした。',h($id)));
    }
    return $this->redirect(array('controller'=>'users','action'=>'index'));
  }


  public function index(){
    $this->Paginator->settings = $this->paginate;
    $Tags = $this->Paginator->paginate('Tag');
    $this->set('tags',$Tags);
  }

}


 ?>
