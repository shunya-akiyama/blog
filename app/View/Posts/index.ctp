<h1>index</h1>
<ul>
<?php foreach ($posts as $post): ?>
  <li>
		<p><?php echo h($post['Post']['created']); ?></p>
    <h2><?php echo $this->Html->link($post['Post']['title'],
    array('controller'=>'posts', 'action'=>'view', $post['Post']['id'])); ?>
	</h2>
  <p>
		カテゴリー:<?php echo h($post['Category']['category']); ?>
  </p>
	<p>
	  タグ:<?php echo h($post['Tag'][0]['tag']); ?>
	</p>
  </li>
<?php endforeach; ?>
</ul>
<p>
  <?php echo $this->Paginator->prev(__('前'),array('tag'=>'p')); ?>
</p>
<p>
  <?php echo $this->Paginator->next(__('次'),array('tag'=>'p')); ?>
</p>
