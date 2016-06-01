<?php
App::uses('AppController','Controller');
class UsersController extends AppController{
    public $components = array('Flash','Session','Auth','Paginator',
    	  'Search.Prg'=>array(
    		'commonProcess'=>array('paramType'=>'querystring','filterEmpty'=>true,)));
    public $paginate = array('maxLimit'=>5);
	  public $uses = array('Post','Group','Category','PostsTag','User');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('initDB');
//        $this->Auth->allow('logout','find','login','add');
    }
    public function initDB(){
        $group = $this->User->Group;
        $group->id = 1;
        $this->Acl->allow($group, 'controllers');

        $group->id = 2;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers/Posts');
        $this->Acl->allow($group, 'controllers/Categories');

        $group->id = 3;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers/Posts/add');
        $this->Acl->allow($group, 'controllers/Posts/edit');
        echo "all done";
        exit;
    }

  	public function index(){
    		$this->User->recursive=0;
        $this->set('users',$this->paginate());
    		$this->loadModel('Post');
    		$this->Post->recursive=2;
        $this->Paginator->settings = $this->paginate;
    		$posts = $this->Paginator->paginate('Post');
    		$this->set('posts',$posts);
  	}

    public function add() {
      $this->set('group',$this->Group->find('list',array('fields'=>array('id','name'))));
        if ($this->request->is('post')){
            $this->User->create();
        if ($this->User->save($this->request->data)){
        		$this->Flash->success(__('The user has been saved'));
            $this->redirect(array('action'=>'index'));
        }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
    }

  	public function login(){
        if($this->Session->read('Auth.User')){
          $this->Session->setFlash('ログイン中');
          $this->redirect('/',null,false);
        }
        if($this->request->is('post')){
    		if($this->Auth->login()){
    				$this->redirect($this->Auth->redirect(array('action'=>'index')));
    		}else{
    				$this->Flash->error(__('ログイン失敗'));
        }
    		}
    }



    public function logout(){
        $this->Session->setFlash('Good-Bye');
        $this->redirect($this->Auth->logout());
    }

}
?>
