<?php echo $this->Flash->render('auth'); ?>
<?php echo $this->Html->link('公開側画面はこちら',array('controller'=>'posts','action'=>'index')); ?>
 <fieldset>
  <legend>
    <?php echo __('ログインが必要です。'); ?>
  </legend>
  <?php
  	echo $this->Form->create('User');
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    echo $this->Form->end(__('Login'));
	 ?>
 </fieldset>
