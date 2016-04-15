<?php


/*
 * Custom Metaboxes and Fields
 *
 * Define the metabox and field configurations.
 * @param  array $meta_boxes
 * @return array
 *
 */
 
 
/*
 * Display the Correct Metabox at the Correct Time
 * 
 */

function uix_portfolio_metaboxes_display_script() {
	global $metaboxes;
	if ( get_post_type() == "uix-portfolio" ) :
		?>
		<script type="text/javascript">
		( function( $ ) {
		
			var formats = { 
				'post-format-video': 'uix-portfolio-meta-video-settings', 
				'post-format-gallery': 'gallery-metabox',
				
				
			};
			var ids = '#uix-portfolio-meta-video-settings,#gallery-metabox';
			
			function displayMetaboxes() {
				// Hide all post format metaboxes
				$(ids).hide();
				// Get current post format
				var selectedElt = $("input[name='post_format']:checked").attr("id");
 
				// If exists, fade in current post format metabox
				if ( formats[selectedElt] )
					$("#" + formats[selectedElt]).fadeIn();
			}
 
			$(function() {
				// Show/hide metaboxes on page load
				displayMetaboxes();
 
				// Show/hide metaboxes on change event
				$("input[name='post_format']").change(function() {
					displayMetaboxes();
				});
			});
		
		} )( jQuery );
		</script>
		<?php
	endif;
}		

add_action( 'admin_print_scripts', 'uix_portfolio_metaboxes_display_script', 1000 );
 
 
function uix_portfolio_metaboxes( array $meta_boxes ) {


	// Portfolio
	$meta_boxes[] = array(
		'id'			=> 'uix-portfolio-meta-video-settings',
		'title'			=> __( 'Video Settings', 'uix-portfolio' ),
		'pages'			=> array( 'uix-portfolio' ),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'show_names'	=> true,
		'fields'		=> array(
			array(
				'name'	=> __( 'Video URL', 'uix-portfolio' ),
				'desc'	=>  __( 'Enter in a video URL that is compatible with WordPress\'s built-in oEmbed feature. E.g.,https://www.youtube.com/watch?v=abc', 'uix-portfolio' ) .'',
				'id'	=> 'uix_portfolio_video',
				'type'	=> 'text',
				
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'uix_portfolio_metaboxes' );





/*
 * Custom Post Types
 *
 * WordPress can hold and display many different types of content. A single item of such a content is generally called a post, 
 * although post is also a specific post type. Internally, all the post types are stored in the same place, 
 * in the wp_posts database table, but are differentiated by a column called post_type.
 *
 */

//New custom post type 'Portfolio' 
require_once 'portfolio.php';









 