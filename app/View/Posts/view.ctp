<?php echo $this->Html->div('container') ?>
<?php echo $this->Html->div('row col-xs-12 col-md-12 col-lg-12 content') ?>
<?php echo $this->Html->tag('h1',$post['Post']['title']); ?>
<?php echo $this->Html->para('','Created:'.$post['Post']['created']); ?>
<?php echo $this->Html->para('',$post['Category']['category']); ?>
<?php echo $this->Html->para('',$post['Tag'][0]['tag']); ?>
<div class="modal-wrap" id="image-wrap">
  <ul class="modal-set">
<?php foreach ($post['Image'] as $post["Image"]): ?>

  <?php
  $base = $this->Html->url("/files/image/");//自宅環境ではこの記述で動かなかったので一旦外し、下記にパスを直接入れた。
    if($post["Image"]["dir"] > 0) {
      echo $this->Html->tag('li',
      $this->Html->image($base."attachment/"."/".$post["Image"]["dir"]."/".$post["Image"]["attachment"],
      array('class'=>'img-responsive popup-image','url'=>$base."attachment"."/".$post["Image"]["dir"]."/".$post["Image"]["attachment"])),
      array('class'=>'image','id'=>'pic'));
    }
/*
,
array('class'=>'image'),array('id'=>$id.$i)

echo $this->Html->div('',
$this->Html->link($this->Html->image($base."attachment/"."/".$post["Image"]["dir"]."/".$post["Image"]["attachment"],
array('id'=>$id,'class'=>'slide')),$base."attachment/"."/".$post["Image"]["dir"]."/".$post["Image"]["attachment"],
array('class'=>'image modal'.$i,'escape'=>false)),array('id'=>'modal'.$i,'class'=>'slider'));

*/
  ?>
<?php endforeach; ?>
  </ul>
</div>
 <p><?php echo nl2br(h($post['Post']['body'])); ?></p>
 <div id="cover">
   <div id="navi">
     <a href="" id="prev"><</a>
     <a href="" id="next">></a>
     <a href="#" id="close">X</a>
   </div>
 </div>
