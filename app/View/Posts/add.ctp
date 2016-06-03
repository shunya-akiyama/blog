<?php
$options =array(
'class'=>'btn btn-primary btn-lg');
echo $this->Form->create('Post',array('type'=>'file'));
echo $this->Form->input('title',array('class'=>'form-control'));
echo $this->Form->input('body',array('class'=>'form-control'));
echo $this->Form->input('Image.0.attachment',array('type'=>'file','label'=>'Image'));
echo $this->Form->input('Image.1.attachment',array('type'=>'file','label'=>'Image'));
echo $this->Form->input('Image.2.attachment',array('type'=>'file','label'=>'Image'));
echo $this->Form->input('category_id',array('class'=>'form-control'));
echo $this->Form->input('Posts.category_id',array('type'=>'hidden'));
echo $this->Form->input('Tag',array('class'=>'checkbox-inline','label'=>false,'type'=>'select','multiple'=>'checkbox','options'=>$tag,'div'=>false));
echo $this->Form->end($options);
 ?>
