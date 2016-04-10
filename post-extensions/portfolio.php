<?php

/*
 * Removing a Meta Box
 * 
 */ 

function uix_portfolio_featured_image_column_remove_post_types( $post_types ) {
    foreach( $post_types as $key => $post_type ) {
        if ( 'uix-portfolio' === $post_type ) // Post type you'd like removed. Ex: 'post' or 'page'
            unset( $post_types[$key] );
    }
    return $post_types;
}

function uix_portfolio_featured_image_column_init() {
    add_filter( 'featured_image_column_post_types', 'uix_portfolio_featured_image_column_remove_post_types', 11 ); // Remove
}
add_action( 'featured_image_column_init', 'uix_portfolio_featured_image_column_init' );




/**
 * Registers the "Portfolio" custom post type
 *
 * @link	http://codex.wordpress.org/Function_Reference/register_post_type
 */
function uix_portfolio_taxonomy_register() {

	// Define post type args
	$args = array(
		'labels'			    => array(
			'name'                  => __( 'Uix Portfolio', 'uix-portfolio' ),
			'singular_name'         => __( 'Portfolio Item', 'uix-portfolio' ),
			'add_new'               => __( 'Add New Item', 'uix-portfolio' ),
			'add_new_item'          => __( 'Add New Portfolio Item', 'uix-portfolio' ),
			'edit_item'             => __( 'Edit Item', 'uix-portfolio' ),
			'new_item'              => __( 'Add New Item', 'uix-portfolio' ),
			'view_item'             => __( 'View Item', 'uix-portfolio' ),
			'search_items'          => __( 'Search Items', 'uix-portfolio' ),
			'not_found'             => __( 'No Items Found', 'uix-portfolio' ),
			'not_found_in_trash'    => __( 'No Items Found In Trash', 'uix-portfolio' ),
		),
        'public'            => true,  
        'show_ui'           => true,  
		'supports'			=> array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'post-formats' ),
		'capability_type'	=> 'post',
		'rewrite'			=> array(
		    /*
			 *
			 * Get the single page's permalink from the ID using "http://yoursite.com/portfolio-item/*"
			 *
			 */
			'slug'       => 'portfolio-item'
			
		),
		
		
		
		/*
		 *
		 * Post type archive page working
		 *
		 */
		'has_archive'		=> true,
		'menu_icon'			=> 'dashicons-portfolio',
	);
	
	// Apply filters for child theming
	$args = apply_filters( 'uix_portfolio_args', $args);

	// Register the post type
	register_post_type( 'uix-portfolio', $args );

	
	// Define portfolio category taxonomy args
	$args = array(
		'labels'			    => array(
			'name'                       => __( 'Categories', 'uix-portfolio' ),
			'singular_name'              => __( 'Category', 'uix-portfolio' ),
			'menu_name'                  => __( 'Categories', 'uix-portfolio' ),
			'search_items'               => __( 'Search','uix-portfolio' ),
			'popular_items'              => __( 'Popular', 'uix-portfolio' ),
			'all_items'                  => __( 'All', 'uix-portfolio' ),
			'parent_item'                => __( 'Parent', 'uix-portfolio' ),
			'parent_item_colon'          => __( 'Parent', 'uix-portfolio' ),
			'edit_item'                  => __( 'Edit', 'uix-portfolio' ),
			'update_item'                => __( 'Update', 'uix-portfolio' ),
			'add_new_item'               => __( 'Add New', 'uix-portfolio' ),
			'new_item_name'              => __( 'New', 'uix-portfolio' ),
			'separate_items_with_commas' => __( 'Separate with commas', 'uix-portfolio' ),
			'add_or_remove_items'        => __( 'Add or remove', 'uix-portfolio' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'uix-portfolio' ),
		),
		'public'			    => true,
		'show_in_nav_menus'	=> true,
		'show_ui'			=> true,
		'show_tagcloud'		=> true,
		'hierarchical'		=> true,
		'rewrite'			=> array( 
		    'slug'          => 'portfolio-category'
		),
		'query_var'			=> true
	);

	// Apply filters for child theming
	$args = apply_filters( 'uix_portfolio_category_args', $args );

	
	// Register the uix_portfolio_category taxonomy
	register_taxonomy( 'uix_portfolio_category', array( 'uix-portfolio' ), $args );
	
  
}

// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'uix_portfolio_taxonomy_register', 0 );


/**
 * Enable the gallery metabox for portfolio items
 *
 *
 *
 */
function uix_portfolio_taxonomy_gallery_metabox( $types ) {

	// Enable for portfolio
	$types[] = 'uix-portfolio';

	// Return types
	return $types;

}
add_filter( 'gallery_metabox_post_types', 'uix_portfolio_taxonomy_gallery_metabox' );




/**
 * Adds taxonomy filters to the portfolio admin page
 *
 *
 */
function uix_portfolio_taxonomy_tax_filters() {
	
	global $typenow;

	// An array of all the taxonomyies you want to display. Use the taxonomy name or slug
	$taxonomies = array( 'uix_portfolio_category' );

	// must set this to the post type you want the filter(s) displayed on
	if ( $typenow == 'uix-portfolio' ) {

		foreach ( $taxonomies as $tax_slug ) {
			$current_tax_slug = isset( $_GET[$tax_slug] ) ? $_GET[$tax_slug] : false;
			$tax_obj = get_taxonomy( $tax_slug );
			$tax_name = $tax_obj->labels->name;
			$terms = get_terms($tax_slug);
			if ( count( $terms ) > 0) {
				echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
				echo "<option value=''>$tax_name</option>";
				foreach ( $terms as $term ) {
					echo '<option value=' . $term->slug, $current_tax_slug == $term->slug ? ' selected="selected"' : '','>' . $term->name .' ( ' . $term->count .')</option>';
				}
				echo "</select>";
			}
		}
	}
}
add_action( 'restrict_manage_posts', 'uix_portfolio_taxonomy_tax_filters' );


/**
 *  Alter post formats based on custom post types
 *
 *
 *
 */
function uix_portfolio_taxonomy_adjust_formats() {
	if ( isset( $_GET['post'] ) ) {
		$post = get_post($_GET['post']);
		if ($post) {
			$post_type = $post->post_type;
		}
	} elseif ( ! isset( $_GET['post_type'] ) ) {
		$post_type = 'post';
	} elseif ( in_array( $_GET['post_type'], get_post_types( array('show_ui' => true ) ) ) ) {
		$post_type = $_GET['post_type'];
	} else {
		return; // Page is going to fail anyway
	}
	if ( 'uix-portfolio' == $post_type ) {
		add_theme_support( 'post-formats', array( 'video', 'gallery' ) );
	} 
}
add_action( 'load-post.php', 'uix_portfolio_taxonomy_adjust_formats' );
add_action( 'load-post-new.php', 'uix_portfolio_taxonomy_adjust_formats' );





/**
 * Adds columns in the admin view for thumbnail and taxonomies
 *
 *
 *
 */
function uix_portfolio_taxonomy_edit_cols( $columns ) {
	
	$columns = array(
		'cb' 		                   => $columns['cb'], 
		'uix-portfolio-thumbnail'      => __( 'Thumbnail', 'uix-portfolio' ),
		'title'                  	   => $columns['title'], 
		'uix-portfolio-category'       => __( 'Category', 'uix-portfolio' ),
		'author' 	                   => __('Author', 'uix-portfolio'),
		'date'                         => $columns['date']
		
	);
	
	return $columns;
}
add_filter( 'manage_edit-uix-portfolio_columns', 'uix_portfolio_taxonomy_edit_cols' );

/**
 * Adds columns in the admin view for thumbnail and taxonomies
 *
 * Display the meta_boxes in the column view
 */
function uix_portfolio_taxonomy_cols_display( $columns, $post_id ) {

	switch ( $columns ) {

		case "uix-portfolio-thumbnail":

			// Get post thumbnail ID
			$thumbnail_id = get_post_thumbnail_id();

			if ( $thumbnail_id ) {
				$thumb = wp_get_attachment_image( $thumbnail_id, array( '50', '50' ), true );
			}
			if ( isset( $thumb ) ) {
				echo $thumb;
			} else {
				echo '&mdash;';
			}

		break;	

		
		case "uix-portfolio-category":

			if ( $category_list = get_the_term_list( $post_id, 'uix_portfolio_category', '', ', ', '' ) ) {
				echo $category_list;
			} else {
				echo '&mdash;';
			}

		break;	

	}
}
add_action( 'manage_uix-portfolio_posts_custom_column', 'uix_portfolio_taxonomy_cols_display', 10, 2 );