<?php
App::uses('AppController','Controller');
class ZipnumbersController extends AppController {
    var $name = 'Zipnumbers';
    public $components = array('RequestHandler');
    public $helpers = array('Html', 'Form','Flash');
    public $uses = array('Post','Zipnumber','Category','PostsTag');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('zip','zipCode');
    }

    public function zip(){
        $this->set('answer',$this->Zipnumber->find('first',
        array('conditions' => array('Zipnumber.zip' => ''))));

    }



    public function zipCode(){
      if($this->request->is('ajax')){
        $this->autoRender=FALSE;
        $res = $this->request->data['Zipnumbers']['zip'];
        $answer = $this->Zipnumber->find('first', array('conditions' => array('Zipnumber.zip' => $res)));
        echo $answer ? $answer['Zipnumber']['prefecture'].$answer['Zipnumber']['city'].$answer['Zipnumber']['town'] : "見つかりません";
  		}else{
         echo "通信失敗";
      }
    }

}
 ?>
