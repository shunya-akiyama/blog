//検索窓の表示非表示
$(document).ready(function(){
  $("#search_form").after().hide();
  $("#search").click(function(){
    $("#search_form").slideToggle("slow");
  });
});

//モーダル
$(function(){
  var $group = $('#image-wrap>.modal-set>li>a');
  var tmp = $('#image-wrap>.modal-set>li>a>img');
  var groupIndex = $group.index(this);
  var length = $group.length;
  var width = $(window).width();
  var height = $(window).height();
  var top = $(window).scrollTop();
  var image = $('#dummy>img').attr('id','current');
  $($group).bind('click', function(e){
  e.preventDefault();
  tmp.each(function(f){
    if($(this).attr('src') == $(e.target).attr('src')){
      groupIndex = f;
    }
    });
    $('#next').fadeIn('slow');
    $('#current').attr({src:$group.filter(':eq('+ groupIndex + ')').attr('href')});
    $('#cover').css({
      'width':$(window).width(),
      'height':$(window).height()
      }).fadeIn('slow');
    $('#current').css({
      'left':Math.floor(($(window).width()) / 50) + '%',
      'top': Math.floor(($(window).height()) / 55) + '%',
      }).fadeIn('slow');
  });

  $('#prev,#next').bind('click',function(e){
    e.preventDefault();
    if($(this).attr('id') == 'next'){
      if(groupIndex + 1 < length){
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
    $('#current').attr({src:$group.filter(':eq('+ groupIndex + ')')
    .attr('href')});
  });
});
//モーダル閉じ
$('#close').bind('click',function(e){
  $('#cover,#current').fadeOut()
});
