<?php
App::uses('AppController', 'Controller');
class GroupsController extends AppController {
		public $components = array('Paginator','Flash');
		public $name = 'Groups';
    public $uses = array('Post','Group','Attachment','Category','PostsTag');
		public function beforefilter(){
				parent::beforefilter();
		}

		public function index() {
			$this->Group->recursive = 0;
			$this->Paginator->settings = $this->paginate;
  		$groups = $this->Paginator->paginate('Group');
  		$this->set('groups',$groups);
//      $post = $this->Post->findById($id);

//				$this->set('groups', $this->Paginator->paginate());
		}

		public function view($id = null) {
				if(!$this->Group->exists($id)){
    				throw new NotFoundException(__('Invalid group'));
				}
				$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
				$this->set('group', $this->Group->find('first', $options));
				$category = $this->set('categories',$this->Post->Category->find('list',array('fields'=>array('category'))));
	      $tag = $this->set('tags',$this->Post->Tag->find('list',array('fields'=>array('tag'))));
		}

		public function add() {
				if($this->request->is('post')) {
					$this->Group->create();
					if($this->Group->save($this->request->data)) {
					  	$this->Flash->success(__('The group has been saved.'));
						  return $this->redirect(array('action' => 'index'));
					}else{
						  $this->Flash->error(__('The group could not be saved. Please, try again.'));
					}
				}
		}

		public function edit($id = null) {
				if(!$this->Group->exists($id)) {
  					throw new NotFoundException(__('Invalid group'));
				}
				if($this->request->is(array('post', 'put'))) {
					  if($this->Group->save($this->request->data)) {
						$this->Flash->success(__('The group has been saved.'));
						return $this->redirect(array('action' => 'index'));
					} else {
						$this->Flash->error(__('The group could not be saved. Please, try again.'));
					}
				} else {
					$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
					$this->request->data = $this->Group->find('first', $options);
				}
		}

		public function delete($id = null) {
			$this->Group->id = $id;
			if (!$this->Group->exists()) {
				throw new NotFoundException(__('Invalid group'));
			}
			$this->request->allowMethod('post', 'delete');
			if ($this->Group->delete()) {
				$this->Flash->success(__('The group has been deleted.'));
			} else {
				$this->Flash->error(__('The group could not be deleted. Please, try again.'));
			}
			return $this->redirect(array('action' => 'index'));
		}
}
