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
	<div class="uix-portfolio-container">
    
    
                <article itemscope itemtype="http://schema.org/Article">
        
        
                        
                            <div class="content-container">
                            
                            
                                    <section class="post-container post">
                                    
                                              <header class="post-header">
                                                
                                                    <!-- ==================  Heading ==================  -->	
                                                    <h1 class="entry-title" itemprop="headline"><?php echo get_the_title(); ?></h1>
                                                    <!-- ==================  /Heading ==================  -->	
        
                                                    
                                            
                                                                
                                              </header>
                                
                                                <section class="post-content post-content-side post-content-detail">
                                                    
                                                    <div itemprop="articleBody">
                                                    
                                                    
                                                       <!-- ==================  Display media ==================  -->	    
                                                             <?php
                                                        // 
                                                        if( 'quote' != get_post_format() ) {
                                                            get_template_part( 'content_uix_portfolio', get_post_format() ); 
                                                        } 
                                                        ?>
                                                        <!-- ==================  /Display media ==================  -->	
                                               
                                              
                                                        
                                                        <!-- ==================  Post Content ==================  -->	 
                                                        <?php 
                                                                    
                                                                    the_content();
                                                                    
                                                                    wp_link_pages( array(
                                                                        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'uix-portfolio' ) . '</span>',
                                                                        'after'       => '</div>',
                                                                        'link_before' => '<span>',
                                                                        'link_after'  => '</span>',
                                                                        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'uix-portfolio' ) . ' </span>%',
                                                                        'separator'   => '<span class="screen-reader-text">, </span>',
                                                                    ) );
                                                               ?>
                                                               
                                                        <!-- ==================  /Post Content ==================  -->	 
                                                        
                                                        
                                                        
                                                        
                                                        <!-- ==================  Edit button ==================  -->	 
                                                        <?php edit_post_link( __( 'Edit', 'uix-portfolio' ), '<p class="edit-link">', '</p>' ); ?>
                                                        <!-- ==================  /Edit button ==================  -->	
        
        
                                                    
                                                    </div>
                              
                                                </section> 
                                
                                
                                
                                
                                
                                                  <div class="clearfix post-content-side">
        
                                                  
                                  
                                                        <!-- ==================  Pagination ==================  -->	
                                                        <div class="site-pagination normal">
                                                          <ul class="pager">
                                                          
                                                            <li class="previous"><?php echo str_replace( 'rel="prev"', 'class="prev page-numbers"', get_previous_post_link( '%link', ''.__( 'Previous Post', 'uix-portfolio' ).'' )); ?></li>
                                                            <li class="next"><?php echo str_replace( 'rel="next"', 'class="next page-numbers"', get_next_post_link( '%link', ''.__( 'Next Post', 'uix-portfolio' ).'' )); ?></li>
                        
                                                          </ul>
                                                        </div>	
                                                        <!-- ==================  /Pagination ==================  -->	
                                                     
                          
        
                                                        
                                                        
                                                        
                                                  </div>
        
        
                                </section>
                                <!-- post end -->	
                                
        
        
                            
                            </div><!-- /.content-container -->
                            
                            <div class="sidebar-container sidebar-container-single">
                                 
                                 
                                     <div class="side" role="secondary">
        
                                      
                                          <!-- ==================  Status ==================  -->	
                                          <div class="clearfix">
                                                <p class="post-info">
                                                
													<?php
                                                        $time_string = '<time class="post-date block" itemprop="datePublished" datetime="%1$s"><i class="fa fa-clock-o"></i> %2$s</time>';
                                               
                                                        printf( $time_string,
                                                            esc_attr( get_the_date( 'c' ) ),
                                                            get_the_date()
                                                        );
                                                    
                                                    ?>
            
                                                    <span class="post-submitted block" itemscope itemtype="http://schema.org/Person" itemprop="author"><i class="fa fa-user"></i> by <span itemprop="name"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author" itemprop="url"><span itemprop="name"><?php echo get_the_author(); ?></span></a></span></span>
                                                   
                                                    <span class="post-views block"><i class="fa fa-eye"></i> <?php echo uix_portfolio_get_post_views(get_the_ID()); ?> views</span>
                                                    <span class="post-views block"><i class="fa fa-bookmark"></i> 
                                                    
														    	<?php if ( $this_post_cat = UixPortfolio::list_post_terms( 'uix_portfolio_category', false ) ) { 

																	  $this_post_cat_nolink = strip_tags( $this_post_cat );
                                                        
                                                               echo $this_post_cat; 
                                                           } 
                                                          ?>
                                                           
                                                    </span>
                                                    
                                                </p>
                                                <hr>
                                            </div>
                                           <!-- ==================  /Status ==================  -->
                                            
                     
                
                                    </div><!-- / role="secondary" -->
                                
                                
                                
                                
                            </div><!-- /.sidebar-container -->
                            
                            <div class="clear"></div>
                            
             
            
                                            
          </article>
        
   
        
   </div><!-- /.container --> 
             

<?php
// End the loop.
endwhile;
?>  
    
    
<?php get_footer(); ?>
