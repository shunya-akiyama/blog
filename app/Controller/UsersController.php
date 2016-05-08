<?php
App::uses('AppController','Controller');
class UsersController extends AppController{
  public $components = array('Flash','Session','Auth','Paginator',
	'Search.Prg'=>array(
		'commonProcess'=>array(
			'paramType'=>'querystring',
			'filterEmpty'=>true,
			)
		)
	);

	public $paginate = array('maxLimit'=>5);
	public $uses = array('Post','Category','PostsTag','User');
  public function beforeFilter() {
		parent::beforeFilter();
        $this->Auth->allow('logout','find','login');
    }

	public function index(){
		$this->User->recursive=0;
    $this->set('users',$this->paginate());
		$this->loadModel('Post');
		$this->Post->recursive=2;
    $this->Paginator->settings = $this->paginate;
		$posts = $this->Paginator->paginate('Post');
		$this->set('posts',$posts);
//タイトル検索
		$this->Prg->commonProcess();
	  $this->Paginator->settings['conditions']=$this->Post->parseCriteria($this->Prg->parsedParams());
		$this->set('posts',$this->Paginator->paginate());
//カテゴリ検索
		$this->set('category',$this->Category->find('list',array('fields'=>array('id','category'))));
//タグ検索
    $this->set('tag',$this->Post->Tag->find('list',array('fields'=>array('id','tag'))));

	}

  public function add() {
		//タイトル検索
				$this->set('posts',$this->Paginator->paginate());
		//カテゴリ検索
				$this->set('category',$this->Category->find('list',array('fields'=>array('id','category'))));
		//タグ検索
		    $this->set('tag',$this->Post->Tag->find('list',array('fields'=>array('id','tag'))));
      if ($this->request->is('post')){
          $this->User->create();
          if ($this->User->save($this->request->data)){
          		$this->Flash->success(__('The user has been saved'));
              $this->redirect(array('action'=>'index'));
          }
          $this->Flash->error(
              __('The user could not be saved. Please, try again.')
          );
      }
  }
	public function login(){
		//タイトル検索
				$this->set('posts',$this->Paginator->paginate());
		//カテゴリ検索
				$this->set('category',$this->Category->find('list',array('fields'=>array('id','category'))));
		//タグ検索
		    $this->set('tag',$this->Post->Tag->find('list',array('fields'=>array('id','tag'))));

    if($this->request->is('post')){
			if($this->Auth->login()){
				$this->redirect($this->Auth->redirect(array('action'=>'index')));
			}else{
				$this->Flash->error(__('ログイン失敗'));
      }
		}
 }



  public function logout(){
		$this->redirect($this->Auth->logout());
  }

}
?>
