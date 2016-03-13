<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if( isset( $_GET[ 'tab' ] ) && $_GET[ 'tab' ] == 'credits' ) {
?>


        <h3>
           <?php _e( 'I would like to give special thanks to credits. The following is a guide to the list of credits for this plugin:', 'uix-portfolio' ); ?>
        </h3>  
        <p>
        
        <ul>
            <li><a href="https://github.com/jeremyclark13/automatic-theme-plugin-update" target="_blank" rel="nofollow">Automatic Theme & Plugin Updater for Self-Hosted Themes/Plugins</a></li>
            <li><a href="https://github.com/uixplorer/gallery-metabox" target="_blank" rel="nofollow">Gallery Metabox</a></li>
            <li><a href="https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress" target="_blank" rel="nofollow">Custom Metaboxes and Fields</a></li>
            <li><a href="http://kirki.org/" target="_blank" rel="nofollow">Kirki</a></li>
            <li><a href="https://github.com/woothemes/FlexSlider" target="_blank" rel="nofollow">Flexslider</a></li>
            <li><a href="http://masonry.desandro.com/v2/index.html" target="_blank" rel="nofollow">Masonry</a></li>
            <li><a href="http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/#prettyPhoto" target="_blank" rel="nofollow">prettyPhoto</a></li>
            <li><a href="https://github.com/Vestride/Shuffle" target="_blank" rel="nofollow">Shuffle (filtering and sorting)</a></li>
            

        </ul>
        
        </p> 
        
    
<?php } ?>