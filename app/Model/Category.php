<?php
App::uses('AppModel', 'Model');
/**
 * Category Model
 *
 * @property Cat $Cat
 */
class Category extends AppModel {
	public $helpers = array('Html', 'Form', 'Flash');

/**
 * Validation rules
 *
 * @var array
 */
  public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow();
	}

	public $validate = array(
		'cat_id' => array(
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

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Cat' => array(
			'className' => 'Cat',
			'foreignKey' => 'cat_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
