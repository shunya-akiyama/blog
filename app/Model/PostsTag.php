<?php
class PostsTag extends AppModel{
public $name = 'PostsTag';

public $belongsTo = array(
  'Post'=> array(
    'className'=>'Post',
    'foreignKey'=>'post_id',
  ),
    'Tag'=>array(
    'className'=>'Tag',
    'foreignKey'=>'tag_id',
    'fields'=>array('id','tag'),
    'condition'=>array('PostsTag.tag_id'=>'tag.id'
  ),
  ),
);


}
?>
