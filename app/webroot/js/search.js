$(document).ready(function(){
  $("#search_form").after().hide();
  $("#search").click(function(){
    $("#search_form").slideToggle("slow");
  });
});


 $('.modal-set li a').each(function(){
   $('<img>').attr('src',$(this).attr('href'));
 })
  $('.modal-set li a').bind('click', function(e){
    e.preventDefault();
    $('#prev').css({
      'display':'inline-block',
      'width':'50px',
       'margin-top':'300px',
       'margin-left':'5%',
     'text-align':'left',
       'font-size':'50px',
       'color':'#ffffff'
    })
    $('#next').css({
      'display':'inline-block',
      'width':'50px',
       'margin-top':'300px',
       'margin-left':'85%',
       'text-align':'right',
       'font-size':'50px',
       'color':'#ffffff'
    })
    $('#cover').css({
      'position':'absolute',
      'position':'fixed',
      'left':0,
      'top':0,
      'width':$(window).width(),
      'height':$(window).height()
    })
    .fadeIn('slow');
  $('#pic').css({
    'position':'absolute',
    'left':Math.floor(($(window).width() - 500) / 43) + '%',
    'top':$(window).scrollTop() + 30 + 'px',
    'z-index':'100'
  })
  .find('img').attr('src', $(this).attr('href')).end()
  .fadeIn();
  });

  $('#cover').bind('click', function(){
    $('#pic').fadeOut('slow',function(){
      $('#cover').hide();
    });
  });

$(function(){
  var i = 1;
  if($('.content').find('img')){
    $('img').each(function(){
      $(this).attr('id','wow'+(i++));
    });
  }else{
    $('.modal-wrap').remove();
  };

});
