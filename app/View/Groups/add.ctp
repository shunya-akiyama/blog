<?php $options =array(
'label'=>'登録',
'class'=>'btn btn-primary btn-lg');
?>
<div class="groups form">
<?php echo $this->Form->create('Group'); ?>
	<fieldset>
		<legend><?php echo __('Add Group'); ?></legend>
	<?php
		echo $this->Form->input('name',array('class'=>'form-control form-group'));
	?>
	</fieldset>
<?php echo $this->Form->end($options); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<?php echo $this->Html->link(__('List Groups'), array('action' => 'index')); ?>
</div>
