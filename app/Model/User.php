<?php
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 * @property Post $Post
 */

class User extends AppModel {
	public $belongsTo = array('Group');

	public $actsAs = array('Acl' => array('type' => 'requester', 'enabled' => false));

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
			return array('Group' => array('id' => $groupId));
		}
	}

	public function bindNode($user){
    return array('model' => 'Group', 'foreign_Key' => $user['User']['group_id']);
	}
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	public function beforeSave($options = array()){
 	 $this->data['User']['password'] = AuthComponent::password(
 	 $this->data['User']['password']
  );
  return true;
  }
}
