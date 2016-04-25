<?php
  class Attachment extends AppModel{
    public $actsAs=array(
      'Upload.Upload' => array(
        'attachment' => array(
          'arrowEmpty' =>false,
          'thumbnailSizes' => array(
            'xvga' => '1024x768',
            'vga' => '640x480',
            'thumb' => '80x80',
          ),
        ),
      ),
    );

    public $belongsTo = array(
      'Post' => array(
        'className' => 'Post',
        'foreignKey' => 'post_id',
      ),
);
  }
 ?>
