<?php $options =array(
'label'=>'登録',
'class'=>'btn btn-primary btn-lg');
?>
<?php echo $this->Form->create('Category'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('category',array('class'=>'form-control'));
	?>
	</fieldset>
<?php echo $this->Form->end($options); ?>
</div>
