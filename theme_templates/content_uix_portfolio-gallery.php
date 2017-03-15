<?php
/**
 * The default template for displaying portfolio's gallery post format content.
 *
 */

//Get portfolio list number
global $wp_count;

// Layout
$layout = get_theme_mod( 'custom_uix_portfolio_layout', 'standard' );

// Thumbnail size
if ( $layout == 'masonry' ) { 
    $thumbnail_size = 'uix-portfolio-autoheight-entry';
	$thumbnail_retina_size = 'uix-portfolio-autoheight-retina-entry';
} else {
	$thumbnail_size = 'uix-portfolio-entry';
	$thumbnail_retina_size = 'uix-portfolio-retina-entry';
}


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
                $img_html	= wp_get_attachment_image( $attachment, 'uix-portfolio-gallery-post' ); 
				$img_html   = preg_replace( '/(width|height)=\"\d*\"\s/', '', $img_html );
				
				if ( !empty( $img_html ) ) {
				?>
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
            <?php 
				}
			endforeach; 
			?>
    

			</ul><!-- .slides -->

		</div><!-- .flexslider -->

	</div><!-- #carousel-wrap-single" -->
    

    

<?php 
/* ==================  /single ==================  */ 


} else { 
/* ==================  loop ==================  */  
    
	$cat_termlist = get_the_term_list( get_the_ID(), 'uix_portfolio_category', '', ', ', '' );
?>

     <div id="post-<?php the_ID(); ?>" class="item  item-gallery item-<?php echo $wp_count; ?> <?php echo UixPortfolio::cat_class( $cat_termlist ); ?> infinite-scroll-list" <?php echo UixPortfolio::cat_class_filter( $cat_termlist ); ?>>
        <span class="image">
            <a href="<?php echo esc_url( get_permalink() );?>" title="<?php echo esc_attr( get_the_title() ); ?>">

            
				<?php
                
                  if ( has_post_format( 'gallery' ) ) {
                    
                       
                            if ( has_post_thumbnail() ) {
                                
                                // Display post thumbnail
								$imgarr = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $thumbnail_retina_size );
                                the_post_thumbnail( $thumbnail_size, array(
                                    'alt' => get_the_title(),
                                    'class'	=> 'portfolio-img',
                                    'data-uix-portfolio-retina' => $imgarr[0],
                                ) ); 												
                                
                                
                           } else {
                               
                                // Get gallery image ids
                                $attachments = get_gallery_ids();
								$imgarr = wp_get_attachment_image_src( $attachment, $thumbnail_retina_size );
                                
                                if ( is_array( $attachments ) ) {
                                    foreach ( $attachments as $attachment ) :
                                        $img_url	= wp_get_attachment_url( $attachment );
                                        $img_alt	= get_post_meta( $attachment, '_wp_attachment_image_alt', true );
                                        $img_html	= wp_get_attachment_image( $attachment, $thumbnail_size, false, array(
                                                                                'alt' => get_the_title(),
                                                                                'class'	=> 'portfolio-img',
                                                                                'data-uix-portfolio-retina' => $imgarr[0],
                                                                               )
                                                                            ); 
                                        
                                        echo preg_replace( '/(width|height)=\"\d*\"\s/', '', $img_html );
                                        
                                        if ( !empty( $img_html ) ) break;
                                        
                                    endforeach; 

                                }
                                
                            }

                        
                    } 
                    
                    ?>                 


            </a>
        </span>
        

        <h3><a href="<?php echo esc_url( get_permalink() );?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php the_title();?></a>
        </h3>

        
        <?php if ( has_excerpt() ) {  ?>
             <div class="content">
             <?php the_excerpt(); ?>
             <a href="<?php echo esc_url( get_permalink() );?>" title="<?php echo esc_attr( get_the_title() ); ?>"></a>
            </div>
        <?php } ?>
    </div><!-- /.item -->



<?php 
/* ==================  /loop ==================  */ 
} 
?>
