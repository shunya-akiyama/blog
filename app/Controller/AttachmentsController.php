<?php
App::uses('AppController', 'Controller');
class AttachmentsController extends AppController {
  public $name = 'Attachments';
  public $uses = array('Post','Attachment','Category','PostsTag');

  public function delete($id){
    if($this->request->is('get')){
      throw new MethodNotAllowedException();
    }
    if($this->Attachment->delete($id)){
      $this->Flash->success(__('削除完了',h($id)));
    }else{
      $this->Flash->error(__('削除できませんでした。',h($id)));
    }
    return $this->redirect(array('controller'=>'users','action'=>'index'));
  }

/*
<?php
$i=0;
$j=count($post['Image']);
if($i <= $j); ?>
<?php
echo $this->Form->create('Attachment', array('type' => 'file'));
?>
<?php foreach ($post['Image'] as $row["Image"]): ?>
<?php
$base = $this->Html->url("/files/image/attachment/");//自宅環境ではこの記述で動かなかったので一旦外し、下記にパスを直接入れた。
if($row["Image"]["dir"] > 0) {
  echo $this->Form->postLink('Delete',array('controller'=>'posts','action'=>'delete',$row["Image"]["attachment"]),array('class'=>'pull-right btn btn-danger','confirm'=>'削除してよろしいですか?'));
  echo $this->Html->image($base.$row["Image"]["dir"]."/".$row["Image"]["attachment"],array('class'=>'col-xs-12 col-md-2 img-responsive'));
  $i++;
}
?>
<?php endforeach; ?>
*/

}

?>
