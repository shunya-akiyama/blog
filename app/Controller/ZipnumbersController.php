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
   $this->set('aa',$this->Zipnumber->find('first',
   array('conditions' => array('Zipnumber.zip' => '4200885'))));
}



  public function zipCode(){
    if($this->request->is('ajax')){
      $this->autoRender=FALSE;
      $res = $this->request->data['Zipnumbers']['zip'];
      $this->set('aa',$this->Zipnumber->find('first',
      array('conditions' => array('Zipnumber.zip' => $res))));
      echo $aa;
    }else{
       echo "通信失敗";
    }
  }

}
 ?>
