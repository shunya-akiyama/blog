<h1>index</h1>
<?php foreach ($posts as $post): ?>
<ul>
  <li><?php echo $post['post']['id'] ?>
<?php echo $this->Html->link->$post['post']['title'], array('controller'=>'posts', 'action'=>'view'); ?>
<?php echo $post['post']['created']; ?>
</li>
</ul>
<?php endforeach; ?>
