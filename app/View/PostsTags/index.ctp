<?php
echo debug($posts_tags);
 ?><h1>index</h1>
<ul>
  <?php foreach ($posts_tags as $posts_tag): ?>
  <li><?php echo $posts_tag['Post']['id'] ?>
    <p><?php echo $this->Html->link($posts_tag['Post']['title'],
    array('controller'=>'posts', 'action'=>'view', $posts_tag['Post']['id'])); ?>
    :<?php echo h($posts_tag['Category']['category']); ?>
</p>
<p>
  <?php echo h($posts_tag['Tag']['tag']); ?>
</p>
    <p>
    <?php echo $this->Html->link('編集',
    array('action'=>'edit', $posts_tag['Post']['id'])); ?>
  <?php echo $this->Form->postLink('Delete',array('action'=>'delete',$posts_tag['Post']['id']),array('confirm'=>'削除してよろしいですか?')); ?>
  </p>
    <p><?php echo h($posts_tag['Post']['created']); ?></p>

  </li>
<?php endforeach; ?>
</ul>
<p>
<?php
echo $this->Html->link('新規投稿',
array('controller'=>'posts','action'=>'add'));
?>
</p>
