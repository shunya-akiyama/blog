<?php
App::uses('AppController','Controller');
class UsersController extends AppController{
  public $components = array('Flash','Session');
/*
  public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add','logout');
    }
*/
  public function add() {
      if ($this->request->is('post')) {
          $this->User->create();
          if ($this->User->save($this->request->data)) {
              $this->Flash->success(__('The user has been saved'));
              return $this->redirect(array('controller'=>'users','action' => 'add'));
          }
          $this->Flash->error(
              __('The user could not be saved. Please, try again.')
          );
      }
  }
  public function index(){
    $this->User->recursive = 0;
    $this->set('Users', $this->paginate);
  }
  /*
  public function login(){
    if($this->request->is('post')){
      $this->redirect($this->Auth->redirect(array('controller'=>'posts','action' => 'index')));
    }else{
      $this->Flash->error(__('ログインできません。'));
    }
  }

  public function logout(){
    $this->redirect($this->Auth->logout());
  }
*/
}
 ?>
