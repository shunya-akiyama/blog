<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model

 */
class AppModel extends Model {
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
