<?php
class Attachment extends AppModel{
  public $use = 'Attachment';
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

  public $validate = array(
      'attachment' => array(
      'rule'=>'uploadCheck',
      'message'=>'一枚くらい登録してください。',
      'required'=>'false',
      'allowEmpty'=>'true',
//      'rule'=>array('multiple'=>array('min'=>1),
//      'message'=>'登録できない拡張子です。'
//        ),
    ),
  );

    public function uploadCheck($check){
        $value = array_values($check);
          debug($value);
          return $value[0]['error'] != 4;
    }

}
 ?>
