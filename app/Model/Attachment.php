<?php
class Attachment extends AppModel{
  public $use = 'Attachment';
  /*
  public $validate = array(
      'Post.0.Attachment' => array(
          'rule'=>array('uploadError'),
          'required'=>'false',
          'allowEmpty'=>'true',
          'message'=>'画像が選択されていないか、拡張子が違う可能性があります。ファイルはjpg/jpeg/gif/pngのみ保存できます。'
      ),
  );
  */

  public $actsAs = array(
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
