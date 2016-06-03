<?php
App::uses('AppModel', 'Model');
class User extends AppModel {
    public $belongsTo = array('Group',);
    public $actsAs = array('Acl'=>array('type'=>'requester'));

    public function beforeSave($options = array()){
      $this->data['User']['password'] = AuthComponent::password(
      $this->data['User']['password']
      );
    return true;
    }

  	public $validate = array(
  		'username' => array(
				'rule' => 'notBlank',
				'message' => '入力してください',
        'required' => 'false',
				'allowEmpty' => 'true',
  		),
  		'password' => array(
				'rule' => 'notBlank',
        'message' => '入力してください',
        'required' => 'false',
				'allowEmpty' => 'true',
  		),
  		'group_id' => array(
  			'numeric' => array(
  			'rule' => array('numeric'),
  			),
  		),
  	);

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
