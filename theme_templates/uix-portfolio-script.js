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
		 
		/*! 
		 * ************************************
		 * Fixed height for post list
		 *************************************
		 */
		 
		 imagesLoaded( '.uix-portfolio-tiles:not(.uix-portfolio-masonry-gallery)' ).on( 'always', function() {
			 
			var th = $( '.uix-portfolio-tiles .item .image img:first' ).height();
		
			if ( th > 0 ) {
				$( '.uix-portfolio-tiles .item-video > .image' ).each( function() {	
				    //Check if element exists in .item-video 
					if ( $( this ).find( 'iframe' ).length > 0 ) $( this ).css( 'height', th + 'px' );
				});
	
			}
			
			//filterable
			$( '#uix-portfolio-cat-list-filter li:first a' ).trigger( 'click' ); 
			
			
		});
		
		
		/*! 
		*************************************
		* Retina graphics for your website
		*************************************
		*/
		//Determine if you have retinal display
		var uix_portfolio_hasRetina = false,
			uix_portfolio_rootRetina = (typeof exports === 'undefined' ? window : exports),
			uix_portfolio_mediaQuery = '(-webkit-min-device-pixel-ratio: 1.5), (min--moz-device-pixel-ratio: 1.5), (-o-min-device-pixel-ratio: 3/2), (min-resolution: 1.5dppx)';
		
		if ( uix_portfolio_rootRetina.devicePixelRatio > 1 || uix_portfolio_rootRetina.matchMedia && uix_portfolio_rootRetina.matchMedia( uix_portfolio_mediaQuery ).matches ) {
			uix_portfolio_hasRetina = true;
		} 
		
		if ( uix_portfolio_hasRetina ) {
			//do something
			$( '[data-uix-portfolio-retina]' ).each( function() {
		
				$( this ).attr( {
					'src'     : $( this ).attr( 'data-uix-portfolio-retina' ),
				} );
		
			});
		
		} 
		
	
	} ); 

	
	
} ) ( jQuery );