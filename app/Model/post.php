<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 * @property User $User
 * @property Cat $Cat
 */
class Post extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
/*
		'Tag' => array(
			'className' => 'Tag',
			'foreignKey' => 'part_no',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
*/
	);
}
