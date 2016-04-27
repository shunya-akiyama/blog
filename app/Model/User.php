<?php
class User extends AppModel{
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
}
 ?>
