<ul class="col-xs-8 col-md-8 col-lg-8">
<?php foreach ($posts as $post): ?>
<li>
	<h2><?php echo $this->Html->link($post['Post']['title'],
	array('controller'=>'posts', 'action'=>'view', $post['Post']['id'])); ?>
</h2>
	<?php echo $this->Html->para('',$post['Category']['category'],array('class'=>'fa fa-flag')); ?>
<p>
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
		array('controller'=>'posts','action'=>'index'),array('class'=>'panel-body'));
		?>
	</p>
</div>

<ul class="paging col-xs-12 col-md-12 col-lg-12">
  <li><?php echo $this->Paginator->prev('Prev',array('tag'=>'p','class'=>'btn btn-default')); ?></li>
<li><?php
    echo $this->Paginator->counter(array(
        'format' => __('{:page}/{:pages}ページを表示')
    ));
  ?></li>
  <li><?php echo $this->Paginator->next('Next',array('tag'=>'p','class'=>'btn btn-default')); ?></li>
</ul>
