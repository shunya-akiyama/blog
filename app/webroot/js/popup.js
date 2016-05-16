f//スライド
/*
$(function(){
var $group = $('#image-wrap>li>a');
var groupIndex = $group.index(this);
var length = $group.length;
var width = $(window).width();
var height = $(window).height();
var top = $(window).scrollTop();
var $modalBg = $('<div id="modalBg">');
var $modal = $(
  '<div id="modal">'+
  '<ul id="navi">'+
  '<li id="modalnext"><a href="#next" id="next">></a></li>'+
  '<li id="modalprev"><a href="#prev"><</a></li>'+
  '</ul>'+
  '<p id="image"><i id="loading" class="fa fa-spinner" aria-hidden="true"></i></p>'+
  '</div>'
);
var image =$('<img src="'+$(this).attr('href')+'">');
	$group.click(function(e){
    $('html body').addClass('modal-active')
      if(!e.isDefaultPrevented()){
        e.preventDefault();
      }
      $modalBg
      .hide()
      .width(width)
      .height(height)
      .css({top:top})
      .appendTo('body')
      .fadeTo(200,0.5)
      .click(function(e){
        $('html,body')
        .removeClass('modal-active')
        $modalBg
        .fadeOut(300,function(){
          $modalBg.remove();
        })
        $modal
        .fadeOut(200,
          function(){
          $modal.remove();
        })
      });
      $modal
      .hide()
      .width(500)
      .height(500)
      .css({
        top:top+(height- 500)/2+'px',
        left:(width-500)/2+'px'
      })
        .appendTo('body')
        .fadeTo(300,1.0);

      $modal.load(function(e){
      $('#loading')
      .hide();
      $(this)
          .apendTo('#navi')
          .fadeIn(1000);
       $modal
          .width($(this).width())
          .height($(this).height())
          .css({
            top:top+(height-$(this).height())/2+'px',
            left:(width-$(this).width())/2+'px'
          });
            $('#navi')
            .width($modal.width());
          });


        $('#modalprev>a,#modalnext>a')
    		  .click(function(ee){
    				if(!ee.isDefaultPrevented()){
    					ee.preventDefault();
    				}

    				return false;
    			});
          $('#loading').show().css({
            top:($modal.height()-$('#loading').height())/2+'px',
            left:($modal.width()-$('#loading').width())/2+'px',
          })
    	if($('this').attr('href')=='#next'){
    		if(groupIndex+1<length){
    			groupIndex++;
    		}else{
    			groupIndex =0;
    		}
    	}else{
    		if(groupIndex-1>=0){
    			groupIndex--;
    		}else{
    			groupIndex=length-1;
    		}
    	}
    	$('#currentImage')
      .hide()
      .attr({src:$group.filter(':eq('+groupIndex+')')
      .attr('href')
    });

      });

      return false;
    });
*/
