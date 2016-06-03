<?php $options =array(
'label'=>'ログイン',
'class'=>'btn btn-primary btn-lg');
echo $this->Flash->render('auth'); ?>
<?php echo $this->Html->link('公開側画面はこちら',array('controller'=>'posts','action'=>'index')); ?>
 <fieldset>
  <legend>
    <?php echo __('ログインが必要です。'); ?>
  </legend>
  <?php
  	echo $this->Form->create('User');
    echo $this->Form->input('username',array('class'=>'form-control'));
    echo $this->Form->input('password',array('class'=>'form-control form-group'));
    echo $this->Form->end($options);
	 ?>
 </fieldset>
