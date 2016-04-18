<?php
echo $this->Flash->render('auth');
echo $this->Form->create('User');
echo __('名前とパスワードを入力してください。');
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->end(__('login'));
?>
