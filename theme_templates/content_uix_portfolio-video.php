<?php
/**
 * The default template for displaying portfolio's video post format content.
 *
 */


//Get portfolio list number
global $wp_count;

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


    <div class="portfolio-item portfolio-item-<?php echo $wp_count; ?> <?php echo UixPortfolio::cat_class( $cat_termlist ); ?> infinite-scroll-list" <?php echo UixPortfolio::cat_class_filter( $cat_termlist ); ?>>
    
         <div id="post-<?php the_ID(); ?>">
         
                 <div class="item-screenshot">
                    <a class="featured-image" href="<?php echo esc_url( get_permalink() );?>" title="<?php echo esc_attr( get_the_title() ); ?>">
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
                             
                                   <?php echo wp_oembed_get( get_post_meta( get_the_ID(), 'uix_portfolio_video', true ), array( 'width'=>get_theme_mod( 'custom_uix_portfolio_cover_size_w', 475 ), 'height'=>get_theme_mod( 'custom_uix_portfolio_cover_size_h', 329 ) ) ); ?>
                             
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
