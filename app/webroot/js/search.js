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
