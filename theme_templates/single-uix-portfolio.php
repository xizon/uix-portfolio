<?php
/**
 * The Template for displaying your single portfolio posts
 *
 */
 
// Return if doesn't have the class.
if ( !class_exists( 'UixPortfolio' ) ) { 
    echo '
		<p><strong><span style="display: block; margin: 0.5em 0.5em 0 0; clear: both;">'.__( 'This theme comes packaged with the following plugins:', 'uix-portfolio' ).' </span>
		<span style="display: block; margin: 0.5em 0.5em 0 0; clear: both;">'.__( 'The following required plugin is currently inactive:', 'uix-portfolio' ).' <em>Uix Portfolio</em>.</span>
		<span style="display: block; margin: 0.5em 0.5em 0 0; clear: both;"><a href="'.admin_url().'/themes.php?page='.wp_get_theme()->get( 'TextDomain' ).'-install-required-plugins&#038;plugin_status=activate">'.__( 'Begin activating plugin', 'uix-portfolio' ).'</a></span>
		</strong></p>
	';
    return;
}
 
 
//Uix Portfolio paged template declaration
global $uix_portfolio_temp;
$uix_portfolio_temp = true;


get_header(); ?>



<?php 
// Start the loop.
while ( have_posts() ) : the_post();
?>
	<div class="uix-portfolio-container-contained">
    
    
                <div class="uix-portfolio-single-main">
                

                        <div class="uix-portfolio-single-detail">
                        
                        
                           <!-- ==================  Display media ==================  -->	    
                            <?php get_template_part( 'content_uix_portfolio', get_post_format() ); ?>
                            <!-- ==================  /Display media ==================  -->	
                   
                         
                                        
                            <!-- ==================  Pagination ==================  -->
                            <div class="clear"></div>
                            <div class="uix-portfolio-pagination uix-portfolio-pagination-single">
                                  <ul>
                                  
                                    <li class="previous"><?php echo str_replace( 'rel="prev"', 'class="prev page-numbers"', get_previous_post_link( '%link', ''.__( 'Previous Post', 'uix-portfolio' ).'' )); ?></li>
                                    <li class="next"><?php echo str_replace( 'rel="next"', 'class="next page-numbers"', get_next_post_link( '%link', ''.__( 'Next Post', 'uix-portfolio' ).'' )); ?></li>

                                  </ul>

                            </div>
                            <!-- ==================  /Pagination ==================  -->

                            
                            <!-- ==================  Edit button ==================  -->	 
                            <?php edit_post_link( __( 'Edit', 'uix-portfolio' ), '<p class="edit-link">', '</p>' ); ?>
                            <!-- ==================  /Edit button ==================  -->	
                            

                        
                        </div><!-- /.uix-portfolio-single-detail -->
                
                </div> <!-- /.uix-portfolio-single-main -->
                
                 <div class="uix-portfolio-single-side">
                 
                    <h1><?php echo get_the_title(); ?></h1>
                    
                    <p>
                    <?php
                        $time_string = '<time class="post-date block" itemprop="datePublished" datetime="%1$s">%2$s</time>';
               
                        printf( $time_string,
                            esc_attr( get_the_date( 'c' ) ),
                            get_the_date()
                        );
                    
                    ?>
                    </p>

                 
                    <p><?php echo uix_portfolio_get_post_views(get_the_ID()); ?> <?php _e( 'views', 'uix-portfolio' ); ?></p>
                    <p>
                    
                                <?php if ( $this_post_cat = UixPortfolio::list_post_terms( 'uix_portfolio_category', false ) ) { 

                                      $this_post_cat_nolink = strip_tags( $this_post_cat );
                        
                               echo $this_post_cat; 
                           } 
                          ?>
                     </p>
                     
                     <hr>
                     
                    <!-- ==================  Post Content ==================  -->	 
                    <?php the_content(); ?>
                           
                    <!-- ==================  /Post Content ==================  -->	 
                    

                 
                
                </div> <!-- /.uix-portfolio-single-side -->
                
                <div class="clear"></div>
                                           
   
        
   
        
   </div><!-- /.uix-portfolio-container-contained --> 
             

<?php
// End the loop.
endwhile;
?>  
    
    
<?php get_footer(); ?>
