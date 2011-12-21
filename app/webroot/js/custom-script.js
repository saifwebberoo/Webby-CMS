$(document).ready(function () {
	//if($('#banner').length){
	//	$('#banner').blinds();
	//}
	// find all the input elements with title attributes
	$('input[title!=""], textarea[title!=""]').hint();
	
	
	if($('.accordion-toggle').length>0){
		createAccordion();
	}
	
	
	/*
	 * Member Profile Silders And Accordion
	 */
	if($('.slidingbox').length>0){
		makeSlider();
		createCustAccordion('caccordion');
	}
});

function createCustAccordion(className){
	AccordionClass = className;
	TabCount = 0;
	$('.'+AccordionClass).each(function(){
		$(this).attr('id','tab_accordion_'+ (TabCount++));
		$(this).click(function() {
			if(!$(this).hasClass('active')){
				 curAccordionId = $(this).attr('id');
				$('.'+AccordionClass).each(function(){
					if(curAccordionId !=$(this).attr('id')){ 
						$('.'+AccordionClass).removeClass('active');
						$('.'+AccordionClass).next('.box-content').slideUp('slow', function() {});
					}
				  });
				$('#'+curAccordionId).addClass('active');
				$('#'+curAccordionId).next('.box-content').slideDown('slow', function() {
					
				});
			}
		});
	});
}


function createAccordion(){
	$('.accordion-toggle').each(function(){
		$(this).click(function() {
			if(!$(this).hasClass('active')){
				 curAccordionId = $(this).attr('id');
				$('.accordion-toggle').each(function(){
					if(curAccordionId !=$(this).attr('id')){ 
						$('.accordion-toggle').removeClass('active');
						$('.accordion-toggle').next('.box-content').slideUp('slow', function() {});
					}
				  });
				$('#'+curAccordionId).addClass('active');
				$('#'+curAccordionId).next('.box-content').slideDown('slow', function() {
					
				});
			}
		});
	});
}

/* Banner Script
------------------------------------------------------------------*/
(function($){

	$.fn.blinds = function (options) {
		
		$(this).append('<div id="banner-nav"></div>');
		$(this).find('div.banner').hide();
		
		$(this).find('div.banner').each(function (i, e) {
			$(this).attr('id','banner_'+(i+1));
		});
		
		
		var banners_count = $(this).find('div.banner').length;
		var links = '';
		for(i=1;i<=banners_count;i++){
			links +='<a id="banner-nav-'+i+'" href="#" onclick="$(\'#banner\').blinds_change('+i+'); return false;"></a>'; //'+i+'
		}
		$('#banner-nav').html(links);
		$('#banner').blinds_change(1);
		
		
		autoBannerRotate = true;
		setInterval(function() {
			if(autoBannerRotate)
				$('#banner').blinds_change('-1');
		}, 6000);
		
	}
	
	$.fn.blinds_change = function (img_index) {

		$pre_obj = $(this).find('div.banner:visible');
		
		$pre_obj.animate({
			  marginLeft: parseInt($pre_obj.css('marginLeft'),10) == 0 ?
				-$pre_obj.outerWidth() :
				0
			},{
			duration:  'slow', // how fast we are animating
			easing: 'swing', // the type of easing
			complete: function() { // the callback
			  $pre_obj.hide();
			}
		});
		
		var showobj;
		var showobj_link;
		
		if(img_index==-1){
			var nextObj = $pre_obj.next();
			if(nextObj.attr('id')=='banner-nav'){
				img_index=1;
				showobj = $('#banner_'+img_index);
				showobj_link = $('#banner-nav-'+img_index);
			}else{
				showobj = nextObj;
				var sub_index = showobj.attr('id').split('_');
				showobj_link = $('#banner-nav-'+sub_index[1]);
			}
		}else{
			autoBannerRotate = false;
			showobj = $('#banner_'+img_index);
			showobj_link = $('#banner-nav-'+img_index);
		}

		showobj.show().css({marginLeft:showobj.outerWidth()});
		showobj.animate({
			  marginLeft: parseInt(showobj.css('marginLeft'),10) == 0 ?
				showobj.outerWidth() :
				0
			},{
			duration: 'slow', // how fast we are animating
			easing: 'swing', // the type of easing
			complete: function() { // the callback
			   // alert('done');
			}
		});
		
		$(this).find('#banner-nav a').each(function (i, e) {
			$(this).removeClass('active');
		});		
		showobj_link.addClass('active');
	}
	
})(jQuery);



/* jQuery clear focus function (hinting)
------------------------------------------------------------------*/

(function ($) {

$.fn.hint = function (blurClass) {
  if (!blurClass) { 
    blurClass = 'blur';
  }
    
  return this.each(function () {
    // get jQuery version of 'this'
    var $input = $(this),
    
    // capture the rest of the variable to allow for reuse
      title = $input.attr('title'),
      $form = $(this.form),
      $win = $(window);

    function remove() {
      if ($input.val() === title && $input.hasClass(blurClass)) {
        $input.val('').removeClass(blurClass);
      }
    }

    // only apply logic if the element has the attribute
    if (title) { 
      // on blur, set value to title attr if text is blank
      $input.blur(function () {
        if (this.value === '') {
          $input.val(title).addClass(blurClass);
        }
      }).focus(remove).blur(); // now change all inputs to title
      
      // clear the pre-defined text when form is submitted
      $form.submit(remove);
      $win.unload(remove); // handles Firefox's autocomplete
    }
  });
};

})(jQuery);



/* Make Divs Equal Height
 **************************************************/ 
 /*
$(function(){
	var H = 0;
	$("div.equ-height").each(function(i){
		var h = $("div.equ-height").eq(i).height();
		if(h > H) H = h;
	});
	$("div.equ-height").height(H);
});
var int=self.setInterval("makeheightequal()",1000);
*/
function makeheightequal(){

	$("div.equ-height").removeAttr('style'); /*.css({height:'auto'});*/
	var H = 0;
	$("div.equ-height").each(function(i){
		var h = $("div.equ-height").eq(i).height();
		if(h > H) H = h;
	});
	$("div.equ-height").height(H);
}




/* Facebook Like Form Slider */
function makeSlider(){
	
	$('.slidingbox').each(function(){
		$(this).children('.info-box').css('height',$(this).css('height'));
		$(this).children('.form-box').css('height',$(this).css('height')).css('marginTop',$(this).css('height'));
	});
	
	$(".slidingbox .info-box").click(function() {

		$(this).animate({
			  marginTop: parseInt($(this).css('marginTop'),10) == 0 ?
				-$(this).outerHeight() :
				0
			},{
			duration: 'slow', // how fast we are animating
			easing: 'swing', // the type of easing
			complete: function() { // the callback
			   // alert('done');
			}
		});
		

		$(this).next().animate({
			  marginTop: parseInt($(this).next().css('marginTop'),10) == $(this).outerHeight() ?
				0 :
				$(this).outerHeight()
			},{
			duration: 'slow', // how fast we are animating
			easing: 'swing', // the type of easing
			complete: function() { // the callback
			   // alert('done');
			}
		});
		
	});

	
	$(".slide-edit").click(function() {
		var infoDiv = $(this).parent('.box-head').next().children('.info-box');
		infoDiv.animate({
			  marginTop: parseInt(infoDiv.css('marginTop'),10) == 0 ?
				-infoDiv.outerHeight() :
				0
			},{
			duration: 'slow', // how fast we are animating
			easing: 'swing', // the type of easing
			complete: function() { // the callback
			   // alert('done');
			}
		});
		

		infoDiv.next().animate({
			  marginTop: parseInt(infoDiv.next().css('marginTop'),10) == infoDiv.outerHeight() ?
				0 :
				infoDiv.outerHeight()
			},{
			duration: 'slow', // how fast we are animating
			easing: 'swing', // the type of easing
			complete: function() { // the callback
			   // alert('done');
			}
		});
		
	});
	
	
	$('.save, .cancel').click(function() {
		$form_box = $(this).parent('.box .form-box');
		$form_box.animate({
			  marginTop: parseInt($form_box.css('marginTop'),10) == 0 ?
				$form_box.outerHeight() :
				0
			},{
			duration: 'slow', // how fast we are animating
			easing: 'swing', // the type of easing
			complete: function() { // the callback
			   // alert('done');
			}
		});
		

		$form_box.prev().animate({
			  marginTop: parseInt($form_box.prev().css('marginTop'),10) == -$form_box.prev().outerHeight() ?
				0:$form_box.prev().outerHeight()
				
			},{
			duration: 'slow', // how fast we are animating
			easing: 'swing', // the type of easing
			complete: function() { // the callback
			   // alert('done');
			}
		});
	});
}


function closeSilder(eleId,div_id,url) {
	$form_box = $('#'+eleId).parent('.box .form-box');
	$form_box.animate({
		  marginTop: parseInt($form_box.css('marginTop'),10) == 0 ?
			$form_box.outerHeight() :
			0
		},{
		duration: 'slow', // how fast we are animating
		easing: 'swing', // the type of easing
		complete: function() { // the callback
		   // alert('done');
		}
	});
	

	$form_box.prev().animate({
		  marginTop: parseInt($form_box.prev().css('marginTop'),10) == -$form_box.prev().outerHeight() ?
			0:$form_box.prev().outerHeight()
			
		},{
		duration: 'slow', // how fast we are animating
		easing: 'swing', // the type of easing
		complete: function() { // the callback
		   // alert('done');
		}
	});
	reloadWidget(div_id,url);
}
function reloadWidget(div_id,url)
{
	$.ajax({
			url:url,
			success:function(result){
				$("#"+div_id).html(result);
			},
			beforeSend:function (XMLHttpRequest) {
				$('#'+div_id).html('<img src="/img/loading.gif" alt="Loading" />');
			}				
		});	
		
}