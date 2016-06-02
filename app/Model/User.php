<?php
App::uses('AppModel', 'Model');
class User extends AppModel {

  public function beforeSave($options = array()){
    $this->data['User']['password'] = AuthComponent::password(
    $this->data['User']['password']
  );
  return true;
  }

	public $validate = array(
		'username' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	public $belongsTo = array('Group',);
  public $actsAs = array('Acl'=>array('type'=>'requester'));
  public function parentNode(){
    if(!$this->id && empty($this->data)){
      return null;
    }
    if(isset($this->data['User']['group_id'])){
      $groupId = $this->data['User']['group_id'];
    }else{
      $groupId = $this->field('group_id');
    }
    if(!$groupId){
      return null;
    }else{
      return array('Group'=>array('id'=>$groupId));
    }
  }
}
