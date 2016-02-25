<?php
 
/**
 * Infinite scroll support
 *
 * Infinite scroll allows you automatically load new content into view when a reader approaches the bottom of the page. 
 * Note: The function will be used to .php file of theme when get_header() exist. The code could also be sought for header.php file.
 *
 * The .php file of theme contains the following standard code:
 
   add_action( 'wp_footer', 'uix_portfolio_infinite_scroll_init', 100 );
 
 */

		

if ( !function_exists( 'uix_portfolio_infinite_scroll_init' ) ) {
	
	function uix_portfolio_infinite_scroll_init() {
		
		
		$vars = '
		        var uix_po_inscrollbox             = "#uix-portfolio-infinite-scroll-content",
				    uix_po_inscrollloop            = ".infinite-scroll-list",
				    uix_po_inscrollNext            = ".pagination-infinitescroll",
					uix_po_inscrollNextActiveClass = "anim-move-waiting-stripes",
					uix_po_inscrollNextActiveTxt   = "'.__( 'Loading...', 'uix-portfolio' ).'",
					uix_po_inscrollNextDefaultTxt  = "'.__( 'Load More', 'uix-portfolio' ).'",
					uix_po_loadSpeed               = 300,
					uix_po_preventList             = false;

					';
					
					
		$masonrySCript = '';
		if ( get_theme_mod( 'custom_uix_portfolio_layout' ) == 'masonry' ) {
			$masonrySCript = "
			
				var masonryObj = $( '#uix-portfolio-masonry-gallery' );
			    masonryObj.append( result ).masonry( 'appended', result, true );
			
				
			
			";

		}
				
				
		$successActFun = '
					$( uix_po_inscrollbox ).append( result.fadeIn( uix_po_loadSpeed ) );
					$( uix_po_inscrollNext ).find( "a" ).removeClass( uix_po_inscrollNextActiveClass ).text( uix_po_inscrollNextDefaultTxt );
					if ( nextHref != undefined ) {
						$( uix_po_inscrollNext ).find( "a" ).attr( "href", nextHref );
					} else {
						$( uix_po_inscrollNext ).remove();
					}
					
			
					/*! 
					 *************************************
					 * Callback
					 *************************************
					 */	
					 '.$masonrySCript.'
					 


					 
		';			
				
				
		$successAct = '
		
		        var result = $( data ).find( uix_po_inscrollbox + " " + uix_po_inscrollloop ),
					nextHref = $( data ).find( uix_po_inscrollNext + " a" ).attr( "href" ),
					imgtotal = $( data ).find( uix_po_inscrollbox + " " + uix_po_inscrollloop + " img" ).length;
				
				
				if ( imgtotal > 0 ) {
					
					$( data ).find( uix_po_inscrollbox + " " + uix_po_inscrollloop + " img" ).load(function() {
						
						if( !--imgtotal ) {
								'.$successActFun.'
						}
	
					});

					
				} else {
					
					'.$successActFun.'
				}
				
				uix_po_preventList = false;
			
		';
		
		
		$autoJs = '
			<script>
			
			    '.$vars.'
			
				( function($) {
					"use strict";
					
						 $( window ).bind( "scroll", function() {
								
								if ( $( uix_po_inscrollNext ).css( "display" ) === "block" && uix_po_preventList === false ){
									
									if( $( window ).scrollTop() == $( document ).height() - $( window ).height() ){
										
										uix_po_preventList = true;
							
										$( uix_po_inscrollNext ).find( "a" ).addClass( uix_po_inscrollNextActiveClass ).text( uix_po_inscrollNextActiveTxt );
	
										$.ajax({
											type: "POST",
											url: $( uix_po_inscrollNext ).find( "a" ).attr( "href" ),
											success: function( data ) {
												
												'.$successAct.'
											}
										});
										
								
									}

								}
								
							});	

				
				} ) ( jQuery );


			</script>

		';


		$buttonJs = '
			<script>
			
			    '.$vars.'
			
				( function($) {
					"use strict";
						
					$( document ).ready( function() {
						
							$( uix_po_inscrollNext ).find( "a" ).live( "click", function() {
								
								if ( $( uix_po_inscrollNext ).css( "display" ) === "block" && uix_po_preventList === false ){
									
									uix_po_preventList = true;
									
									$( this ).addClass( uix_po_inscrollNextActiveClass ).text( uix_po_inscrollNextActiveTxt );
									
									$.ajax({
										type: "POST",
										url: $( this ).attr( "href" ),
										success: function( data ) {
	
											
											'.$successAct.'
											
											
										}
									});
									
								}
								
								return false;
								
								
							});

				
					} ); 
				
				} ) ( jQuery );

			
				
			</script>

		';
		
		
		//Determine if theres pagination
		$prev_link = get_previous_posts_link( '' );
		$next_link = get_next_posts_link( '' );
		if ( $prev_link == '' && $next_link == '' ) {
			$autoJs = '';
			$buttonJs = '';
		}
		

		//Output
		if ( !is_singular() ) {

			 if ( get_theme_mod( 'custom_uix_portfolio_infinitescroll_list', false ) ) {
				if ( get_theme_mod( 'custom_uix_portfolio_infinitescroll_eff', false ) ) {
					 //if true
					 echo $autoJs;
				} else {
					//if false
					echo $buttonJs;	
				}
	 
			 }
				 
	
		}
	}

}  

