<?php
App::uses('AppController','Controller');
class UsersController extends AppController{
  public $components = array('Flash','Session','Auth','Paginator');
	public $paginate = array('maxLimit'=>5);

  public function beforeFilter() {
		parent::beforeFilter();
        $this->Auth->allow('logout');
    }

	public function index(){
		$this->User->recursive=0;
    $this->set('users', $this->paginate());
		$this->loadModel('Post');
		$this->Post->recursive = 2;
    $this->Paginator->settings = $this->paginate;
		$posts = $this->Paginator->paginate('Post');
		$this->set('posts',$posts);
  }

  public function add() {
      if ($this->request->is('post')) {
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
    if($this->request->is('post')){
			if($this->Auth->login()){
				$this->redirect($this->Auth->redirect());
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
