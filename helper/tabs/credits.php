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
            <li><a href="http://w-shadow.com" target="_blank" rel="nofollow">Plugin Update Checker Library</a></li>
            <li><a href="https://github.com/uixplorer/gallery-metabox" target="_blank" rel="nofollow">Gallery Metabox</a></li>
            <li><a href="https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress" target="_blank" rel="nofollow">Custom Metaboxes and Fields</a></li>
            <li><a href="http://kirki.org/" target="_blank" rel="nofollow">Kirki</a></li>
            <li><a href="https://github.com/woothemes/FlexSlider" target="_blank" rel="nofollow">Flexslider</a></li>
            <li><a href="http://masonry.desandro.com/v2/index.html" target="_blank" rel="nofollow">Masonry</a></li>
            <li><a href="http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/#prettyPhoto" target="_blank" rel="nofollow">prettyPhoto</a></li>
            <li><a href="http://frostywebdesigns.com/" target="_blank" rel="nofollow">Featured Image Column</a></li>
            <li><a href="https://github.com/Vestride/Shuffle" target="_blank" rel="nofollow">Shuffle (filtering and sorting)</a></li>
            <li><a href="https://github.com/alexanderdickson/waitForImages" target="_blank" rel="nofollow">waitForImages</a></li>
            
            

        </ul>
        
        </p> 
        
    
<?php } ?>