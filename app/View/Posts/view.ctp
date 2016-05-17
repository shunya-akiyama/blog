<?php echo $this->Html->div('container') ?>
<?php echo $this->Html->div('row col-xs-12 col-md-12 col-lg-12 content') ?>
<?php echo $this->Html->tag('h1',$post['Post']['title']); ?>
<?php echo $this->Html->para('','Created:'.$post['Post']['created']); ?>
<?php echo $this->Html->para('',$post['Category']['category'],array('class'=>'fa fa-flag')); ?>
<?php echo $this->Html->para('',$post['Tag'][0]['tag'],array('class'=>'fa fa-tags')); ?>
<div class="modal-wrap" id="image-wrap">
  <ul class="modal-set">
<?php foreach ($post['Image'] as $post["Image"]): ?>
<?php
 $base = $this->Html->url("/files/image/");//自宅環境ではこの記述で動かなかったので一旦外し、下記にパスを直接入れた。
    if($post["Image"]["dir"] > 0) {
      echo $this->Html->tag('li',
      $this->Html->link($this->Html->image($base."attachment/"."/".$post["Image"]["dir"]."/".$post["Image"]["attachment"],array('class'=>'img-responsive')),array($base."attachment/"."/".$post["Image"]["dir"]."/".$post["Image"]["attachment"]),array('escape'=>false)),
      array('class'=>'image'));


     echo $this->Html->div('',$this->Html->image($base."attachment/"."/".$post["Image"]["dir"]."/".$post["Image"]["attachment"],
     array('class'=>'popup-image')),array('id'=>'dummy'));
    }
  ?>
<?php endforeach; ?>
</ul>
</div>

</div>
 <p><?php echo nl2br(h($post['Post']['body'])); ?></p>
 <div id="cover">
   <div id="navi">
     <a href="" id="prev">&lt;</a>
     <a href="" id="next">&gt;</a>
     <a href="#" id="close">X</a>
   </div>
 </div>
