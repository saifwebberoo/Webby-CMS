$(function(){
	$("div.carousel").carousel( { 
	dispItems: 3, 
	autoSlide: true,
	autoSlideInterval: 3000 //,
	//animSpeed: "slow"
	} );
});
$(document).ready(function() {
	
	/* Top Navigation Current URL Selection Start */
	if($('#top-right-nav li a.active').length == 0){
		$('#top-right-nav li a').each(function(){
			if($(this).attr('href') == window.location.pathname){
				$(this).addClass('active');
			}
		});
	}
	/* Top Navigation Current URL Selection End */
});
/*		
$(document).ready(function() {
		var interval;
		
		$('ul#myRoundabout')
			.roundabout({
				reflect: false,
				//startingChild:3, // the third box, so: 0, 1, *2*
				shape: 'square',
				minOpacity: -0.1,
				minScale: .015, 
				clickToFocus: true
			});
		$('ul#myRoundabout')
			.hover(
				function() {
					// oh no, it's the cops!
					clearInterval(interval);
				},
				function() {
					// false alarm: PARTY!
					interval = startAutoPlay();
				}
			);
		
		// let's get this party started
		interval = startAutoPlay();
	});
	
	function startAutoPlay() {
		return setInterval(function() {
			$('ul#myRoundabout').roundabout_animateToNextChild();
		}, 3000);
	}
*/		 