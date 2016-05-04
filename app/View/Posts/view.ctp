<h1><?php echo h($post['Post']['title']); ?>:<?php echo h($post['Category']['category']); ?></h1>
<p>
  <small>Created:<?php echo $post['Post']['created']; ?></small>
</p>
  <?php echo h($post['Tag'][0]['tag']); ?>
</p>
<ul>
  <?php
  foreach ($post['Image'] as $post["Image"]): ?>
  <?php
  if ($post["Image"]["dir"] > 0) {
    $base = $this->Html->url("/files/image/");//自宅環境ではこの記述で動かなかったので一旦外し、下記にパスを直接入れた。
    echo '<li>'.$this->Html->image("/files/image/attachment/"."/".$post["Image"]["dir"]."/".$post["Image"]["attachment"]).'</li>';
  }
   ?>
<?php endforeach; ?>
</ul>
<p>
  <?php echo h($post['Post']['body']); ?>
</p>
