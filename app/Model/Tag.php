<?php
  class Tag extends AppModel{
    public $name = 'Tag';
    public $validate = array(
      'tag' => array(
        'rule'=>'notBlank'
      ),
    );

    public $hasAndBelongsToMany = array(
      'Post'=>array(
        'className'=>'Post',
        'joinTable'=>'posts_tags',
        'foreignKey'=>'tag_id',
        'associationForeignKey'=>'post_id',
        'with'=>'PostsTag',
      ),
    );
  }
?>
