<?php
  class Category extends AppModel{
    public $validate = array(
      'category' => array(
        'rule' => 'notBlank'
      ),
    );
  }
 ?>
