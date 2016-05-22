<h1>一覧</h1>
<ul class="col-xs-8 col-md-8 col-lg-8">
<?php foreach ($posts as $post): ?>
  <li>
		<p><?php echo h($post['Post']['created']); ?></p>
    <h2><?php echo $this->Html->link($post['Post']['title'],
    array('controller'=>'posts', 'action'=>'view', $post['Post']['id'])); ?>
	</h2>
  <?php echo $this->Html->para('',$post['Category']['category'],array('class'=>'fa fa-flag')); ?>
	<p>
     <?php foreach ($post['Tag'] as $post["Tag"]): ?>
    <?php echo $this->Html->para('',$post['Tag']['tag'],array('class'=>'fa fa-tags')); ?>
     <?php endforeach; ?>

	</p>
  </li>
<?php endforeach; ?>
</ul>
<p class="col-xs-4 col-md-4 col-lg-4">
<?php echo $this->html->link('住所検索はこちら',array('controller'=>'zipnumbers','action'=>'zip')); ?>
</p>

<ul class="paging col-xs-12 col-md-12 col-lg-12">
  <li><?php echo $this->Paginator->prev('Prev',array('class'=>'btn btn-default'),array()); ?></li>
<li><?php
    echo $this->Paginator->counter(array(
        'format' => __('{:page}/{:pages}ページを表示')
    ));
  ?></li>
  <li><?php echo $this->Paginator->next('Next',array('tag'=>'p','class'=>'btn btn-default')); ?></li>
</ul>

<p class="col-xs-12 col-md-12 col-lg-12">
  <?php echo $this->Html->link('Loginはこちら',array('controller'=>'users','action'=>'login')); ?>
</p>
