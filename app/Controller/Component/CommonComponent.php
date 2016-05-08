<?php
/*
App::uses('Component','Controller');
class CommonComponent extends Component{
	public $controller;
	public $request;

	public $components = array('Common','Paginator',
	'Search.Prg'=>array(
		'commonProcess'=>array(
			'paramType'=>'querystring',
			'filterEmpty'=>true,
			)
		)
	);
	public function startup(Controller $controller) {
     $this->Paginator->initialize($controller);
		 $this->controller=$controller;
	 }

	public function findSidebar(){
//タイトル検索
		$this->Prg->commonProcess();
		$this->Paginator->settings['conditions']=$this->Post->parseCriteria($this->Prg->parsedParams());
		$posts=$this->set('posts',$this->Paginator->paginate());
//カテゴリ検索
		$category=$this->set('category',$this->Category->find('list',array('fields'=>array('id','category'))));
//タグ検索
		$this->set('tag',$this->Post->Tag->find('list',array('fields'=>array('id','tag'))));
	}
}
*/
 ?>
