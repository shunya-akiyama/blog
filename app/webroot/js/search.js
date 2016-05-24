//検索窓の表示非表示
$(document).ready(function(){
  $("#search_form").after().hide();
  $("#search").click(function(){
    $("#search_form").slideToggle("slow");
  });
});

//モーダル
$(function(){
  var $group = $('.thumbnail-list > li');
  var $slide = $('.modal-set > li > img');
  var groupIndex = $slide.index(this);
  var length = $slide.length;
var $cur;
var i;
function cover(id){
  var imgobj = $("#" + id);
  $($slide).attr("src",imgobj.attr('href')).css({
    'left':Math.floor(($(window).width()) / 50) + '%',
    'top': Math.floor(($(window).height()) / 50) + '%'
  }).show();
}
//モーダル表示
  $('a.thumbnail').click(function(e){
  e.preventDefault();
  $cur = $(this).attr('id');
  console.log($cur);
  $('#cover').fadeIn();
//cover($(this));
  cover($cur);
/*
    $('#prev,#next').click(function(e){
      e.preventDefault();
      var tmp = ($cur[3] + 1)%6 + 1;
      $cur = "img" + tmp;
      console.log($cur);
      cover($cur);
    })
    */

    $('#next').click(function(e){
      e.preventDefault();
      /*
      $(this).attr('href',$cur);
console.log($(this).attr('href',''));
*/
        e.preventDefault();
        var tmp = (Number($cur[3]) + 1)%length;
        $cur = "img" + tmp;
        console.log($cur);
        cover($cur);
    })

    $('#prev').click(function(e){
      e.preventDefault();
      var tmp = (Number($cur[3]) - 1 +length)%length;
      $cur = "img" + tmp;
      console.log($cur);
      cover($cur);
    })
  });

//モーダル閉じ
$('#close').bind('click',function(e){
  $('#cover').fadeOut();
});
});
