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

/*
    public $validate = array(
      'attachment' => array(
      'on'=>'create',
      'rule'=>'uploadCheck',
      'message'=>'1枚も画像が選択されていないです。',
      'allowEmpty'=>true,
      ),
    );
    */
    public $validate = array(
      'attachment'=>array(
      array(
//        'rule'=>array('extension',array('jpeg','jpg','gif','png')),
        'rule'=>array('isValidMimeType', array('image/jpeg','image/jpg','image/gif','image/png'), false),
        'message'=>'拡張子が違います。使用できるのはjpeg,jpg,gif,pngです',
        'allowEmpty'=>true,
      ),
      array(
        'rule'=>'uploadCheck',
        'message'=>'一枚くらい登録してください。',
        'allowEmpty'=>true,
        'on'=>'create',
      ),

    ),
    );
/*
    if(preg_match( "/.*?\.jpg|.*?\.png||.*?\.gif.*?\.jpeg/i",$imgcheck['attachment']['name'])){
 preg_match( '/.+\.(png|jpg|jpeg|gif)/i',$imgcheck['attachment']['name'])
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
