<?php
 
/**
 * Filterable support
 *
 * Note: The function will be used to .php file of theme when get_header() exist. The code could also be sought for header.php file.
 *
 * The .php file of theme contains the following standard code:
 
   add_action( 'wp_footer', 'uix_portfolio_filterable_init', 100 );
 
 */


if ( !function_exists( 'uix_portfolio_filterable_init' ) ) {
	
	function uix_portfolio_filterable_init() {
		
	    echo "
		<script>
		( function($) {
			'use strict';
				
			
			$( function() {
				

				/*! 
				 * ************************************
				 * Filterable
				 *************************************
				 */
				var filterBox = $( '#uix-portfolio-filter-stage' ),
					filterNav = $( '#uix-portfolio-cat-list-filter' ),
					filterItemSelector = '.portfolio-item';
				
				
				 filterBox.shuffle({
					itemSelector: filterItemSelector,
					speed: 550, // Transition/animation speed (milliseconds).
					easing: 'ease-out', // CSS easing function to use.
					sizer: null // Sizer element. Use an element to determine the size of columns and gutters.
				  });
				
				filterNav.find( 'li > a' ).unbind( 'click' ).click( function(){
					
					  var thisBtn = $( this ),
						  activeClass = 'current-cat',
						  isActive = thisBtn.hasClass( activeClass ),
						  group = isActive ? 'all' : thisBtn.data( 'group' );
				
					  // Hide current label, show current label in title
					  if ( !isActive ) {
						filterNav.find( '.' + activeClass ).removeClass( activeClass );
					  }
				
					  thisBtn.toggleClass( activeClass );
				
					  // Filter elements
					  filterBox.shuffle( 'shuffle', group );
					  
					  return false;
					  
					  
				} ); 
			
			
		
		
			} ); 
		
			
			
		} ) ( jQuery );
		</script>
		";	
	
	
	}

}  

