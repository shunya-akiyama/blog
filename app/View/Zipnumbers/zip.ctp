<?php
echo $this->Form->create('Zipnumbers');
echo $this->Form->input('zip');
echo $this->Form->submit('送信',array('id'=>'zipsubmit'));
echo $this->Form->end();
 ?>
<?php echo $this->Form->input('',array('id'=>'answer')); ?>


 <?php $this->Html->scriptStart(array('inline'=>false)); ?>
  $(document).ready(function(){

    $('#zipsubmit').click(function(){
      $.ajax({
        type:'POST',
        url:'http://blog.dev/zipnumbers/zipCode',
        data: $('#ZipnumbersZipForm').serializeArray(),
        success: function(data, textStatus, jqXHR){
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
