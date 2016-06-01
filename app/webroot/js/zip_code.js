$(function(){
  $("#ZipnumberZipForm").submit(function(){
    $.post('/zipnumbers/zipCode',{
      zip: $("#ZipnumberZip").val()
    },function(rs){
      $("#pref").prepend(rs);
      $("#Zipnumberprefecture").val('').focus();
    });
  });
});
