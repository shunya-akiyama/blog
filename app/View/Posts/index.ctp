<h1>記事一覧</h1>
<ul class="col-xs-8 col-md-8 col-lg-8">
<?php foreach ($posts as $post): ?>
  <li>
    <h2><?php echo $this->Html->link($post['Post']['title'],
    array('controller'=>'posts', 'action'=>'view', $post['Post']['id'])); ?>
	</h2>
  <span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>
  <?php echo $this->Html->para('',$post['Category']['category']); ?>
	<p>
  <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
  <?php foreach ($post['Tag'] as $post["Tag"]): ?>
  <?php echo $this->Html->tag('',$post['Tag']['tag'],array('class'=>'tags')); ?>,
  <?php endforeach; ?>
  <p><?php echo h($post['Post']['created']); ?></p>
	</p>
  </li>
  <hr>
<?php endforeach; ?>
</ul>

<p class="col-xs-4 col-md-4 col-lg-4">
<?php echo $this->html->link('住所検索はこちら',array('controller'=>'zipnumbers','action'=>'zip'),array('class'=>'btn btn-info')); ?>
</p>
<ul class="paging col-xs-12 col-md-12 col-lg-12">
  <li><?php echo $this->Paginator->prev('Prev',array('tag'=>false,'class'=>'btn btn-default'),null,array()); ?></li>
  <li><?php echo $this->Paginator->numbers(array('class'=>'btn btn-default')); ?></li>
  <li><?php echo $this->Paginator->next('Next',array('tag'=>false,'class'=>'btn btn-default'),null,array()); ?></li>
</ul>

<p class="col-xs-12 col-md-12 col-lg-12">
  <?php echo $this->Html->link('Loginはこちら',array('controller'=>'users','action'=>'login')); ?>
</p>
