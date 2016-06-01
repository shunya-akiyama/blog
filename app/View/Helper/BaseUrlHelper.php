<?php
class UrlHelper extends AppHelper{
  App::uses('AppHelper','View/Helper');
  public function baseUrl($base){
      $base = $this->Html->url("/files/image/");

  }
}
 ?>
