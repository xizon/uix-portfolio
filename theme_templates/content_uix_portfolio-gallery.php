<?php
/**
 * The default template for displaying portfolio's gallery post format content.
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
    
    // Return if there aren't any images
    if ( ! $attachments ) {
        return;
    } ?>

	<div id="carousel-wrap-single" class="flexslider-container">

		<div id="carousel" class="flexslider flexslider-loading">

			<ul class="slides">

			<?php
            // Loop through each attachment ID
            foreach ( $attachments as $attachment ) :
                $img_url	= wp_get_attachment_url( $attachment );
                $img_alt	= get_post_meta( $attachment, '_wp_attachment_image_alt', true );
                $img_html	= wp_get_attachment_image( $attachment, 'uix-portfolio-gallery-post' ); ?>
                <li>
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
                </li>
            <?php endforeach; ?>
    

			</ul><!-- .slides -->

		</div><!-- .flexslider -->

	</div><!-- #carousel-wrap-single" -->
    

    

<?php 
/* ==================  /single ==================  */ 


} else { 
/* ==================  loop ==================  */  
    
	$cat_termlist = get_the_term_list( get_the_ID(), 'uix_portfolio_category', '', ', ', '' );
?>


    <div class="portfolio-item portfolio-item-<?php echo $wp_count; ?> <?php echo UixPortfolio::cat_class( $cat_termlist ); ?> infinite-scroll-list" <?php echo UixPortfolio::cat_class_filter( $cat_termlist ); ?>>
    
         <div id="post-<?php the_ID(); ?>">
         
                 <div class="item-screenshot">
                    <a class="featured-image" href="<?php echo esc_url( get_permalink() );?>" title="<?php echo esc_attr( get_the_title() ); ?>">
                        <figure>
                           
								<?php
                                
								     
                                  if ( has_post_format( 'gallery' ) ) {
									
		                               
											if ( has_post_thumbnail() ) {
												
												// Display post thumbnail
												the_post_thumbnail( 'uix-portfolio-entry', array(
													'alt' => get_the_title(),
													'class'	=> 'portfolio-img',
												) ); 												
												
												
								           } else {
											   
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
												
											}
		
										
									} 
									
									?>                 
            
 
                            
                            <figcaption>
                                <p>
                                <?php the_excerpt(); ?>
                                </p>
                            </figcaption>
                        </figure>
                    
                    </a>
                </div>
                <h3 class="portfolio-entry-title">
                    <a href="<?php echo esc_url( get_permalink() );?>" title="<?php echo esc_attr( get_the_title() ); ?>">
                       <?php the_title();?>
                    </a>
                </h3>
                
           </div><!-- #post-## -->

    </div>
    


<?php 
/* ==================  /loop ==================  */ 
} 
?>
