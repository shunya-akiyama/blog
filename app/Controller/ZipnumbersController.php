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
   array('conditions' => array('Zipnumber.zip' => ''))));
}



  public function zipCode(){
    if($this->request->is('ajax')){
      $this->autoRender=FALSE;
      $res = $this->request->data['Zipnumbers']['zip'];

      $aa = $this->Zipnumber->find('first',
      array('conditions' => array('Zipnumber.zip' => $res)));
      //$aa = $this->set($this->Zipnumber->find('first',
      //rray('conditions' => array('Zipnumber.zip' => $res))));
      echo $aa['Zipnumber']['prefecture'].$aa['Zipnumber']['city'].$aa['Zipnumber']['town'];
    }else{
       echo "通信失敗";
    }
  }

}
 ?>
