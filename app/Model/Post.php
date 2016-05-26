<?php
App::uses('AppModel', 'Model');
class Post extends AppModel{
public $use = 'Post';
public $order = ('Post.id DESC');
public $actsAs = array('Search.Searchable');

    public $validate = array(
    'title'=>array(
        'rule'=>'notBlank',
        'required'=>'false',
        'allowEmpty'=>'true',
        'message'=>'タイトルは必須です'
    ),
    'body'=>array(
        'rule'=>'notBlank',
        'required'=>'false',
        'allowEmpty'=>'true',
        'message'=>'本文も必須です'
    ),
    );

    public $hasMany = array(
    'Image'=>array(
        'className' => 'Attachment',
        'foreignKey'=>'post_id',
        'conditions'=>array(
        'Image.post_id'=>'Post',
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

    public $hasAndBelongsToMany = array(
    'Tag'=>array(
        'className'=>'Tag',
        'joinTable'=>'posts_tags',
        'foreignKey'=>'post_id',
        'associationForeignKey'=>'tag_id',
        'with'=>'PostsTag',
        'conditions'=>''
    ),
    );

    public $filterArgs = array(
    'titles'=>array(
        'type'=>'like',
        'field'=>array('Post.title'),
    ),
    'category'=>array(
        'type'=>'query',
        'method'=>'findByCategories',
    ),
    'tag'=>array(
        'type'=>'query',
        'method'=>'findByTags',
    ),
    );


  public function findByCategories($data=array()){
    $category=$this->Category->find('list',array(
      'fields'=>'Category.id',
      'conditions'=>array('Category.id'=>$data['category']),
    ));
    $condition[1]=array(
      'Post.category_id'=>$category,
    );
    return $condition;
  }


public function findByTags($data=array()){
  $tag=$this->PostsTag->find('list',array(
    'fields'=>'PostsTag.post_id',
    'conditions'=>array('PostsTag.tag_id'=>$data['tag']),
  ));
  $condition[1]=array(
    'Post.id'=>$tag,
  );
  return $condition;
}


}
?>
