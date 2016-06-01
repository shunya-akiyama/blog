<?php
App::uses('AppModel','Model');
App::uses('AuthComponent','Controller/Component');
class User extends AppModel{
    public $belongsTo = array('Group');
    public $actsAs = array('Acl' => array('type' => 'requester'));

    public $validate = array(
        'username'=>array(
        'required'=>array(
        'rule' => 'notBlank'
        )
        ),
        'password'=>array(
        'required'=>array(
          'rule'=>'notBlank'
        )
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
          return array('Group'=>array('id' => $groupId));
        }
    }

    public function beforeSave($options = array()){
  		  if(isset($this->data[$this->alias]['password'])){
  			$this->data[$this->alias]['password']=AuthComponent::password(
  			$this->data[$this->alias]['password']);
  		  }
  		  return true;
  	}

}
 ?>
