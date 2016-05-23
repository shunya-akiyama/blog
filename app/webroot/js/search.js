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
    $('#prev,#next').click(function(e){
      e.preventDefault();
      i = 4;
      //console.log($cur[3]);
      var tmp = ($cur[3] + 1)%6 + 1;
      $cur = "img" + tmp;
      cover($cur);
      //cover("img3");
      //$('#next').attr('href', "img"+i);
      //$($slide).attr("src");
//console.log($($slide).attr("src"));
    })
  });

//モーダル閉じ
$('#close').bind('click',function(e){
  $('#cover').fadeOut();
});
});
