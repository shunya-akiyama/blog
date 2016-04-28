<h1>index</h1>
<ul>
  <?php foreach ($posts as $post): ?>
  <li><?php echo $post['Post']['id'] ?>
    <p><?php echo $this->Html->link($post['Post']['title'],
    array('controller'=>'posts', 'action'=>'view', $post['Post']['id'])); ?>
    :<?php echo h($post['Category']['category']); ?>
</p>
<p>
  <?php echo h($post['Tag'][0]['tag']); ?>
</p>
    <p>
    <?php echo $this->Html->link('編集',
    array('action'=>'edit', $post['Post']['id'])); ?>
  <?php echo $this->Form->postLink('Delete',array('action'=>'delete',$post['Post']['id']),array('confirm'=>'削除してよろしいですか?')); ?>
  </p>
    <p><?php echo h($post['Post']['created']); ?></p>

  </li>
<?php endforeach; ?>
</ul>
<p>
<?php
echo $this->Html->link('新規投稿',
array('controller'=>'posts','action'=>'add'));
?>
</p>
<?php echo $this->Form->create(); ?>
<fieldset>
<legend>検索</legend>
<p><?php echo $this->Form->input('title',array('type'=>'text','div'=>false,'label'=>false)); ?></p>
<?php echo $this->Form->submit(__('検索')); ?>
<?php echo $this->Form->end(); ?>

</fieldset>


<?php echo $this->Form->create(); ?>
<fieldset>
<legend>検索</legend>
<p><?php echo $this->Form->input('category',array('type'=>'text','div'=>false,'label'=>false)); ?></p>
<?php echo $this->Form->submit(__('検索')); ?>
<?php echo $this->Form->end(); ?>

</fieldset>
<?php echo $this->Form->create(); ?>
<fieldset>
<legend>検索</legend>
<p><?php echo $this->Form->input('tag',array('type'=>'text','div'=>false,'label'=>false)); ?></p>
<?php echo $this->Form->submit(__('検索')); ?>
<?php echo $this->Form->end(); ?>

</fieldset>
