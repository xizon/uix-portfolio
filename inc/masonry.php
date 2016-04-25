<?php
 
/**
 * Masonry support
 *
 * Note: The function will be used to .php file of theme when get_header() exist. The code could also be sought for header.php file.
 *
 * The .php file of theme contains the following standard code:
 
   add_action( 'wp_footer', 'uix_portfolio_masonry_init', 100 );
 
 */



if ( !function_exists( 'uix_portfolio_masonry_init' ) ) {
	
	function uix_portfolio_masonry_init() {
	
	    echo "
		<script>
		( function($) {
			'use strict';
				
			
			$( function() {
				
				/*! 
				 * ************************************
				 * Initialize Portfolio Masonry
				 *************************************
				 */
				var masonryObj = $( '#uix-portfolio-masonry-gallery' );
				
				masonryObj.waitForImages(function() {
				  masonryObj.masonry({
					itemSelector: '.portfolio-item'
				  });
				}); 
			
			
			} ); 
		
			
			
		} ) ( jQuery );
		</script>
		";	
	
	
	}

}  

