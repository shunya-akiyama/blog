<?php echo $this->Html->div('container') ?>
<?php echo $this->Html->div('row col-xs-12 col-md-8') ?>
<?php echo $this->Html->tag('h1',$post['Post']['title']); ?>
<?php echo $this->Html->para('','Created:'.$post['Post']['created']); ?>
<?php echo $this->Html->para('',$post['Category']['category']); ?>
<?php echo $this->Html->para('',$post['Tag'][0]['tag']); ?>

<ul class="row">
<?php foreach ($post['Image'] as $post["Image"]): ?>
<?php
  if ($post["Image"]["dir"] > 0) {
    $base = $this->Html->url("/files/image/");//自宅環境ではこの記述で動かなかったので一旦外し、下記にパスを直接入れた。
    echo $this->Html->tag(
		'li',$this->Html->image(
		"/files/image/attachment/"."/".$post["Image"]["dir"]."/".$post["Image"]["attachment"],
array('class'=>'img-responsive')	),
array('class'=>'col-xs-12 col-md-8'));
  }
?>
<?php endforeach; ?>
</ul>
<?php echo $this->Html->para('col-xs-12 col-md-8',$post['Post']['body']); ?>
