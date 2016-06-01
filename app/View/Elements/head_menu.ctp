
<div class="col-xs-12 col-md-12 col-lg-12">
<h1>
  <?php echo $this->Html->link('BlogTest Page', array('controller'=>'posts','action' =>'index')); ?>
</h1>
  <div id="search">
  <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
  </div>
    <?php echo $this->Form->create('Post',array('url'=>'/posts/find','class'=>'container')); ?>
    <ul class="row" id="search_form">
        <li class="col-xs-4 col-md-4 input-group">
          <p class="input-group-addon">
            TITLE
          </p>
          <?php echo $this->Form->input('titles',array('class'=>'form-control','placeholder'=>'タイトル検索','label'=>false,'div'=>false)); ?>
        </li>
        <li class="col-xs-4 col-md-3">
          <span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>
          <?php echo $this->Form->input('category',array('class'=>'checkbox-inline','label'=>false,'type'=>'select','multiple'=>'checkbox','options'=>$category,'div'=>false)); ?></li>
        </li>
        <li class="col-xs-3 col-md-3">
          <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
          <?php echo $this->Form->input('tag',array('class'=>'checkbox-inline','label'=>false,'type'=>'select','multiple'=>'checkbox','options'=>$tag,'div'=>false)); ?>
        </li>
        <li class="col-xs-3 col-md-2">
          <?php echo $this->Form->submit(__('検索'),array('class'=>'btn btn-default')); ?>
        </li>
    </ul>
    <?php echo $this->Form->end(); ?>
</div>
