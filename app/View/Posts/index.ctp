<h1>samplecode</h1>
<table>
	<tr>
		<th>
      ID
		</th>
		<th>
    	Title
		</th>
		<th>
		  Created
		</th>
	</tr>
<?php foreach ($posts as $post): ?>
	<tr>
		<td>
			<?php echo $post['Post']['id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($post['Post']['title'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link('編集', array('action' => 'edit', $post['Post']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Form->postLink('削除',
			array('action' => 'delete', $post['Post']['id']),array('confirm'=>'削除してよろしいですか？')); ?>
		</td>
		<td>
			<?php echo $post['Post']['created']; ?>
		</td>
	</tr>
<?php endforeach; ?>
<?php unset($post); ?>
</table>
<?php
echo $this->Html->link(
'投稿する',array('controller'=>'posts', 'action'=>'add')
);
/*
echo $this->Form->postLin('LOGOUT', array('action' => 'logout', );)
*/
 ?>
