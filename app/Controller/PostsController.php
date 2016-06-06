<?php
App::uses('AppController','Controller');
class PostsController extends AppController{
    public $name = 'Posts';
    public $uses = array('Post','Attachment','Category','PostsTag');
    public $helpers = array('Html', 'Form','Flash');
    public $presetVars = true;
    public $hasAndBelongsToMany = array('tag');
  	public $components = array('Flash','Session','Paginator','Search.Prg'=>array(
        'commonProcess'=>array('paramType'=>'querystring','filterEmpty'=>true,)));
  	public $paginate = array('maxLimit'=>5);

  	public function beforeFilter() {
      parent::beforeFilter();
      $this->Auth->allow('index','view','find');
    }

    public function index($id=null){
  		$this->Post->recursive = 2;
      $this->Paginator->settings = $this->paginate;
  		$posts = $this->Paginator->paginate('Post');
  		$this->set('posts',$posts);
      $post = $this->Post->findById($id);
      $img=$this->Attachment->find('count',array('conditions'=>array('Attachment.post_id'=>$id,'NOT'=>array('Attachment.dir'=>'null'))));
      $this->set('img',$img);
  //タイトル検索
  		$this->Prg->commonProcess();
  	  $this->Paginator->settings['conditions']=$this->Post->parseCriteria($this->Prg->parsedParams());
    }


    public function find(){
  		$this->Post->recursive = 2;
      $this->Paginator->settings = $this->paginate;
  		$posts = $this->Paginator->paginate('Post');
  		$this->set('posts',$posts);
  //タイトル検索
  		$this->Prg->commonProcess();
  	  $this->Paginator->settings['conditions']=$this->Post->parseCriteria($this->Prg->parsedParams());
  		$this->set('posts',$this->Paginator->paginate());
  	}

    public function view($id = null){
      if(!$id){
        throw new NotFoundException(__('ご覧になれません。'));
      }
      $post = $this->Post->findById($id);
      $img=$this->Attachment->find('count',array('conditions'=>array('Attachment.post_id'=>$id,'NOT'=>array('Attachment.dir'=>'null'))));
      $this->set('img',$img);
      if(!$post){
        throw new NotFoundException(__('ご覧になれません。'));
      }
      $this->set('post', $post);
    }


    public function add(){
      if($this->request->is('post')){
        $this->Post->create();
        $flg = 0;
      foreach($this->request->data['Image'] as $img){
        if($img['attachment']['tmp_name']) $flg = 1;
      }
        $i = 0;
      foreach($this->request->data['Image'] as $img){
        $this->request->data['Image'][$i]['attachment']['tmp_flg'] = $flg;
        $i ++;
      }
      $data = $this->request->data;
      if($this->Post->saveAll($data)){
        $this->Flash->success(__('投稿完了'));
        return $this->redirect(array('controller'=>'users','action'=>'index'));
      }
      }
      //カテゴリ、タグの呼び出し
      $category = $this->set('categories',$this->Post->Category->find('list',array('fields'=>array('category'))));
      $tag = $this->set('tags',$this->Post->Tag->find('list',array('fields'=>array('tag'))));
      $this->set(compact('categories','tags'));
    }

    public function edit($id = null){
      $category = $this->set('categories',$this->Post->Category->find('list',array('fields'=>array('category'))));
      $tag = $this->set('tags',$this->Post->Tag->find('list',array('fields'=>array('tag'))));
      $this->set(compact('categories','tags'));
      $post = $this->Post->findById($id);
      $this->set('post',$post);
      if(!$id){
        throw new NotFoundException(__('ご覧になれません。'));
      }
      $post = $this->Post->findById($id);
      if(!$post){
        throw new NotFoundException(__('ご覧になれません。'));
      }
      if($this->request->is(array('post', 'put'))){
        $this->Post->id = $id;
        $flg = 1;
      foreach($this->request->data['Image'] as $img){
        if($img['attachment']['tmp_name']) $flg = 1;
      }
      $i = 0;
      foreach($this->request->data['Image'] as $img){
        $this->request->data['Image'][$i]['attachment']['tmp_flg'] = $flg;
        $i ++;
      }
      if($this->Post->saveall($this->request->data)){
        $this->Flash->success(__('編集完了'));
        return $this->redirect(array('controller'=>'users','action'=>'index'));
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
      return $this->redirect(array('controller'=>'users','action'=>'index'));
    }
}
?>
