<ul>
<?php foreach ($posts as $post): ?>
<li><?php echo h($post['Post']['id']); ?>
	<h2><?php echo $this->Html->link($post['Post']['title'],
	array('controller'=>'posts', 'action'=>'view', $post['Post']['id'])); ?>
</h2>
	<?php echo $this->Html->para('',$post['Category']['category'],array('class'=>'fa fa-flag')); ?>
<p>
	<?php
	$i=0;
	if($i < 5);
	$i++;
	 ?>
	 <?php foreach ($post['Tag'] as $post["Tag"]): ?>

	<?php echo $this->Html->para('',$post['Tag']['tag'],array('class'=>'fa fa-tags')); ?>
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
<ul>
  <li><?php echo $this->Paginator->prev(__('前'),array('tag'=>'p')); ?></li>
  <li><?php echo $this->Paginator->next(__('次'),array('tag'=>'p')); ?></li>
</ul>

<?php
echo $this->Html->link('記事の新規投稿',
array('controller'=>'posts','action'=>'add'));
?>

<?php
	echo $this->Html->link('ユーザー追加',
	array('controller'=>'users','action'=>'add'));
?>
<p>
カテゴリーの追加
</p>
<?php
echo $this->Html->link('カテゴリーの追加',
array('controller'=>'categories','action'=>'add'));
 ?>

 <p>
 	タグの追加
 </p>
 <?php
 echo $this->Html->link('タグの追加',
 array('controller'=>'tags','action'=>'add'));
  ?>
<p>
	<?php
	echo $this->Html->link('ログアウト',
	array('controller'=>'users','action'=>'logout'));
	?>
</p>
