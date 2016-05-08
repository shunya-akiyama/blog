<?php
  class CategoriesController extends AppController{
    public $helpers = array('Html','Form','Flash');
    public $components = array('Flash','Session');
		public $uses = array('Post','Category','PostsTag','User');

    public function add(){
			$this->set('posts',$this->Paginator->paginate());
	//カテゴリ検索
			$this->set('category',$this->Category->find('list',array('fields'=>array('id','category'))));
	//タグ検索
	    $this->set('tag',$this->Post->Tag->find('list',array('fields'=>array('id','tag'))));
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
