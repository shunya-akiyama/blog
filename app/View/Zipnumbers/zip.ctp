<?php
echo $this->Form->create('Zipnumbers');
echo $this->Form->input('zip');
echo $this->Form->submit('送信',array('id'=>'zipsubmit'));
echo $this->Form->end();
 ?>
<?php echo $this->Form->input('',array('id'=>'answer')); ?>
<p>
<?php
echo $aa['Zipnumber']['prefecture'].$aa['Zipnumber']['city'].$aa['Zipnumber']['town'];
?>
</p>
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
