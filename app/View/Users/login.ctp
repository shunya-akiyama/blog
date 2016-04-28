<?php
echo $this->Flash->render('auth');
echo $this->Form->create('User');
 ?>

 <fieldset>
  <legend>
    <?php echo __('ログインが必要です。'); ?>
  </legend>
  <?php
    echo $this->Form->input('name');
    echo $this->form->input('password');
   ?>
 </fieldset>
 <?php echo $this->Form->end(__('Login')); ?>
