<?php
/**
 * The default template for displaying portfolio's video post format content.
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
    

    <div class="post-single-video">

			<?php echo wp_oembed_get( get_post_meta( get_the_ID(), 'uix_portfolio_video', true ) ); ?>
    

    </div>
    
<?php 
/* ==================  /single ==================  */ 


} else { 
/* ==================  loop ==================  */  

    $cat_termlist = get_the_term_list( get_the_ID(), 'uix_portfolio_category', '', ', ', '' );
?>


     <div id="post-<?php the_ID(); ?>" class="item item-video item-<?php echo $wp_count; ?> <?php echo UixPortfolio::cat_class( $cat_termlist ); ?> infinite-scroll-list" <?php echo UixPortfolio::cat_class_filter( $cat_termlist ); ?>>
        <span class="image">
            <a href="<?php echo esc_url( get_permalink() );?>" title="<?php echo esc_attr( get_the_title() ); ?>">

            
                 <?php if ( has_post_thumbnail()) { ?>
                    
                        <?php
                        // Display post thumbnail
                        the_post_thumbnail( $thumbnail_size, array(
                            'alt' => get_the_title(),
                            'class'	=> 'portfolio-img',
                            'data-uix-portfolio-retina' => wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $thumbnail_retina_size )[0],
                        ) ); 
                        ?>
                   
    
                 <?php } else { ?>
                 
                       <?php echo wp_oembed_get( get_post_meta( get_the_ID(), 'uix_portfolio_video', true ), array( 'width'=>get_theme_mod( 'custom_uix_portfolio_cover_size_w', 475 ), 'height'=>get_theme_mod( 'custom_uix_portfolio_cover_size_h', 329 ) ) ); ?>
                 
                 <?php } ?>

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
