<?php echo $this->Html->tag('h1',$post['Post']['title']); ?>
<?php echo $this->Html->para('','Created:'.$post['Post']['created']); ?>
<?php echo $this->Html->para('',$post['Category']['category'],array('class'=>'fa fa-flag')); ?>
<?php
$base = $this->Html->url("/files/image/attachment/");//自宅環境ではこの記述で動かなかったので一旦外し、下記にパスを直接入れた。
 ?>
 <?php foreach ($post['Tag'] as $tag["Tag"]): ?>

<?php echo $this->Html->para('',$tag['Tag']['tag'],array('class'=>'fa fa-tags')); ?>
 <?php endforeach; ?>

<div class="modal-wrap" id="image-wrap">
  <ul class="thumbnail-list">
    <?php
    $i=0;
    $j=count($post['Image']);
    if($i <= $j);
     ?>
<?php foreach ($post['Image'] as $row["Image"]): ?>
<?php
    if($row["Image"]["dir"] > 0) {
      echo $this->Html->tag('li',
      $this->Html->link($this->Html->image($base.$row["Image"]["dir"]."/".$row["Image"]["attachment"],
      array('class'=>'img-responsive')),$base.$row["Image"]["dir"]."/".$row["Image"]["attachment"],array('class'=>'thumbnail','id'=>'img'.$i,'escape'=>false)));
      $i++;
  /*   echo $this->Html->div('',$this->Html->image("/files/image/attachment/"."/".$row["Image"]["dir"]."/".$row["Image"]["attachment"],
     array('class'=>'img-responsive　popup-image')),array('id'=>'dummy'));*/
    }
  ?>
<?php endforeach; ?>
</ul>

<div id="cover">
  <div class="modal-inner">
    <ul class="modal-set">
    <?php foreach ($post['Image'] as $row["Image"]): ?>
    <?php
     if($row["Image"]["dir"] > 0) {
      echo $this->Html->tag('li',$this->Html->image($base.$row["Image"]["dir"]."/".$row["Image"]["attachment"],
      array('class'=>'img-responsive popup-image','id'=>'dummy')),array());
     }
    ?>
    <?php endforeach; ?>
    </ul>

  </div>
  <div id="navi">
    <a href="" id="prev">&lt;</a>
    <a href="" id="next">&gt;</a>
    <a href="#" id="close">X</a>
  </div>
</div>

</div>

</div>
 <p><?php echo nl2br(h($post['Post']['body'])); ?></p>
