<?php
class TagsController extends AppController{
  public $helpers = array('Html','Form','Flash');
  public $components = array('Flash','Session');
  public $name = 'Tags';
  public $hasAndBelongsToMany = array('post');
	public $uses = array('Post','Category','Tag','PostsTag','User');

  public function add(){
    if($this->request->is('post')){
      $this->Tag->create();
      if($this->Tag->save($this->request->data)){
        $this->Flash->success(__('Tag追加完了'));
        return $this->redirect(array('controller'=>'users','action'=>'index'));
      }
    }
  }

  public function index(){
    $tags = $this->Tag->find('all',array('recursive'=> 2));
    $this->set('tags', $tags);

  }

}


 ?>
