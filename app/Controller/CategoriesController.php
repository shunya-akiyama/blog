<?php
  class CategoriesController extends AppController{
    public $helpers = array('Html','Form','Flash');
    public $components = array('Flash','Session');
		public $uses = array('Post','Category','PostsTag','User');

    public function add(){
      if($this->request->is('post')){
        $this->Category->create();
        if($this->Category->save($this->request->data)){
          $this->Flash->success(__('カテゴリー追加完了'));
          return $this->redirect(array('controller'=>'users','action'=>'index'));
      }
    }
  }
}
 ?>
