<?php
echo $this->Form->create('User', array('action'=>'login'));
echo $this->inputs(array(
  'legend'=>__('login'),
  'username',
  'password'
));
echo $this->Form->end(__('login'));
?>
