<div class="col-xs-12 col-md-12 col-lg-12">
	<h2><?php echo __('Tags'); ?></h2>
	<table class="table table-hover table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('tag'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($tags as $tag): ?>
	<tr>
		<td><?php echo h($tag['Tag']['id']); ?>&nbsp;</td>
		<td><?php echo h($tag['Tag']['tag']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tag['Tag']['id']), array('class'=>'pull-right btn btn-danger','confirm' => __('Are you sure you want to delete # %s?', $tag['Tag']['id']))); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tag['Tag']['id']),array('class'=>'pull-right btn btn-success')); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<p>
 	<?php echo $this->Html->link('タグの追加',array('controller'=>'tags','action'=>'add'),array('class'=>'panel-body'));?>
  </p>
</div>
