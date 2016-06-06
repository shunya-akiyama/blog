<?php $options =array(
'label'=>'登録',
'class'=>'btn btn-primary btn-lg');
?>
<?php echo $this->Form->create('Tag'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tag'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tag',array('class'=>'form-control'));
	?>
	</fieldset>
<?php echo $this->Form->end($options); ?>
</div>
