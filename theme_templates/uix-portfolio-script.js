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
		
	
	} ); 

	
	
} ) ( jQuery );