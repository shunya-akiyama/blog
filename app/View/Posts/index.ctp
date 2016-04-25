<h1>index</h1>
<ul>
  <?php foreach ($posts as $post): ?>
  <li><?php echo $post['Post']['id'] ?>
    <p><?php echo $this->Html->link($post['Post']['title'],
    array('controller'=>'posts', 'action'=>'view', $post['Post']['id'])); ?>
    :<?php echo h($post['Category']['category']); ?>
</p>

    <p>
    <?php echo $this->Html->link('編集',
    array('action'=>'edit', $post['Post']['id'])); ?>
  <?php echo $this->Form->postLink('Delete',array('action'=>'delete',$post['Post']['id']),array('confirm'=>'削除してよろしいですか?')); ?>
  </p>
    <p><?php echo $post['Post']['created']; ?></p>

  </li>
<?php endforeach; ?>
</ul>
<p>
<?php
echo $this->Html->link('新規投稿',
array('controller'=>'posts','action'=>'add'));
?>
</p>
