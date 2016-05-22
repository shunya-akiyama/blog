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
  public function zip(){
   $this->set('arnswer',$this->Zipnumber->find('first',
   array('conditions' => array('Zipnumber.zip' => ''))));
}



  public function zipCode(){
    if($this->request->is('ajax')){
      $this->autoRender=FALSE;
      $res = $this->request->data['Zipnumbers']['zip'];
      if($answer = $this->Zipnumber->find('first',
      array('conditions' => array('Zipnumber.zip' => $res)))){
			echo $answer['Zipnumber']['prefecture'].$answer['Zipnumber']['city'].$answer['Zipnumber']['town'];
		}else{
			echo "ねーよ。";
		}
		}else{
       echo "通信失敗";
    }
  }

}
 ?>
