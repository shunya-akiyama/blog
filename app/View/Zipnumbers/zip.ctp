<?php echo $this->Form->create('Zipnumbers'); ?>
<div class="col-xs-4 col-md-4 form-group input-group">
<p class="input-group-addon">住所検索</p>
<?php echo $this->Form->input('zip',array('class'=>'form-control','label'=>false,'placeholder'=>'郵便番号を入力してください')); ?>
</div>
<?php
echo $this->Form->submit('送信',array('id'=>'zipsubmit','class'=>'btn btn-default'));?>

<?php
echo $this->Form->end();
 ?>
 <div class="col-xs-4 col-md-4 input-group">
 <p class="input-group-addon">
   検索結果
 </p>
 <?php echo $this->Form->input('',array('class'=>'form-control form-group','placeholder'=>'住所','id'=>'answer')); ?>
 </div>




 <?php $this->Html->scriptStart(array('inline'=>false)); ?>
  $(document).ready(function(){

    $('#zipsubmit').click(function(){
      $.ajax({
        type:'POST',
        url:'http://blog.dev/zipnumbers/zipCode',
        data: $('#ZipnumbersZipForm').serializeArray(),
        success: function(data, textStatus, jqXHR){
          $('#answer').val(data);
        },
        error: function(data, textStatus, jqXHR){

        }
      });
    });

    $('#ZipnumbersZipForm').submit(function(e){
      e.preventDefault();
    })

  });
 <?php $this->Html->scriptEnd(); ?>
