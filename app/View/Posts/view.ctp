<?php echo $this->Html->div('container') ?>
<?php echo $this->Html->div('row col-xs-12 col-md-8') ?>
<?php echo $this->Html->tag('h1',$post['Post']['title']); ?>
<?php echo $this->Html->para('','Created:'.$post['Post']['created']); ?>
<?php echo $this->Html->para('',$post['Category']['category']); ?>
<?php echo $this->Html->para('',$post['Tag'][0]['tag']); ?>
<ul class="row" id ="modal">

  <?php
  $id='img';
  $i=1;
  if($i<=$img){
  }elseif($i>$img){
    break;
  }
  ?>
<?php foreach ($post['Image'] as $post["Image"]): ?>
  <?php
  $base = $this->Html->url("/files/image/");//自宅環境ではこの記述で動かなかったので一旦外し、下記にパスを直接入れた。
    if($post["Image"]["dir"] > 0) {
      echo $this->Html->div('col-xs-12 col-md-8',$this->Html->tag('li',$this->Html->image(
      $base."attachment/"."/".$post["Image"]["dir"]."/".$post["Image"]["attachment"],
      array('class'=>'img-responsive')),array('class'=>'image')),array('id'=>$id.$i));
      /*          echo $this->Html->tag('li',$this->Html->image(
          $base."attachment/"."/".$post["Image"]["dir"]."/".$post["Image"]["attachment"],
          array('class'=>'img-responsive')),
          array('class'=>'col-xs-12 col-md-8','id'=>$id.$i));
*/
      $i++;
    }
  ?>

<?php endforeach; ?>
</ul>
<?php echo nl2br(h($post['Post']['body'])); ?>
