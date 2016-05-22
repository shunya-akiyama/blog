<?php echo $this->Html->tag('h1',$post['Post']['title']); ?>
<?php echo $this->Html->para('','Created:'.$post['Post']['created']); ?>
<?php echo $this->Html->para('',$post['Category']['category'],array('class'=>'fa fa-flag')); ?>
<?php
$i=0;
if($i < 5);
$i++;
 ?>
 <?php foreach ($post['Tag'] as $tag["Tag"]): ?>

<?php echo $this->Html->para('',$tag['Tag']['tag'],array('class'=>'fa fa-tags')); ?>
 <?php endforeach; ?>

<div class="modal-wrap" id="image-wrap">
  <ul class="modal-set">
<?php foreach ($post['Image'] as $row["Image"]): ?>
<?php
 $base = $this->Html->url("/files/image/");//自宅環境ではこの記述で動かなかったので一旦外し、下記にパスを直接入れた。
    if($row["Image"]["dir"] > 0) {
      echo $this->Html->tag('li',
      $this->Html->link($this->Html->image("/files/image/attachment/"."/".$row["Image"]["dir"]."/".$row["Image"]["attachment"],array('class'=>'img-responsive')),"/files/image/attachment/"."/".$row["Image"]["dir"]."/".$row["Image"]["attachment"],array('escape'=>false)),
      array('class'=>'img-thumbnail'));

  /*   echo $this->Html->div('',$this->Html->image("/files/image/attachment/"."/".$row["Image"]["dir"]."/".$row["Image"]["attachment"],
     array('class'=>'img-responsive　popup-image')),array('id'=>'dummy'));*/
    }
  ?>
<?php endforeach; ?>
</ul>


</div>

</div>
 <p><?php echo nl2br(h($post['Post']['body'])); ?></p>
 <div id="cover">
	 <ul class="modal-set">
	 <?php foreach ($post['Image'] as $row["Image"]): ?>
	 <?php
	 $base = $this->Html->url("/files/image/");//自宅環境ではこの記述で動かなかったので一旦外し、下記にパスを直接入れた。
	 	if($row["Image"]["dir"] > 0) {
	 	 echo $this->Html->div('',$this->Html->image("/files/image/attachment/"."/".$row["Image"]["dir"]."/".$row["Image"]["attachment"],
	 	 array('class'=>'img-responsive　popup-image')),array('id'=>'dummy'));
	 	}
	 ?>
	 <?php endforeach; ?>
	 </ul>
   <div id="navi">
     <a href="" id="prev">&lt;</a>
     <a href="" id="next">&gt;</a>
     <a href="#" id="close">X</a>
   </div>
 </div>
