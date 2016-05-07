<fieldset>
<?php echo $this->Form->create('Post',array('url'=>'/posts/find')); ?>
<legend>検索</legend>
<p><?php echo $this->Form->input('titles',array('div'=>false,'label'=>'タイトル')); ?></p>
<p><?php echo $this->Form->input('category',array('type'=>'select','multiple'=>'checkbox','options'=>$category,'div'=>false,'label'=>'カテゴリー')); ?></p>
<p><?php echo $this->Form->input('tag',array('type'=>'select','multiple'=>'checkbox','options'=>$tag,'div'=>false,'label'=>'タグ')); ?></p>
<?php echo $this->Form->submit(__('検索')); ?>
<?php echo $this->Form->end(); ?>
</fieldset>
