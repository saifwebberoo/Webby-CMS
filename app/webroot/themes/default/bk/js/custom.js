$(function(){
	$("div.carousel").carousel( { 
	dispItems: 3, 
	autoSlide: true,
	autoSlideInterval: 3000 //,
	//animSpeed: "slow"
	} );
});
		
		
$(document).ready(function() {
		var interval;
		
		$('ul#myRoundabout')
			.roundabout({
				reflect: true,
				startingChild:0, // the third box, so: 0, 1, *2*
				shape: 'square'
			})
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
		 