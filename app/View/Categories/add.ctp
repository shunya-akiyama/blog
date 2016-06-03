<?php $options =array(
'label'=>'追加',
'class'=>'btn btn-primary btn-lg');
echo $this->Form->create('Category');
echo $this->Form->input('category',array('class'=>'form-control form-group'));
echo $this->Form->end($options);
 ?>
