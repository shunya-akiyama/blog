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
        'allowEmpty'=>'true',
      ),
    );

    public function uploadCheck(){
      $imgcheck = $this->data[$this->alias];
    //  debug($imgcheck['attachment']);


        if($imgcheck['attachment']['tmp_flg']){
            return true;
        }else {
            return false;
        }
        unset($imgcheck['attachment']['tmp_flg']);

    }
      /*
    $imgcheck = $this->data[$this->alias]['attachment'];
    if(($imgcheck['name'] == '') == $imgcheck['name']){
      	return $imgcheck;
        debug(count($imgcheck['name']== ''));
    }else if(is_array($imgcheck['name']) !== is_array($imgcheck['name'] == '')){
      return true;
    }
		}
    */
}
?>
