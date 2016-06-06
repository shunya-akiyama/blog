
<ul class="col-xs-12 col-md-8">
    <?php foreach ($posts as $post): ?>
<li>
<h2>
	  <?php echo $this->Html->link($post['Post']['title'],array('controller'=>'posts', 'action'=>'view', $post['Post']['id'])); ?>
</h2>
<p class="small">
    <?php echo h($post['Post']['created']);?>
</p>
<span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>
    <?php echo $this->Html->tag('',$post['Category']['category']); ?>
<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
		<?php foreach ($post['Tag'] as $post["Tag"]): ?>
		<?php echo $this->Html->tag('',$post['Tag']['tag'],array('class'=>'tags')); ?>,
		<?php endforeach; ?>
		<?php echo $this->Form->postLink('Delete',array('controller'=>'posts','action'=>'delete',$post['Post']['id']),array('class'=>'pull-right btn btn-danger','confirm'=>'削除してよろしいですか?')); ?>
		<?php echo $this->Html->link('編集',array('controller'=>'posts','action'=>'edit', $post['Post']['id']),array('class'=>'pull-right btn btn-success')); ?>
<hr>
</li>
    <?php endforeach; ?>
</ul>

<div class="panel panel-primary col-xs-3 col-xs-offset-1">
<p class="panel-heading">
  管理メニュー
</p>
<p>
	<?php echo $this->Html->link('記事の新規投稿',array('controller'=>'posts','action'=>'add'),array('class'=>'panel-body'));?>
</p>
<p>
	<?php echo $this->Html->link('ユーザー一覧',array('controller'=>'users','action'=>'userlist'),array('class'=>'panel-body'));?>
</p>
<p>
	<?php echo $this->Html->link('カテゴリー一覧',array('controller'=>'categories','action'=>'index'),array('class'=>'panel-body'));?>
</p>
<p>
 <?php echo $this->Html->link('タグの一覧',array('controller'=>'tags','action'=>'index'),array('class'=>'panel-body'));?>
</p>
<p>
	<?php echo $this->Html->link('グループ一覧',array('controller'=>'groups','action'=>'index'),array('class'=>'panel-body'));?>
</p>
<p>
	<?php echo $this->Html->link('ログアウト',array('controller'=>'users','action'=>'logout'),array('class'=>'panel-body'));?>
</p>
</div>

<ul class="paging col-xs-12 col-md-12 col-lg-12">
  <li>
		<?php echo $this->Paginator->prev('Prev',array('tag'=>false,'class'=>'btn btn-default'),null,array()); ?>
	</li>
  <li>
		<?php echo $this->Paginator->numbers(array('class'=>'btn btn-default')); ?>
	</li>
  <li>
		<?php echo $this->Paginator->next('Next',array('tag'=>false,'class'=>'btn btn-default'),null,array()); ?>
	</li>
</ul>
