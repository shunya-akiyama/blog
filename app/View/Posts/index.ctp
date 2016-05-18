<?php
$i=0;
if($i < 5);
$i++; ?>
<h1>一覧</h1>
<ul>
<?php foreach ($posts as $post): ?>
  <li>
		<p><?php echo h($post['Post']['created']); ?></p>
    <h2><?php echo $this->Html->link($post['Post']['title'],
    array('controller'=>'posts', 'action'=>'view', $post['Post']['id'])); ?>
	</h2>
  <?php echo $this->Html->para('',$post['Category']['category'],array('class'=>'fa fa-flag')); ?>
	<p>
     <?php foreach ($post['Tag'] as $post["Tag"]): ?>
    <?php echo $this->Html->para('',$post['Tag']['tag'],array('class'=>'fa fa-tags')); ?>
     <?php endforeach; ?>

	</p>
  </li>
<?php endforeach; ?>
</ul>
<ul>
  <li><?php echo $this->Paginator->prev(__('前'),array('tag'=>'p')); ?></li>
  <li><?php echo $this->Paginator->next(__('次'),array('tag'=>'p')); ?></li>
</ul>
