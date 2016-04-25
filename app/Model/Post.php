<?php
class Post extends AppModel{

  public $validate = array(
    'title'=>array(
      'rule'=>'notBlank'
    ),
    'body'=>array(
      'rule'=>'notBlank'
    )
  );

  public $hasMany = array(
    'Image'=>array(
      'className' => 'Attachment',
      'foreignKey'=>'post_id',
      'conditions'=>array(
        'Image.post_id'=>'Post'
      ),
    ),
  );
  public $belongsTo = array(
    'Category' => array(
      'className'=>'Category',
      'foreignKey' => 'category_id',
      'conditions' => ''
    ),
  );
}
?>
