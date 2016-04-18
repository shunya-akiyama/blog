<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
class User extends AppModel{
	public $validate = array(
		'username'=>array(
			'required'=>array(
				'rule'=>'notBlank',
				'message'=>'管理者名'
			)
		),
		'password'=>array(
			'required'=>array(
				'rule'=>'notBlank',
				'message'=>'パスワード'
			)
		),
		'role'=>array(
			'valid'=>array(
				'rule'=>array('inlist', array('admin', 'author')),
				'message'=>'選んでください',
				'allowEmpty'=>false
			)
		)
	);
	public function beforeSave($options = array()){
$this->data['User']['password'] = AuthComponent::password(
$this->data['User']['password']
);
return true;
	}

	}


 ?>
