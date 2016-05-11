
<div class="col-xs-12">
<h1>
  <?php echo $this->Html->link('BlogTest Page', array('action' =>'/')); ?>
</h1>
  <div id="search">
    <p>
      検索フォームを表示
    </p>

  </div>
    <?php echo $this->Form->create('Post',array('url'=>'/posts/find','class'=>'container')); ?>
    <ul class="row" id="search_form">
        <li class="col-xs-4">
          <?php echo $this->Form->input('titles',array('div'=>false)); ?>
        </li>
        <li class="col-xs-4">
          <?php echo $this->Form->input('category',array('type'=>'select','multiple'=>'checkbox','options'=>$category,'div'=>false)); ?></li>
        </li>
        <li class="col-xs-3">
          <?php echo $this->Form->input('tag',array('type'=>'select','multiple'=>'checkbox','options'=>$tag,'div'=>false)); ?>
        </li>
        <li class="col-xs-1">
          <?php echo $this->Form->submit(__('検索')); ?>
        </li>
    </ul>
    <?php echo $this->Form->end(); ?>
</div>
