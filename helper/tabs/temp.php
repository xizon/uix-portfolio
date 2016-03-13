<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


if( isset( $_GET[ 'tab' ] ) && $_GET[ 'tab' ] == 'temp' ) {
	
	
	$wpnonce_url = 'edit.php?post_type='.UixPortfolio::get_slug().'&page='.UixPortfolio::HELPER;
	$wpnonce_action = 'temp-filesystem-nonce';
	
?>     

     <?php if( UixPortfolio::tempfile_exists() ) { ?>
	 
	 
         <p>
           <?php _e( 'Uix Portfolio template files already exists.', 'uix-portfolio' ); ?>
   
        </p>  
        
    <?php } else {  ?>

         <h3><?php _e( 'Copy Uix Portfolio template files in your templates directory:', 'uix-portfolio' ); ?></h3>
         <p>
           <?php _e( 'As a workaround you can use FTP, access the Uix Portfolio template files path <code>/wp-content/plugins/uix-portfolio/theme_templates/</code> and upload files to your theme templates directory <code>/wp-content/themes/{your-theme}/</code>. ', 'uix-portfolio' ); ?>
   
        </p>   
         
         <form method="post">
          <?php
		  
            $output = "";

            if ( !empty( $_POST ) ) {
				
				
                  $output = UixPortfolio::templates( $wpnonce_action, $wpnonce_url );
				  echo $output;
			
            } else {
				
				wp_nonce_field( $wpnonce_action );
				echo '<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="'.__( 'Click This Button to Copy Files', 'uix-portfolio' ).'"  /></p>';
				
			}

          ?>
         </form>
         
         
    <?php } ?>
    
<?php } ?>