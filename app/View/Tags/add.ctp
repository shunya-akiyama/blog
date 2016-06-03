 <?php $options =array(
 'label'=>'追加',
 'class'=>'btn btn-primary btn-lg');
 echo $this->Form->create('Tag');
 echo $this->Form->input('tag',array('class'=>'form-control form-group'));
 echo $this->Form->end($options);
  ?>
