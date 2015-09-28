// Go to top scrolling button

		$(document).ready(function() {
			// Show or hide the sticky footer button
			//Keep track of last scroll
			var lastScroll = 0;
			$(window).scroll(function(event){
				//Sets the current scroll position
				var st = $(this).scrollTop();
				//Determines up-or-down scrolling
				if (st > lastScroll){
					//Replace this with your function call for downward-scrolling
					$('.GoTopButton').fadeOut(500);
				}
				else {
					//Replace this with your function call for upward-scrolling
					$('.GoTopButton').fadeIn(500);
				}
				//Updates scroll position
				lastScroll = st;
				if (st == 0) {
					$('.GoTopButton').fadeOut(500);//code
				}
			});
			
			// Animate the scroll to top
			$('.GoTopButton').click(function(event) {
				event.preventDefault();
				
				$('html, body').animate({scrollTop: 0}, 700);
			})
			$('.GoTopSpeakersButton').click(function(event) {
				event.preventDefault();
				
				$('html, body').animate({scrollTop: 0}, 700);
			})			
		});
