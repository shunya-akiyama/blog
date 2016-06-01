<?php

App::uses('Component','Controller');
class FindComponent extends Component{
  public $name = 'Posts';
  public $uses = array('Post','Attachment','Category','PostsTag');
  public $helpers = array('Html', 'Form','Flash');
  public $presetVars = true;
  public $hasAndBelongsToMany = array('tag');
	public $components = array('Flash','Session','Paginator',
	'Search.Prg'=>array(
		'commonProcess'=>array(
			'paramType'=>'querystring',
			'filterEmpty'=>true,
			)
		)
	);
	public $paginate = array('maxLimit'=>5);


  public function search(){
    $this->Paginator->settings = $this->paginate;
		$posts = $this->Paginator->paginate('Post');
		$this->set('posts',$posts);
//タイトル検索
		$this->Prg->commonProcess();
	  $this->Paginator->settings['conditions']=$this->Post->parseCriteria($this->Prg->parsedParams());
		$this->set('posts',$this->Paginator->paginate());
//カテゴリ検索
		$this->set('category',$this->Category->find('list',array('fields'=>array('id','category'))));
//タグ検索
    $this->set('tag',$this->Post->Tag->find('list',array('fields'=>array('id','tag'))));
	}
}

 ?>
