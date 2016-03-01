<?php
/**
 * Template part for displaying portfolio.
 *
 */
 
 
//Get portfolio list number
global $wp_count;
 

if ( is_singular() ) { 
/* ==================  single ==================  */  
?>
    
	<?php
    // Get gallery image ids
    $attachments = get_gallery_ids();
	?> 
    
    
     <?php 
	 $thumbnail = '';
     if ( has_post_thumbnail()) {
     ?>
    
            <?php
            // Display post thumbnail
            ob_start();
				the_post_thumbnail( 'uix-portfolio-gallery-post', array(
					'alt' => get_the_title(),
					'class'	=> 'post-img',
					'itemprop'	=> 'image',
				) ); 
                $thumbnail = ob_get_contents();
            ob_end_clean(); 
            ?>
            
       
    
     <?php }  ?>
    
    <?php 
	
    if ( is_array( $attachments ) ) {
        $thumbnail = '';
    }
    ?>
    
 
    

    <?php
    // Loop through each attachment ID
	if ( is_array( $attachments ) ) {
	?>
		
        <div class="gallery-normal-list">
        <?php	
        
        foreach ( $attachments as $attachment ) :
            $img_url	= wp_get_attachment_url( $attachment );
            $img_alt	= get_post_meta( $attachment, '_wp_attachment_image_alt', true );
            $img_html	= wp_get_attachment_image( $attachment, 'uix-portfolio-gallery-post' ); ?>
            <p>
                <?php
                // Display image with lightbox
                if (  'on' == gallery_is_lightbox_enabled() ) { ?>
                    <a href="<?php echo $img_url; ?>" title="<?php echo esc_attr( get_the_title() ); ?>"  rel="uix-portfolio-prettyPhoto[unusual]">
                        <?php echo $img_html; ?>
                    </a>
                <?php
                // Lightbox is disabled, only show image
                } else { ?>
                    <?php echo $img_html; ?>
                <?php } ?>
            </p>
        <?php endforeach; ?>
        
        </div><!-- .gallery-normal-list -->

    <?php }  ?>
    
    
    
    
    <?php  echo $thumbnail; ?>
    


    

<?php 
/* ==================  /single ==================  */ 


} else { 
/* ==================  loop ==================  */  

    $cat_termlist = get_the_term_list( get_the_ID(), 'uix_portfolio_category', '', ', ', '' );
?>

    <div class="portfolio-item portfolio-item-<?php echo $wp_count; ?> <?php echo UixPortfolio::cat_class( $cat_termlist ); ?> infinite-scroll-list" <?php echo UixPortfolio::cat_class_filter( $cat_termlist ); ?> >
    
         <div id="post-<?php the_ID(); ?>">
         
             <div class="item-screenshot">
                <a class="featured-image" href="<?php echo esc_url( get_permalink() );?>" title="<?php the_title();?>">
                    <figure>
                       
						 <?php if ( has_post_thumbnail()) { ?>
                      
                                <?php
                                // Display post thumbnail
                                the_post_thumbnail( 'uix-portfolio-entry', array(
                                    'alt' => get_the_title(),
                                    'class'	=> 'portfolio-img',
                                ) ); 
                                ?>
                                
                           
            
                         <?php } else { ?>
                         
                               <?php 
							   
								// Get gallery image ids
								$attachments = get_gallery_ids();
								
								if ( is_array( $attachments ) ) {
									foreach ( $attachments as $attachment ) :
										$img_url	= wp_get_attachment_url( $attachment );
										$img_alt	= get_post_meta( $attachment, '_wp_attachment_image_alt', true );
										$img_html	= wp_get_attachment_image( $attachment, 'uix-portfolio-entry' ); 
										
										echo $img_html;
										
										break;
										
									endforeach; 
	
								}
								
								
							    ?>
                         
                         <?php } ?>
                       
                     
                        <figcaption>
                            <p>
                            <?php the_excerpt(); ?>
                            </p>
                        </figcaption>
                    </figure>
                
                </a>
            </div>
            <h3 class="portfolio-entry-title">
                <a href="<?php echo esc_url( get_permalink() );?>" title="<?php the_title();?>">
                   <?php the_title();?>
                </a>
            </h3>
        
        </div><!-- #post-## -->

    </div>
    


<?php 
/* ==================  /loop ==================  */ 
} 
?>
