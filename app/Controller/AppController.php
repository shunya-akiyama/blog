<?php

class AppController extends Controller {
public $components = array('Paginator','Session','DebugKit.Toolbar',
'Auth'=>array(
  'loginRedirect'=>array(
    'controller'=>'users',
    'action'=>'index'
    ),
  'logoutRedirect'=>array(
    'controller'=>'posts',
    'action'=>'index',
    ),
  'authenticate'=>array(
    'Form'=>array(
    'passwordHasher'=>'Blowfish'
	  )
  ),
)
);
public $helpers = array(
  'Session',
  'Html'=>array('className'=>'TwitterBootstrap.BootstrapHtml'),
  'Form'=>array('className'=>'TwitterBootstrap.BootstrapForm'),
  'Paginator'=>array('className'=>'TwitterBootstrap.BootstrapPaginator')
);
/*
public function beforeFilter(){
	$this->Auth->allow('view');
}
*/
public $layout = 'TwitterBootstrap.default';
}
?>
