<?php $options =array(
'label'=>'登録',
'class'=>'btn btn-primary btn-lg');
?>
<?php echo $this->Form->create('User'); ?>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('username',array('class'=>'form-control'));
		echo $this->Form->input('password',array('class'=>'form-control'));
		echo $this->Form->input('group_id',array('class'=>'form-control form-group'));
	?>
<?php echo $this->Form->end($options); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
