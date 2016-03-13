( function($) {
    'use strict';
		
	
	$( function() {
		

		/*! 
		 * ************************************
		 * FlexSlider
		 *************************************
		 */
		$( '#carousel' ).flexslider( {
			animation         : 'slide',
			slideshow         : true,
			smoothHeight      : true,
			controlNav        : true,
			directionNav      : true,
			prevText          : '<span class="fa fa-angle-left"></span>',
			nextText          : '<span class="fa fa-angle-right"></span>',
			controlsContainer : ".flexslider-container",
			start: function(slider) {
				slider.removeClass( 'flexslider-loading' );
			}

		} );
		
		
		/*! 
		 * ************************************
		 * prettyPhoto
		 *************************************
		 */
		 $( "a[rel^='uix-portfolio-prettyPhoto']" ).prettyPhoto({
			 animation_speed:'normal',
			 theme:'dark_rounded',
			 slideshow:3000,
			 utoplay_slideshow: false
		 });
		
		
	
	} ); 

	
	
} ) ( jQuery );
