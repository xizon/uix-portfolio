<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if( isset( $_GET[ 'tab' ] ) && $_GET[ 'tab' ] == 'usage' ) {
?>


        <p>
           <?php _e( '1. After activating your theme, you can see a prompt pointed out as absolutely critical. Go to <strong>"Appearance -> Install Plugins"</strong>.
Or, upload the plugin to wordpress, Activate it. (Access the path (/wp-content/plugins/) And upload files there.)', 'uix-portfolio' ); ?>
        </p>  
        <p>
           <img src="<?php echo UixPortfolio::plug_directory(); ?>helper/img/plug.jpg" alt="">
        </p> 
        <p>
           <?php _e( '2. Please check if you have the 10 template files <code>"uix-portfolio-style.css", "uix-portfolio-script.js", "uix-portfolio.php", "taxonomy-uix_portfolio_category.php", "single-uix-portfolio.php", "content_uix_portfolio-video.php", "content_uix_portfolio-gallery.php", "content_uix_portfolio.php", "partials-uix_portfolio_catgory_filterable.php"</code> and <code>"partials-uix_portfolio_catgory_standard.php"</code> in your templates directory. If you can"t find these files, then just copy them from the directory "/wp-content/plugins/uix-portfolio/theme_templates/" to your templates directory.', 'uix-portfolio' ); ?>
           
          
        </p>  
        <p>
           <img src="<?php echo UixPortfolio::plug_directory(); ?>helper/img/temp.jpg" alt="">
        </p> 
        <p>
           <?php _e( '3. Create a new WordPress file or edit an existing one. Just make sure to select this new created template file as the "Template" for this page from the "Attributes" section. Save the page and hit "Preview" to see how it looks. ( You should specify the template name, in this case I used "Uix Portfolio". The "Template Name: Uix Portfolio" tells WordPress that this will be a custom page template. )', 'uix-portfolio' ); ?>
        </p>  
        <p>
           <img src="<?php echo UixPortfolio::plug_directory(); ?>helper/img/menu.jpg" alt=""> <img src="<?php echo UixPortfolio::plug_directory(); ?>helper/img/add-page.jpg" alt="">
        </p> 
        <p>
           <?php _e( '4. In your dashboard go to <strong>"Appearance -> Menus"</strong>. You’ll be able to add items to the menu. On the left you have your portfolio pages.', 'uix-portfolio' ); ?>
        </p>  
        <p>
           <img src="<?php echo UixPortfolio::plug_directory(); ?>helper/img/add-menu-1.jpg" alt=""> <img src="<?php echo UixPortfolio::plug_directory(); ?>helper/img/add-menu-2.jpg" alt="">
        </p> 
        
        
        <p>
           <?php _e( '5. Or use the Uix Slides Widget to add it to a sidebar. Go to <strong>"Appearance -> Widgets"</strong> in the WordPress Administration Screens. Find the <strong>"Recent Portfolio (Uix Portfolio Widget)"</strong> in the list of Widgets and click and drag the Widget to the spot you wish it to appear.', 'uix-portfolio' ); ?>
        </p>  
        <p>
           <img src="<?php echo UixPortfolio::plug_directory(); ?>helper/img/widget-1.jpg" alt=""> <br>           
           <img src="<?php echo UixPortfolio::plug_directory(); ?>helper/img/widget-2.jpg" alt="">
        </p> 
        
        
        
        <p>
           <?php _e( '6. Create uix portfolio item and publish portfolio then.', 'uix-portfolio' ); ?>
        </p>  
        <p>
           <img src="<?php echo UixPortfolio::plug_directory(); ?>helper/img/add-item.jpg" alt="">
        </p> 
        <p>
           <?php _e( '7. You can pretty much custom every aspect of the look and feel of this page by modifying the <code>*.php</code> template files <strong>(Access the path to the themes directory)</strong> . Best Practices for Editing WordPress Template Files:', 'uix-portfolio' ); ?>
        </p> 
        <p>
           <?php _e( '&nbsp;&nbsp;&nbsp;&nbsp;(1) WordPress comes with a theme and plugin editor as part of the core functionality. You can find it in your install by going to <strong>"Appearance > Editor"</strong> from your sidebar.', 'uix-portfolio' ); ?>
        </p>   
          
        <p>
           <img src="<?php echo UixPortfolio::plug_directory(); ?>helper/img/editor.jpg" alt="">
        </p> 
        
        <p>
           <?php _e( '&nbsp;&nbsp;&nbsp;&nbsp;(2) You can connect to your site via an <strong>FTP</strong> client, download a copy of the file you want to change, make the changes and then upload the file back to the server, overwriting the file that’s on the server.', 'uix-portfolio' ); ?>
        </p>  
        
        <p>
           <?php _e( '8. The Uix Portfolio plugin allows users to easily enable a "Customizer Page" to themes. Go to <strong>"Appearance -> Customize"</strong>.', 'uix-portfolio' ); ?>
        </p>   
        <p>
           <img src="<?php echo UixPortfolio::plug_directory(); ?>helper/img/customize.jpg" alt="">
        </p>      
        <p>
           <?php _e( '9. You can overview the original styles to overwrite it. It will be on creating new styles to your website, without modifying original <code>.css</code> files. Go to <strong>"Appearance -> Customize"</strong>.', 'uix-portfolio' ); ?>
        </p> 
        <p>
           <img src="<?php echo UixPortfolio::plug_directory(); ?>helper/img/css.jpg" alt="">
        </p>   
<?php } ?>
