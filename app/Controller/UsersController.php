<?php
App::uses('AppController','Controller');
class UsersController extends AppController{
  public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }
  public function add() {
      if ($this->request->is('post')) {
          $this->User->create();
          if ($this->User->save($this->request->data)) {
              $this->Flash->success(__('The user has been saved'));
              return $this->redirect(array('action' => 'index'));
          }
          $this->Flash->error(
              __('The user could not be saved. Please, try again.')
          );
      }
  }

}
 ?>
