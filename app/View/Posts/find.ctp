<?php
$i=0;
if($i < 5);
$i++; ?>
<h1>検索結果</h1>
<ul>
<?php foreach ($posts as $post): ?>
  <li>
    <h2><?php echo $this->Html->link($post['Post']['title'],
    array('controller'=>'posts', 'action'=>'view', $post['Post']['id'])); ?>
	</h2>
  <p class="fa fa-flag">
		<?php echo h($post['Category']['category']); ?>
  </p>
    <?php foreach ($post['Tag'] as $post["Tag"]): ?>
 	<?php echo $this->Html->para('',$post['Tag']['tag'],array('class'=>'fa fa-tags')); ?>
 	 <?php endforeach; ?>
   <p><?php echo h($post['Post']['created']); ?></p>
  </li>
<?php endforeach; ?>
</ul>
<p>
  <?php echo $this->Paginator->prev(__('前'),array('tag'=>'p')); ?>
</p>
<p>
  <?php echo $this->Paginator->next(__('次'),array('tag'=>'p')); ?>
</p>
