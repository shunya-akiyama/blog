<?php

class AppController extends Controller {

public $components = array('Paginator','Session','DebugKit.Toolbar','RequestHandler',
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
public $layout = 'TwitterBootstrap.default';

public function beforeFilter() {
//タイトル検索
  $this->set('posts',$this->Paginator->paginate());
//カテゴリ検索
  $this->set('category',$this->Category->find('list',array('fields'=>array('id','category'))));
//タグ検索
  $this->set('tag',$this->Post->Tag->find('list',array('fields'=>array('id','tag'))));
   }


}
?>
