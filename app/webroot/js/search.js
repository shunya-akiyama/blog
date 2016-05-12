//検索窓の表示非表示
$(document).ready(function(){
  $("#search_form").after().hide();
  $("#search").click(function(){
    $("#search_form").slideToggle("slow");
  });
});


//モーダル
 $('.modal-set li a').each(function(){
   $('<img>').attr('src',$(this).attr('href'));
 });

  $('.modal-set li a').bind('click', function(e){
    e.preventDefault();
    $('#prev').css({
      'display':'inline-block',
      'width':'50px',
       'margin-top':'350px',
       'margin-left':'5%',
     'text-align':'left',
       'font-size':'50px',
       'color':'#ffffff'
    })
    $('#next').css({
      'display':'inline-block',
      'width':'50px',
       'margin-top':'350px',
       'margin-left':'85%',
       'text-align':'right',
       'font-size':'50px',
       'color':'#ffffff',
       'overflow':'hidden'
    })
    $('#close').css({
      'display':'inline-block',
      'width':'80px',
      'heghit':'30px',

      'margin-left': '50%',
      'margin-top': '150px',
       'text-align':'center',
       'font-size':'30px',
       'color':'#ffffff'
    })
    $('#cover').css({
      'position':'fixed',
      'left':0,
      'top':0,
      'width':$(window).width(),
      'height':$(window).height()
    })
    .fadeIn('slow');
  $('#pic').css({
    'position':'fixed',
    'left':Math.floor(($(window).width() - 500) /35) + '%',
    'top':$(window).scrollTop() + 150 + 'px',
    'z-index':'100'
  })
  .find('img').attr('src', $(this).attr('href')).end()
  .fadeIn();
  });

//モーダル閉じ
  $('#close').bind('click', function(){
    $('#pic').fadeOut('slow',function(){
      $('#cover').hide();
    });
  });

//スライド
var counter = 0;
var total = 0;

  $('#image-wrap ul li').each(function(){
    $('#next').attr('href','#num'+(counter));
    $(this).find('img').attr('id','num'+(counter));
      counter++;

  });
