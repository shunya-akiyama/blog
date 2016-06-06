<div class="col-xs-12 col-md-12 col-lg-12">
	<h2><?php echo __('Category'); ?></h2>
	<table class="table table-hover table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('category'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($categories as $category): ?>
	<tr>
		<td><?php echo h($category['Category']['id']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['category']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['Category']['id']), array('class'=>'pull-right btn btn-danger','confirm' => __('Are you sure you want to delete # %s?', $category['Category']['id']))); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id']),array('class'=>'pull-right btn btn-success')); ?>
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
		<?php echo $this->Html->link('カテゴリーの追加',array('controller'=>'categories','action'=>'add'),array('class'=>'panel-body'));?>
	</p>

</div>
