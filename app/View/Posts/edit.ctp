<h1>編集</h1>
<?php
echo $this->Form->create('Post',array('type'=>'file'));
echo $this->Form->input('Image.0.attachment',array('type'=>'file','label'=>'Image'));
echo $this->Form->input('Image.1.attachment',array('type'=>'file','label'=>'Image'));
echo $this->Form->input('Image.2.attachment',array('type'=>'file','label'=>'Image'));
echo $this->Form->input('title');
echo $this->Form->input('body');
echo $this->Form->input('id',array('type'=>'hidden'));
echo $this->Form->end('保存');
 ?>
