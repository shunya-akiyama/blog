<?php
  class CategoriesController extends AppController{
    public $name = 'Categories';
    public $helpers = array('Html','Form','Flash');
    public $components = array('Flash','Session','Paginator');
		public $uses = array('Post','Category','PostsTag','User');
    public $paginate = array(
      'limit'=>10,
      'fields' => array('Category.id', 'Category.category'),
      );

    public function beforefilter(){
      parent::beforefilter();
    }

      public function index(){
//      $categories = $this->Category->find('all');
//      $this->set('categories', $categories);
//$this->Category->recursive = 2;
$this->Paginator->settings = $this->paginate;
$categories = $this->Paginator->paginate('Category');
$this->set('categories',$categories);
//$category = $this->Category->findById($id);
    }

    public function edit($id = null) {
      $category = $this->Category->findById($id);

      if($this->request->is(array('post', 'put'))){
        $this->Category->id = $id;
      if($this->Category->saveall($this->request->data)){
        $this->Flash->success(__('編集完了'));
        return $this->redirect(array('controller'=>'users','action'=>'index'));
      }
        $this->Flash->error(__('保存できませんでした。'));
      }
      if(!$this->request->data){
        $this->request->data = $category;
      }
      }

    public function delete($id){
      if($this->request->is('get')){
        throw new MethodNotAllowedException();
      }
      if($this->Category->delete($id)){
        $this->Flash->success(__('削除完了',h($id)));
      }else{
        $this->Flash->error(__('削除できませんでした。',h($id)));
      }
      return $this->redirect(array('controller'=>'users','action'=>'index'));
    }

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
