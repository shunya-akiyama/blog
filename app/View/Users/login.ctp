<?php echo Configure::version(); ?>


<?php
echo $this->Flash->render('auth');
 ?>

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
