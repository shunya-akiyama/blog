<?php
echo $this->Form->create('User');
?>
<fieldset>
<legend><?php echo __('Add User'); ?></legend>
<?php
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->input('Group.name',array('class'=>'checkbox-inline','label'=>false,'type'=>'select','multiple'=>'checkbox','options'=>$group,'div'=>false));

?>
</fieldset>

<?php
echo $this->Form->end(__('登録'));
 ?>
