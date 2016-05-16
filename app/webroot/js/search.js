//検索窓の表示非表示
$(document).ready(function(){
  $("#search_form").after().hide();
  $("#search").click(function(){
    $("#search_form").slideToggle("slow");
  });
});

//モーダル
$(function(){

  var $group = $('#image-wrap>li>a');
  var groupIndex = $group.index(this);
  var length = $group.length;
  var width = $(window).width();
  var height = $(window).height();
  var top = $(window).scrollTop();
  var image = $('img').attr('id','current');

  $group.bind('click', function(e){
    e.preventDefault();
    $('#prev').css({
      'display':'inline-block',
      'position':'fixed',
      'width':'50px',
      'margin-top':'350px',
      'margin-left':'5%',
      'text-align':'left',
      'font-size':'50px',
      'color':'#ffffff'
    })
    $('#next').css({
      'display':'inline-block',
      'position':'fixed',
      'width':'50px',
      'margin-top':'350px',
      'margin-left':'85%',
      'text-align':'right',
      'font-size':'50px',
      'color':'#ffffff',
      'overflow':'hidden',
      'z-index':'100'
    })
    .fadeIn('slow');
    $('#close').css({
      'display':'inline-block',
      'position':'fixed',
      'width':'80px',
      'heghit':'30px',
      'font-size':'30px',
      'right':430,
      'top':120,
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
    'left':Math.floor(($(window).width() - 500) /30) + '%',
    'top': 150 + 'px',
    'z-index':'100'
  })
  .find('img').attr('src', $(this).attr('href')).end()
  .fadeIn();
  $('#prev,#next').bind('click',function(e){
    if($(this).attr('href')=='#next'){
      if(groupIndex + 1 > length){
        groupIndex++;
      }else{
        groupIndex = 0;
      }
    }else{
      if(groupIndex - 1 >= 0){
        groupIndex--;
      }else{
        groupIndex=length - 1;
      }
    }
    e.preventDefault();
  $('#current').attr({src:$group.filter(':eq('+groupIndex+')')
  .attr('href')})
  })
    $('#pic').show()

  });
});
//モーダル閉じ
$('#close').bind('click',function(e){
  $('#pic').css({
    'position':'absolute',
    'left':0,
    'top': 0 ,
    'overflow':'hidden',
    'display':'block'
  })
  $('#cover').fadeOut();
});
