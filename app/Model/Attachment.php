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
      ),),),
    );

    public $belongsTo = array(
      'Post' => array(
      'className' => 'Post',
      'foreignKey' => 'post_id',
      ),
    );

    public $validate = array(
      'attachment' => array(
      'on'=>'create',
      'rule'=>'uploadCheck',
      'message'=>'一枚くらい登録してください。',
      'allowEmpty'=>true,
      ),
    );
/*
    public $validate = array(
      'attachment'=>array(
        array(
          'rule'=>'uploadCheck',
          'message'=>'一枚くらい登録してください。',
          'allowEmpty'=>true,
      ),
        array(
          'rule'=>array('extension',array('jpeg','jpg','gif','png')),
          'message'=>'拡張子が違います。使用できるのはjpeg,jpg,gif,pngです',
          'allowEmpty'=>true,
        ),
    ),
    );
    */
    public function uploadCheck(){
      $imgcheck = $this->data[$this->alias];
      if($imgcheck['attachment']['tmp_flg']){
        return true;
      }else{
        return false;
      }
      unset($imgcheck['attachment']['tmp_flg']);
    }
}
?>
