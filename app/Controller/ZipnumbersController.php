<?php
App::uses('AppController','Controller');
class ZipnumbersController extends AppController {
var $name = 'Zipnumbers';
  public $components = array('RequestHandler');
  public $helpers = array('Html', 'Form','Flash');
  public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('zip','zipCode');
    }
    public $tmp;

  public function zip(){
  }

  public function zipCode(){
  //  $zip = $this->zip_code->find('all');
    if($this->request->is('ajax')){
      $this->autoRender=FALSE;
      $res = $this->request->data['Zipnumbers']['zip'];
    }else{
       echo "通信失敗";
    }
  }

}
 ?>
