
<div class="col-xs-12">
  <div class="container">
    <div class="row">
      <div class="col-xs-12" id="search">
        検索フォームを表示
      </div>
    </div>
    <ul class="row" id="search_form">
    <?php echo $this->Form->create('Post',array('url'=>'/posts/find','div'=>false)); ?>
        <li class="col-xs-3">
          <?php echo $this->Form->input('titles',array('div'=>false)); ?>
        </li>
        <li class="col-xs-4">
          <?php echo $this->Form->input('category',array('type'=>'select','multiple'=>'checkbox','options'=>$category,'div'=>false)); ?></li>
        </li>
        <li class="col-xs-4">
          <?php echo $this->Form->input('tag',array('type'=>'select','multiple'=>'checkbox','options'=>$tag,'div'=>false)); ?>
        </li>
        <li class="col-xs-1">
          <?php echo $this->Form->submit(__('検索')); ?>
        </li>
    <?php echo $this->Form->end(); ?>
    </ul>
  </div>
</div>
