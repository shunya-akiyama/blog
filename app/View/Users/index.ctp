
<ul class="col-xs-8 col-md-8 col-lg-8">
<?php foreach ($posts as $post): ?>
<li>
	<h2><?php echo $this->Html->link($post['Post']['title'],
	array('controller'=>'posts', 'action'=>'view', $post['Post']['id'])); ?>
</h2>
<span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>
<?php echo $this->Html->para('',$post['Category']['category']); ?>
<p>
	<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
  <?php foreach ($post['Tag'] as $post["Tag"]): ?>
  <?php echo $this->Html->tag('',$post['Tag']['tag'],array('class'=>'tags')); ?>,
  <?php endforeach; ?>
</p>
	<p>
	<?php echo $this->Html->link('編集',
	array('controller'=>'posts','action'=>'edit', $post['Post']['id'])); ?>
<?php echo $this->Form->postLink('Delete',array('controller'=>'posts','action'=>'delete',$post['Post']['id']),array('confirm'=>'削除してよろしいですか?')); ?>
</p>
	<p><?php echo h($post['Post']['created']); ?></p>

</li>
<?php endforeach; ?>
</ul>
<div class="panel panel-primary col-xs-4 col-md-4 col-lg-4">
<p class="panel-heading">
  管理メニュー
</p>
<p>
	<?php
	echo $this->Html->link('記事の新規投稿',
	array('controller'=>'posts','action'=>'add'),array('class'=>'panel-body'));
	?>
</p>
<p>
	<?php
		echo $this->Html->link('ユーザー追加',
		array('controller'=>'users','action'=>'add'),array('class'=>'panel-body'));
	?>
</p>
<p>
	<?php
	echo $this->Html->link('カテゴリーの追加',
	array('controller'=>'categories','action'=>'add'),array('class'=>'panel-body'));
	 ?>
</p>

 <p>
	 <?php
	 echo $this->Html->link('タグの追加',
	 array('controller'=>'tags','action'=>'add'),array('class'=>'panel-body'));
	  ?>
 </p>

	<p>
		<?php
		echo $this->Html->link('ログアウト',
		array('controller'=>'users','action'=>'logout'),array('class'=>'panel-body'));
		?>
	</p>
</div>
<div class="panel panel-primary col-xs-4 col-md-4 col-lg-4">
	<p class="panel-heading">
  ユーザー一覧
	</p>
	<table>
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

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>
<ul class="paging col-xs-12 col-md-12 col-lg-12">
  <li><?php echo $this->Paginator->prev('Prev',array('tag'=>false,'class'=>'btn btn-default'),null,array()); ?></li>
  <?php echo $this->Paginator->numbers(array('class'=>'btn btn-default')); ?>
  <li><?php echo $this->Paginator->next('Next',array('tag'=>false,'class'=>'btn btn-default'),null,array()); ?></li>
</ul>
