<?php
echo $this->Form->create('User');
?>
<fieldset>
<legend><?php echo __('Add User'); ?></legend>
<?php
echo $this->Form->input('name');
echo $this->Form->input('password');
 ?>
</fieldset>

<?php
echo $this->Form->end(__('登録'));
 ?>
