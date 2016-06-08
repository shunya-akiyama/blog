<?php

class AppController extends Controller {

public $components = array('Paginator','Session','DebugKit.Toolbar','RequestHandler',
    'Acl',
    'Auth'=>array(
    'authorize'=>array(
    'Actions'=>array('actionPath'=>'controllers')
    )
    ),
    'Session'
    );

public $helpers = array(
    'Session',
    'Html'=>array('className'=>'TwitterBootstrap.BootstrapHtml'),
    'Form'=>array('className'=>'TwitterBootstrap.BootstrapForm'),
    'Paginator'=>array('className'=>'TwitterBootstrap.BootstrapPaginator')
  );

public $layout = 'TwitterBootstrap.default';

public function beforeFilter() {
    $this->Auth->loginAction = array(
        'controller'=>'users',
        'action'=>'login'
    );
    $this->Auth->logoutRedirect = array(
        'controller'=>'posts',
        'action'=>'index'
    );
    $this->Auth->loginRedirect = array(
        'controller'=>'users',
        'action'=>'index'
    );
    $this->Auth->allow('display');
    //タイトル検索

        $this->set('posts',$this->Paginator->paginate());
    //カテゴリ検索
        $this->set('category',$this->Category->find('list',array('fields'=>array('id','category'))));
    //タグ検索
        $this->set('tag',$this->Post->Tag->find('list',array('fields'=>array('id','tag'))));

}


}
?>
