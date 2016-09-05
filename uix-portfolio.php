<?php
/*
Plugin Name: Uix Portfolio
Plugin URI: https://uiux.cc/wp-plugins/uix-portfolio/
Description: Readily organize & present your fine works with our free portfolio post type plugin.
Author: UIUX Lab
Author URI: https://uiux.cc
Version: 1.0.0
Text Domain: uix-portfolio
License: GPLv2 or later
*/

class UixPortfolio {
	
	const PREFIX = 'uix';
	const HELPER = 'uix-portfolio-helper';
	const NOTICEID = 'uix-portfolio-helper-tip';



	
	/**
	 * Initialize
	 *
	 */
	public static function init() {
	
		self::meta_boxes();
		self::featured_image_support();
		
		add_action( 'admin_print_scripts-edit.php', array( __CLASS__, 'check_current_post_type' ) );
		add_action( 'admin_print_scripts-post-new.php', array( __CLASS__, 'check_current_post_type' ) );
		add_action( 'admin_print_scripts-post.php', array( __CLASS__, 'check_current_post_type' ) );
		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( __CLASS__, 'actions_links' ), -10 );
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'backstage_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'frontpage_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'print_custom_stylesheet' ) );
		add_action( 'current_screen', array( __CLASS__, 'gallery' ) );
		add_action( 'current_screen', array( __CLASS__, 'usage_notice' ) );
		add_action( 'admin_init', array( __CLASS__, 'check_update' ) );
		add_action( 'admin_init', array( __CLASS__, 'tc_i18n' ) );
		add_action( 'admin_init', array( __CLASS__, 'load_helper' ) );
		add_action( 'admin_init', array( __CLASS__, 'nag_ignore' ) );
		add_action( 'admin_menu', array( __CLASS__, 'options_admin_menu' ) );
		add_action( 'init', array( __CLASS__, 'post_views' ) );
		add_action( 'init', array( __CLASS__, 'customizer' ) );
		add_action( 'wp_head', array( __CLASS__, 'cat' ) );
		add_action( 'wp_head', array( __CLASS__, 'infinite_scroll' ) );
		add_action( 'wp_head', array( __CLASS__, 'filterable' ) );
		add_action( 'wp_head', array( __CLASS__, 'masonry' ) );
		add_action( 'wp_head', array( __CLASS__, 'gallery_app' ) );
		add_filter( 'body_class', array( __CLASS__, 'new_class' ) );
		add_action( 'widgets_init', array( __CLASS__, 'register_my_widget' ) );
		add_filter( 'post_thumbnail_html', array( __CLASS__, 'remove_thumbnail_dimensions' ), 10, 4 );
		add_filter( 'featured_image_column_default_image', array( __CLASS__, 'custom_featured_image_column_image' ) );
		add_action( 'featured_image_column_init', array( __CLASS__, 'custom_featured_image_column_init' ) );
		add_action( 'after_setup_theme', array( __CLASS__, 'add_featured_image_support' ), 11 );
	

	}
	
	
	/*
	 * Enqueue scripts and styles.
	 *
	 *
	 */
	public static function frontpage_scripts() {
	

	    global $uix_portfolio_temp;
        if ( $uix_portfolio_temp === true ) { 
			// Add flexslider
			wp_enqueue_script( 'flexslider', self::plug_directory() .'assets/js/jquery.flexslider.min.js', array( 'jquery' ), '2.5.0', true );	
			wp_enqueue_style( 'flexslider', self::plug_directory() .'assets/css/flexslider.css', false, '2.5.0', 'all' );
			
			// Easing
			wp_enqueue_script( 'jquery-easing', self::plug_directory() .'assets/js/jquery.easing.js', array( 'jquery' ), '1.3', false );	
			
			// Modernizr.
			wp_enqueue_script( 'modernizr', self::plug_directory() .'assets/js/modernizr.min.js', false, '3.3.1', false );
					
			// Shuffle
			wp_enqueue_script( 'shuffle', self::plug_directory() .'assets/js/jquery.shuffle.js', array( 'jquery' ), '3.1.1', true );
	
			// imagesloaded
			wp_enqueue_script( 'imagesloaded', self::plug_directory() .'assets/js/imagesloaded.min.js', array( 'jquery' ), '4.1.0', true );	
					
			// Masonry
			wp_enqueue_script( 'masonry', self::plug_directory() .'assets/js/masonry.js', array( 'jquery' ), '3.3.2', true );
			
			// prettyPhoto
			wp_enqueue_script(  'prettyPhoto', self::plug_directory() .'assets/js/jquery.prettyPhoto.js', array( 'jquery' ), '3.1.5', true );
			wp_enqueue_style(  'prettyPhoto', self::plug_directory() .'assets/css/jquery.prettyPhoto.css', false, '3.1.5', 'all');
					
					
			//Main stylesheets and scripts to Front-End
			wp_enqueue_style( self::PREFIX . '-portfolio-frontend-style', get_template_directory_uri() .'/uix-portfolio-style.css', false, self::ver(), 'all');
			wp_enqueue_script( self::PREFIX . '-portfolio-frontend-js', get_template_directory_uri() .'/uix-portfolio-script.js', array( 'jquery' ), self::ver(), true );	

		}
	

	}
	
	

	
	/*
	 * Enqueue scripts and styles  in the backstage
	 *
	 *
	 */
	public static function backstage_scripts() {
	
		  //Check if screen’s ID, base, post type, and taxonomy, among other data points
		  $currentScreen = get_current_screen();
		 
		  if( $currentScreen->base === "customize" ) {
			  
				if ( is_admin()) {
						
						wp_enqueue_style( self::PREFIX . '-portfolio-mce-main', self::plug_directory() .'style.css', false, self::ver(), 'all');
		
							
				}
  
		  } 
		

	}

	
	
	/**
	 * Internationalizing  Plugin
	 *
	 */
	public static function tc_i18n() {
	
	
	    load_plugin_textdomain( 'uix-portfolio', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/'  );
		

	}
	
	/*
	 * The function finds the position of the first occurrence of a string inside another string.
	 *
	 * As strpos may return either FALSE (substring absent) or 0 (substring at start of string), strict versus loose equivalency operators must be used very carefully.
	 *
	 */
	public static function inc_str( $str, $incstr ) {
	
		if ( mb_strlen( strpos( $str, $incstr ), 'UTF8' ) > 0 ) {
			return true;
		} else {
			return false;
		}

	}

	
	
	/*
	 * Extend the default WordPress body classes.
	 *
	 *
	 */
	public static function new_class( $classes ) {
	
	    global $uix_portfolio_temp;
        if ( $uix_portfolio_temp === true ) { 
			$classes[] = 'uix-portfolio-body';
		}
		
		return $classes;

	}

	/*
	 
	 * Filter to remove image dimension attributes 
	 *
	 * 
	 *
	 */
	public static function remove_thumbnail_dimensions( $html, $post_id, $post_image_id, $post_thumbnail ) {
	
		if ( $post_thumbnail == 'uix-portfolio-entry' || $post_thumbnail == 'uix-portfolio-retina-entry' ){
			$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
		}
		return $html;

	}
	

	
	/*
	 * Create customizable menu in backstage  panel
	 *
	 * Add a submenu page
	 *
	 */
	 public static function options_admin_menu() {
	
	    //settings
		$hook = add_submenu_page(
			'edit.php?post_type=uix-portfolio',
			__( 'Uix Portfolio Settings', 'uix-portfolio' ),
			__( 'Settings', 'uix-portfolio' ),
			'manage_options',
			'uix-portfolio-custom-submenu-page',
			array( __CLASS__, 'uix_portfolio_options_page' )
		);
		
		add_action("load-{$hook}", create_function('','
			header("Location: '.admin_url( "customize.php" ).'");
			exit;
		'));
	
	
        //helper
		add_submenu_page(
			'edit.php?post_type=uix-portfolio',
			__( 'Helper', 'uix-portfolio' ),
			__( 'Helper', 'uix-portfolio' ),
			'manage_options',
			self::HELPER,
			'uix_portfolio_options_page' 
		);
		
		

	
		
	 }
	 
	public static function uix_portfolio_options_page(){
		
	}
	
	
	
	/*
	 * Load helper
	 *
	 */
	 public static function load_helper() {
		 
		 require_once 'helper/settings.php';
	 }
	
	
	/*
	 * Check the post type of the current page in wp-admin
	 * 
	 */
	public static function check_current_post_type() {
		global $typenow;
		if ( 'uix-portfolio' == $typenow ) {
			//do something
		} 
	}
	
	
	
	/*
	 * Featured Image
	 * Add support for a custom default image
	 */
	public static function featured_image_support() {
		require_once 'inc/featured-image-column.php';
	}
	
	public static function custom_featured_image_column_image( $image ) {
		if ( !has_post_thumbnail() ) {
			return self::plug_directory() .'assets/images/featured-image.png';
		}
	}
	
	
	public static function custom_featured_image_column_init() {
		add_filter( 'featured_image_column_post_types', array( __CLASS__, 'custom_featured_image_column_remove_post_types' ), 11 ); // Remove
	}
	
	
	public static function custom_featured_image_column_remove_post_types( $post_types ) {
		foreach( $post_types as $key => $post_type ) {
			if ( 'page' === $post_type ) // Post type you'd like removed. Ex: 'post' or 'page'
				unset( $post_types[$key] );
		}
		return $post_types;
	}
	

	public static function add_featured_image_support() {
		
		
		$supportedTypes = get_theme_support( 'post-thumbnails' );
		$thePostType = 'uix-portfolio';
		
		if( $supportedTypes === false ) {
			add_theme_support( 'post-thumbnails', array( $thePostType ) ); 
		} elseif ( is_array( $supportedTypes ) ) {
			$supportedTypes[0][] = $thePostType;
			add_theme_support( 'post-thumbnails', $supportedTypes[0] );
		}
	
	
		//---
		add_image_size( 'uix-portfolio-entry', get_theme_mod( 'custom_uix_portfolio_cover_size_w', 475 ), get_theme_mod( 'custom_uix_portfolio_cover_size_h', 329 ), true );
		add_image_size( 'uix-portfolio-autoheight-entry', get_theme_mod( 'custom_uix_portfolio_cover_size_w', 475 ), 9999, false );
		add_image_size( 'uix-portfolio-gallery-post', get_theme_mod( 'custom_uix_portfolio_single_size_w', 1920 ), get_theme_mod( 'custom_uix_portfolio_single_size_h', 9999 ), false );
		
		//--- Add image sizes for retina
		add_image_size( 'uix-portfolio-retina-entry', get_theme_mod( 'custom_uix_portfolio_cover_size_w', 475 )*2, get_theme_mod( 'custom_uix_portfolio_cover_size_h', 329 )*2, true );
		add_image_size( 'uix-portfolio-autoheight-retina-entry', get_theme_mod( 'custom_uix_portfolio_cover_size_w', 475 )*2, 9999, false );
	
	}
	

	/*
	 * Enable update check on every request.
	 *
	 *
	 */
	public static function check_update() {
	
		require_once 'inc/plugin-update-checker.php';
		$myUpdateChecker = PucFactory::buildUpdateChecker(
			'https://uiux.cc/wp-plugins/'.self::get_slug().'/update/info.json',
			__FILE__
		);

	}
	
	
	/**
	 * Add plugin actions links
	 */
	public static function actions_links( $links ) {
		$links[] = '<a href="' . admin_url( "customize.php" ) . '">' . __( 'Settings', 'uix-portfolio' ) . '</a>';
		$links[] = '<a href="' . admin_url( "admin.php?page=".self::HELPER."&tab=usage" ) . '">' . __( 'How to use?', 'uix-portfolio' ) . '</a>';
		return $links;
	}
	
	
	/*
	 * Get plugin slug
	 *
	 *
	 */
	public static function get_slug() {

         return dirname( plugin_basename( __FILE__ ) );
	
	}
	
	
	/*
	 * Custom Metaboxes and Fields
	 *
	 *
	 */
	public static function meta_boxes() {
	
		if ( ! class_exists( 'cmb_Meta_Box' ) ) {
			require_once 'post-extensions/custom-metaboxes-and-fields/init.php';
		}

	}
	
	/*
	 * Building WordPress themes using the Kirki Customizer
	 *
	 *
	 */
	public static function customizer() {
		
		if ( !class_exists( 'Kirki' ) ) {
		    require_once 'customizer-extras/kirki/kirki.php';
		}
		
		require_once 'customizer-extras/options-init.php';


	}	
	
	/*
	 *  Gallery metabox
	 *
	 *
	 */
	public static function gallery() {
		
		
		  //Check if screen’s ID, base, post type, and taxonomy, among other data points
		  $currentScreen = get_current_screen();

		  if( $currentScreen->id === "uix-portfolio" ) {
			  require_once 'gallery-metabox/init.php';
		  }
		
	
	}	
	
	public static function gallery_app() {
		
		require_once 'gallery-metabox/front-display.php';
	
	}
	
	/*
	 *  Add admin one-time notifications
	 *
	 *
	 */
	public static function usage_notice() {
		
		
		  //Check if screen’s ID, base, post type, and taxonomy, among other data points
		  $currentScreen = get_current_screen();

		  if( ( self::inc_str( $currentScreen->id, 'uix_portfolio' ) || self::inc_str( $currentScreen->id, 'uix-portfolio' ) ) && !self::inc_str( $currentScreen->id, '_page_' ) ) {
			  add_action( 'admin_notices', array( __CLASS__, 'usage_notice_app' ) );
			  add_action( 'admin_notices', array( __CLASS__, 'template_notice_required' ) );
		  }
		
	
	}	
	
	public static function usage_notice_app() {
		
		global $current_user ;
		$user_id = $current_user->ID;
		
		/* Check that the user hasn't already clicked to ignore the message */
		if ( ! get_user_meta( $user_id, self::NOTICEID ) ) {
			echo '<div class="updated"><p>
				'.__( 'Do you want to create a portfolio website with WordPress?  Learn how to add portfolio to your themes.', 'uix-portfolio' ).'
				<a href="' . admin_url( "admin.php?page=".self::HELPER."&tab=usage" ) . '">' . __( 'How to use?', 'uix-portfolio' ) . '</a>
				 | 
			';
			printf( __( '<a href="%1$s">Hide Notice</a>' ), '?post_type='.self::get_slug().'&'.self::NOTICEID.'=0');
			
			echo "</p></div>";
		}
	
	}	
	
	public static function template_notice_required() {
		
		if( !self::tempfile_exists() ) {
			echo '
				<div class="error notice">
					<p>' . __( '<strong>You need to create Uix Portfolio template files in your templates directory. You can create the files on the WordPress admin panel.</strong>', 'uix-portfolio' ) . ' <a class="button button-primary" href="' . admin_url( "admin.php?page=".self::HELPER."&tab=temp" ) . '">' . __( 'Create now!', 'uix-portfolio' ) . '</a><br>' . __( 'As a workaround you can use FTP, access the Uix Portfolio template files path <code>/wp-content/plugins/uix-portfolio/theme_templates/</code> and upload files to your theme templates directory <code>/wp-content/themes/{your-theme}/</code>. ', 'uix-portfolio' ) . '</p>
				</div>
			';
	
		}
	
	}	

	
	public static function nag_ignore() {
		    global $current_user;
			$user_id = $current_user->ID;
			
			/* If user clicks to ignore the notice, add that to their user meta */
			if ( isset( $_GET[ self::NOTICEID ]) && '0' == $_GET[ self::NOTICEID ] ) {
				 add_user_meta( $user_id, self::NOTICEID, 'true', true);

				if ( wp_get_referer() ) {
					/* Redirects user to where they were before */
					wp_safe_redirect( wp_get_referer() );
				} else {
					/* This will never happen, I can almost gurantee it, but we should still have it just in case*/
					wp_safe_redirect( home_url() );
				}
		    }
	}
	
	/*
	 * Checks whether a template file or directory exists
	 *
	 *
	 */
	public static function tempfile_exists() {

	      if( !file_exists( get_stylesheet_directory() . '/uix-portfolio.php' ) ) {
			  return false;
		  } else {
			  return true;
		  }

	}
	
	/*
	 * Callback the plugin directory
	 *
	 *
	 */
	public static function plug_directory() {

	  return plugin_dir_url( __FILE__ );

	}
	
	
	
	/*
	 * Custom post extensions
	 *
	 *
	 */
	public static function post_ex() {
	
		require_once 'post-extensions/post-extensions-init.php';

		
	}
	

	/*
	 *  Output portfolio categories for dropdown styles
	 *
	 *
	 */
	public static function cat() {
	
		require_once 'inc/class-walker-uix_portfolio_category.php';
		
	}
	
	
	/**
	 *  Register widget area.
	 */
	public static function register_my_widget( $links ) {
		// Recent portfolio widget
		require 'inc/class-widgets.php';
		register_widget( 'Uix_Portfolio_Recent_Portfolio_Widget' );
		
		register_sidebar( array(
			'name'          => __( 'Primary Sidebar', 'uix-portfolio' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Appears on posts and pages in the sidebar.', 'uix-portfolio' ),
			'before_widget' => '<div id="%1$s" class="widget side %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
	}
	
	
	
	/**
	 * List categories for specific taxonomy
	 * 
	 * @link    http://codex.wordpress.org/Function_Reference/wp_get_post_terms
	 * @usage   if ( UixPortfolio::list_post_terms( 'uix_portfolio_category', false ) ) { ... }
	 */
	public static function list_post_terms( $taxonomy = 'uix_portfolio_category', $echo = true ) {
	
		$list_terms = array();
		$terms      = wp_get_post_terms( get_the_ID(), $taxonomy );
		
		if ( is_array ( $terms ) ) {
			
			foreach ( $terms as $term ) {
				$permalink      = get_term_link( $term->term_id, $taxonomy );
				$list_terms[]   = '<a href="'. $permalink .'" title="'. $term->name .'">'. $term->name .'</a>';
			}
			if ( ! $list_terms ) {
				return;
			}
			$list_terms = implode( ', ', $list_terms );
			if ( $echo ) {
				echo $list_terms;
			} else {
				return $list_terms;
			}
			
			
		}

	}
	
	
	/*
	 * Copy template files to your theme directory
	 *
	 *
	 */
	
	public static function templates( $nonceaction, $nonce ){
	
		  global $wp_filesystem;
			
		  $filenames = array();
		  $filepath = WP_PLUGIN_DIR .'/'.self::get_slug(). '/theme_templates/';
		  $themepath = get_stylesheet_directory() . '/';

	      foreach ( glob( dirname(__FILE__). "/theme_templates/*") as $file ) {
			$filenames[] = str_replace( dirname(__FILE__). "/theme_templates/", '', $file );
		  }	
		  

		  $url = wp_nonce_url( $nonce, $nonceaction );
		
		  $contentdir = $filepath; 
		  
		  if ( self::wpfilesystem_connect_fs( $url, '', $contentdir, '' ) ) {
	
				foreach ( $filenames as $filename ) {
					
				
					if ( ! file_exists( $themepath . $filename ) ) {
						
						$dir1 = $wp_filesystem->find_folder( $filepath );
						$file1 = trailingslashit( $dir1 ) . $filename;
						
						$dir2 = $wp_filesystem->find_folder( $themepath );
						$file2 = trailingslashit( $dir2 ) . $filename;
									
						$filecontent = $wp_filesystem->get_contents( $file1 );
	
						$wp_filesystem->put_contents( $file2, $filecontent, FS_CHMOD_FILE );
						
			
					} 
				}
				
				
				if ( self::tempfile_exists() ) {
					return __( '<div class="notice notice-success"><p>Operation successfully completed!</p></div>', 'uix-portfolio' );
				} else {
					return __( '<div class="notice notice-error"><p><strong>There was a problem copying your template files:</strong> Please check your server settings. You can upload files to theme templates directory using FTP.</p></div>', 'uix-portfolio' );
				}
				
		
				
				
		  } 
	}	 


	/**
	 * Initialize the WP_Filesystem
	 * 
	 * Example:
	 
            $output = "";
			$wpnonce_url = 'edit.php?post_type='.UixPortfolio::get_slug().'&page='.UixPortfolio::HELPER;
			$wpnonce_action = 'temp-filesystem-nonce';

            if ( !empty( $_POST ) ) {
				
				
                  $output = UixPortfolio::wpfilesystem_write_file( $wpnonce_action, $wpnonce_url, 'helper/tabs/', '1.txt', 'This is test.' );
				  echo $output;
			
            } else {
				
				wp_nonce_field( $wpnonce_action );
				echo '<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="'.__( 'Click This Button to Copy Files', 'uix-portfolio' ).'"  /></p>';
				
			}
	 *
	 */
	public static function wpfilesystem_connect_fs( $url, $method, $context, $fields = null) {
		  global $wp_filesystem;
		  if ( false === ( $credentials = request_filesystem_credentials( $url, $method, false, $context, $fields) ) ) {
			return false;
		  }
		
		  //check if credentials are correct or not.
		  if( !WP_Filesystem( $credentials ) ) {
			request_filesystem_credentials( $url, $method, true, $context);
			return false;
		  }
		
		  return true;
	}
	
	public static function wpfilesystem_write_file( $nonceaction, $nonce, $path, $pathname, $text ){
		  global $wp_filesystem;
		  
		
		  $url = wp_nonce_url( $nonce, $nonceaction );
		
		  $contentdir = trailingslashit( WP_PLUGIN_DIR .'/'.self::get_slug() ).$path; 
		  
		  if ( self::wpfilesystem_connect_fs( $url, '', $contentdir, '' ) ) {
			  
				$dir = $wp_filesystem->find_folder( $contentdir );
				$file = trailingslashit( $dir ) . $pathname;
				$wp_filesystem->put_contents( $file, $text, FS_CHMOD_FILE );
			
				return __( '<div class="notice notice-success"><p>Operation successfully completed!</p></div>', 'uix-portfolio' );
				
		  } 
	}	
	
	 
	public static function wpfilesystem_read_file( $nonceaction, $nonce, $path, $pathname, $type = 'plugin' ){
		  global $wp_filesystem;
		
		  $url = wp_nonce_url( $nonce, $nonceaction );
	
		  if ( $type == 'plugin' ) {
			  $contentdir = trailingslashit( WP_PLUGIN_DIR .'/'.self::get_slug() ).$path; 
		  } 
		  if ( $type == 'theme' ) {
			  $contentdir = trailingslashit( get_template_directory() ).$path; 
		  } 	  
		
		  
		  if ( self::wpfilesystem_connect_fs( $url, '', $contentdir ) ) {
			  
				$dir = $wp_filesystem->find_folder( $contentdir );
				$file = trailingslashit( $dir ) . $pathname;
				
				
				if( $wp_filesystem->exists( $file ) ) {
					
				    return $wp_filesystem->get_contents( $file );
	
				} else {
					return '';
				}
		
		
		  } 
	}	 
	


	/*
	 * Returns current plugin version.
	 *
	 *
	 */
	public static function ver() {
	
		if ( ! function_exists( 'get_plugins' ) ) {
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}
		$plugin_folder = get_plugins( '/' . self::get_slug() );
		$plugin_file = basename( ( __FILE__ ) );
		return $plugin_folder[$plugin_file]['Version'];


	}
	
	
	
	/*
	 * Infinite scroll support
	 *
	 *
	 */
	public static function infinite_scroll() {
	
		require_once 'inc/infinite-scroll.php';

	}
	
	
	/*
	 *Filterable support
	 *
	 */
	public static function filterable() {
	
		require_once 'inc/filterable.php';

	}
	
	/*
	 * Masonry support
	 *
	 */
	public static function masonry() {
	
		require_once 'inc/masonry.php';

	}
	
	
	/*
	 * Get and set post views
	 *
	 *
	 */
	public static function post_views() {
	
		require_once 'inc/set-post-views.php';

	}
	


	/*
	 * Print Custom Stylesheet
	 *
	 *
	 */
	public static function print_custom_stylesheet() {
	
		$custom_css = get_theme_mod( 'custom_uix_portfolio_css' );
		wp_add_inline_style( self::PREFIX . '-portfolio-frontend-style', $custom_css );

	
	}
		
	
		
	/*
	 * Returns category class
	 *
	 *
	 */
	public static function cat_class( $str ) {
	
		return str_replace( ',', ' ', str_replace( ',-', ' ', strtolower( strip_tags( str_replace( ' ', '-', $str ) ) ) ) )	;

	}	
	
	/*
	 * Returns Category Filter
	 *
	 *
	 */
	public static function cat_class_filter( $str ) {
	
		$v = self::cat_class( $str );
		$nv = str_replace( ' ', '","', $v );
		
		return 'data-groups=\'["'.$nv.'"]\'';

	}	
		
	/**
	 * Get URL of first image in a post
	 * 
	 */
	public static function getfirstpic() {
		global $post, $posts;
		$first_img = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		if( count( $matches[1] ) > 0 ) { 
		    return $matches [1] [0];
		} else {
			return '';
		}
	
	}
			

	/*
	 * Load more button
	 *
	 *
	 */
	public static function loadmore() {
	
		echo '<div class="pagination-infinitescroll">';
		next_posts_link( __( 'Load More', 'uix-portfolio' ) );
		echo '</div>';

	}
	
	

	/*
	 * Numbered Pagination
	 *
	 *
	 */
	public static function pagination( $show=3, $custom_prev = '&larr; Previous', $custom_next = 'Next &rarr;', $li = true, $inf_enable = false, $custom_query = '' ) {
	
		
		$pagehtml = '';
		
		$pageshow = '';
		
		$pagehtml_1 = '<ul class="pager">';
		
		$pagehtml_2 = '</ul>';
		

		// Get currect number of pages and define total var
		if ( $custom_query ) {
			$total = $custom_query->max_num_pages;
		} else {
			global $wp_query;
			$total = $wp_query->max_num_pages;
		}
		

		// Display pagination if total var is greater then 1 ( current query is paginated )
		if ( $total > 1 )  {

			// Set current page if not defined
			if ( ! $current_page = get_query_var( 'paged') ) {
				 $current_page = 1;
			 }

			// Get currect format
			if ( get_option( 'permalink_structure') ) {
				$format = 'page/%#%/';
			} else {
				$format = '&paged=%#%';
			}

			// Display pagination
			$paginate = paginate_links(array(
				'base'      => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
				'format'    => $format,
				'current'   => max( 1, get_query_var( 'paged') ),
				'total'     => $total,
				'mid_size'  => 2,
				'end_size'  => $show,//How many numbers on either the start and the end list edges.
				'type'      => 'list',
				'prev_text' => $custom_prev,
				'next_text' => $custom_next,
			) );
			
			foreach ((array)$paginate as $value) {
				
				if ($li === true){
					if ( strpos( $value, 'prev') ){
						$pagehtml .= '<li class="previous">'.$value.'</li>';
					}elseif ( strpos( $value, 'next' ) ){
						$pagehtml .= '<li class="next">'.$value.'</li>';
					}elseif ( strpos( $value, 'current' ) ){
						$pagehtml .= '<li class="active">'.$value.'</li>';
					}else{
						$pagehtml .= '<li>'.$value.'</li>';	
					}
					
	
				}else{
					
					$pagehtml_1 = '';
					$pagehtml_2 = '';
					$pagehtml .= $value;
	
					
				}
				
				
			}
			
			$pageshow = $pagehtml_1.$pagehtml.$pagehtml_2;
			
			
			//Use Infinite Scroll
			if ( $inf_enable == true ) $pageshow = '';

			
			echo $pageshow;
			
			
			
			
		}
	}


	/*
	 * Load more button
	 *
	 *
	 */
	public static function pagejump( $custom_prev = '&larr; Previous', $custom_next = 'Next &rarr;', $li = true, $inf_enable = false, $pages = '' ) {
	
		// Set correct paged var
		global $paged;
		

		$pageshow = '';
		
		
		if ( empty( $paged ) ) {
			$paged = 1;
		}

		// Get pages var
		if ( ! $pages ) {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if ( ! $pages ) {
				$pages = 1;
			}
		}

		// Display next/previous pagination
		if ( 1 != $pages ) {
			
			if ($li === true){
              
				$pageshow .= '<ul class="pager"><li class="previous">';
				$pageshow .= get_previous_posts_link( '&larr; ' . __( 'Newer Posts', 'uix-portfolio' ) );
				$pageshow .= '</li><li class="next">';
				$pageshow .= get_next_posts_link( __( 'Older Posts', 'uix-portfolio' ) .' &rarr;' );
				$pageshow .= '</li></ul>';
	

			}else{
				
				$pageshow .= get_previous_posts_link( '&larr; ' . __( 'Newer Posts', 'uix-portfolio' ) );
				$pageshow .= get_next_posts_link( __( 'Older Posts', 'uix-portfolio' ) .' &rarr;' );
				
			}
				
			
		}
		

		//Use Infinite Scroll
		if ( $inf_enable == true ) $pageshow = '';
	
		
		echo $pageshow;

	}



}

add_action( 'plugins_loaded', array( 'UixPortfolio', 'init' ) );
UixPortfolio::post_ex();
