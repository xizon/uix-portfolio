<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


if( !isset( $_GET[ 'tab' ] ) || $_GET[ 'tab' ] == 'about' ) {
	
?>

        <p>
           <?php _e( 'Enables a portfolio post type and taxonomies.', 'uix-portfolio' ); ?>
        </p>  
        <p>
        <?php _e( 'This plugin registers a custom post type for portfolio items. It also registers separate portfolio taxonomies for tags and categories. If featured images are selected, they will be displayed in the column view. It doesn\'t change how portfolio items are displayed in your theme.', 'uix-portfolio' ); ?>
        </p>  
        <h3>
        <?php _e( 'Features', 'uix-portfolio' ); ?>
        </h3>  
        <p>
        <?php _e( '* Create a template with page navigation to display all portfolio items.', 'uix-portfolio' ); ?><br>
        <?php _e( '* Regenerate thumbnails after changing their size.', 'uix-portfolio' ); ?><br>
        <?php _e( '* Adding Categories support to a Custom Post Type in WordPress.', 'uix-portfolio' ); ?><br>
        <?php _e( '* It contains about three different layouts to choose from.', 'uix-portfolio' ); ?><br>
        <?php _e( '* You can create portfolio item with support for post formats.', 'uix-portfolio' ); ?><br>
        <?php _e( '* Portfolio List Pages support the infinite scroll functionality.', 'uix-portfolio' ); ?><br>
        <?php _e( '* There are some simple options to the theme customizer.', 'uix-portfolio' ); ?><br>
        <?php _e( '* Filterable Portfolio to display portfolio items to your site.', 'uix-portfolio' ); ?><br>
        <?php _e( '* The plugin supports a powerful Masonry grid layout  that will present your content in a dynamic, fluid fashion that looks and feels great both on desktop and mobile based devices, perfect for very visual websites that deal in lots of image-based content in various aspect ratios.', 'uix-portfolio' ); ?><br>
        </p>   
        
   
    
<?php } ?>