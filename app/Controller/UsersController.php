<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController {
		public $name = 'Users';
		public $uses = array('Post','User','Group','Attachment','Category','PostsTag');
		public $components = array('Flash','Session','Paginator','Search.Prg'=>array(
				'commonProcess'=>array('paramType'=>'querystring','filterEmpty'=>true,)));
		public $paginate = array('maxLimit'=>5);

		public function beforefilter(){
			parent::beforefilter();
			$this->Auth->allow('login','index','logout');

		}
/*
public function beforefilter(){
parent::beforefilter();
$this->Auth->allow('initDB');
}

public function initDB(){
$group = $this->User->Group;
$group->id = 1;
$this->Acl->allow($group,'controllers');

$group->id = 2;
$this->Acl->deny($group,'controllers');
$this->Acl->allow($group,'controllers/Users');
$this->Acl->allow($group,'controllers/Tags');
$this->Acl->allow($group,'controllers/Categories');
$this->Acl->allow($group,'controllers/Posts');

$group->id = 3;
$this->Acl->deny($group,'controllers');
echo "all done";
exit;
}
*/
    public function index(){
			$this->Paginator->settings = $this->paginate;
      	//$posts = $this->Paginator->paginate('Post');
      $this->paginate = array('Post',array(
				'conditions'=>array(),
				'limit'=>10,
			));
			$this->set('posts',$this->Paginator->paginate('Post'));
		}
/*
		public function index() {
				$this->Post->recursive=2;
				$this->Paginator->settings = $this->paginate;
				$posts = $this->Paginator->paginate('Post');
				$this->set('posts',$this->Paginator->paginate('Post'));
		}
*/
		public function userlist() {
			$this->User->recursive = 0;
			$this->set('users', $this->Paginator->paginate('User'));
		}

		public function login(){
	  	if($this->Session->read('Auth.User')){
				$this->Session->setFlash('ログイン中');
				$this->redirect('/',null,false);
			}
			if($this->request->is('post')){
				$this->User->set($this->request->data);
				$this->User->validates();
			if($this->Auth->login()){
				return $this->redirect($this->Auth->redirect());
			}
				$this->Session->setFlash(__('Your username or password was incorrect.'));
			}
		}

		public function view($id = null) {
		  if(!$this->User->exists($id)) {
			  throw new NotFoundException(__('Invalid user'));
		  }
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->set('user', $this->User->find('first', $options));
		}

		public function add() {
			if($this->request->is('post')) {
			  $this->User->create();
			if($this->User->save($this->request->data)) {
  			$this->Flash->success(__('The user has been saved.'));
	  		return $this->redirect(array('action' => 'index'));
			}else{
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
				}
			}
			$groups = $this->User->Group->find('list');
			$this->set(compact('groups'));
		}


		public function edit($id = null) {
		  if(!$this->User->exists($id)) {
			  throw new NotFoundException(__('Invalid user'));
		  }
			if($this->request->is(array('post', 'put'))) {
			if($this->User->save($this->request->data)) {
		  	$this->Flash->success(__('The user has been saved.'));
	  		return $this->redirect(array('action' => 'index'));
			}else{
  			$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
   		}else{
				$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
				$this->request->data = $this->User->find('first', $options);
			}
			$groups = $this->User->Group->find('list');
			$this->set(compact('groups'));
		}

		public function delete($id = null){
			$this->User->id = $id;
			if(!$this->User->exists()){
				throw new NotFoundException(__('Invalid user'));
			}
		  $this->request->allowMethod('post', 'delete');
			if($this->User->delete()){
				$this->Flash->success(__('The user has been deleted.'));
			}else{
				$this->Flash->error(__('The user could not be deleted. Please, try again.'));
			}
		  return $this->redirect(array('action' => 'index'));
		}

		public function logout(){
		  $this->Session->setFlash('goodbye');
			$this->redirect($this->Auth->logout());
	  }
}
