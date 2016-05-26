<?php
class Attachment extends AppModel{
  public $use = 'Attachment';

  public $validate = array(
    'attachment' => array(
    //  'rule'=>array('uploadCheck'),
      'required'=>'false',
      'allowEmpty'=>'true',
      'rule'=>array('multiple'=>array('min'=>1)),
      'message'=>'一つは登録してください。',
//      'message'=>'登録できない拡張子です。'
    ),
  );

  public $actsAs = array(
      'Upload.Upload' => array(
          'attachment' => array(
          'arrowEmpty' =>false,
          ),
      ),
  );

  public $belongsTo = array(
      'Post' => array(
      'className' => 'Post',
      'foreignKey' => 'post_id',
      ),
  );
/*
  public function uploadCheck($data){
      $counter = array($data['attachment']);
      if($counter < 0){
        return $counter;
      }
  }
*/
}
 ?>
