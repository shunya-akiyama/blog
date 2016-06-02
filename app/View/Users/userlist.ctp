<div class="col-xs-8 col-md-8 col-lg-8">
  <table class="table table-hover">
  	<thead>
  		<tr>
        <th><?php echo $this->Paginator->sort('id'); ?></th>
  			<th><?php echo $this->Paginator->sort('username'); ?></th>
  			<th><?php echo $this->Paginator->sort('group_id'); ?></th>
  			<th class="actions"><?php echo __('Actions'); ?></th>
  		</tr>
  	</thead>
  	<tbody>
      <?php foreach ($users as $user): ?>
    	<tr>
    		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
    		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
    		<td>
    			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
    		</td>
    		<td class="actions">
    			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
    			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
    			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?>
    		</td>
    	</tr>
    <?php endforeach; ?>
  	</tbody>
  </table>
</div>
