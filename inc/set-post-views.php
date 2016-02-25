<?php
/**
 * Get and set post views
 *
 * This little improvement  will enable you to display how many times a post has been viewed in total. 
 * The total views are displayed in entry meta of each post.
 */
 
if ( !function_exists( 'uix_portfolio_get_post_views' ) ) {
	function uix_portfolio_get_post_views ($post_id) {
		$count_key = 'uix_portfolio_post_views';
		$count = get_post_meta($post_id,$count_key,true);
		if ($count == '' ) {
			delete_post_meta($post_id,$count_key);
			add_post_meta($post_id,$count_key,'0' );
			$count = '0';
		}
		return number_format_i18n($count);
	}

}

if ( !function_exists( 'uix_portfolio_set_post_views' ) ) {
	function uix_portfolio_set_post_views () {
		global $post;
		if ( get_the_ID() ){
			$post_id = get_the_ID();
			$count_key = 'uix_portfolio_post_views';
			$count = get_post_meta($post_id,$count_key,true);
			if (is_single() || is_page() ) {
				if ($count == '' ) {
					delete_post_meta($post_id,$count_key);
					add_post_meta($post_id,$count_key,'0' );
				} else {
					update_post_meta($post_id,$count_key,$count + 1);
				}
			}
	
		}
	}


}
add_action( 'get_header','uix_portfolio_set_post_views' );

