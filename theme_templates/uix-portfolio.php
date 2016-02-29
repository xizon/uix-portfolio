<?php
/**
 * Template Name: Uix Portfolio
 *
 * The template for displaying portfolio pages.
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


// Layout
$layout = get_theme_mod( 'custom_uix_portfolio_layout', 'standard' );

// To change the number of posts displayed on your portfolio
$per = intval( get_theme_mod( 'custom_uix_portfolio_show', 10 ) );


//Get portfolio list number
global $wp_count;
		
	
// Infinite scroll support
$infinitescroll_section_1 = '';
$infinitescroll_section_2 = '';
$infinitescroll_enable = false;

if ( get_theme_mod( 'custom_uix_portfolio_infinitescroll_list', false ) ) {
  //if true
  $infinitescroll_section_1 = '<div id="uix-portfolio-infinite-scroll-content">';	
  $infinitescroll_section_2 = '</div><!-- /.uix-portfolio-infinite-scroll-content -->';
  $infinitescroll_enable = true;

} 

// Filterable
$filterable_id = '';
$filterable_cat_id = '';
if ( $layout == 'filterable' ) {
	
	add_action( 'wp_footer', 'uix_portfolio_filterable_init', 100 );
	
	$filterable_id = 'id="uix-portfolio-filter-stage"';
	$filterable_cat_id = 'id="uix-portfolio-cat-list-filter"';
	
	//lists all of the posts.
	$per = -1;
	
	//remove infinite scroll
	$infinitescroll_section_1 = '';
	$infinitescroll_section_2 = '';
	$infinitescroll_enable = false;
	
	
}

// Masonry
$masonry_id = '';
if ( $layout == 'masonry' ) {
	
	add_action( 'wp_footer', 'uix_portfolio_masonry_init', 100 );
	
	$masonry_id = 'id="uix-portfolio-masonry-gallery"';
	
}




get_header(); ?>

    <div class="uix-portfolio-container">
            
            <header>
                <h1 class="uix-portfolio-heading">
                    <?php the_title();?>
                </h1>
            </header>
            
            
            <!-- ==================  Categories ==================  -->
            <section class="uix-portfolio-cat-list" <?php echo $filterable_cat_id; ?>>
            
                    <ul>
						<?php 
                         //Portfolio categories
						 if ( $layout == 'filterable' ) {
							 get_template_part( 'partials', 'uix_portfolio_catgory_filterable' );
						 } else {
							 get_template_part( 'partials', 'uix_portfolio_catgory_standard' );
						 }
                         
                        ?>

                    </ul>
                    <div class="clear"></div>
            
            </section>	
            
            <!-- ==================  /Categories ==================  -->
                        
            
            <section class="body">
            
                
        
                            <!-- ==================  Post list ==================  -->
                          
                            <div class="uix-portfolio-list" <?php echo $filterable_id.$masonry_id; ?>>
                            
                            <?php echo $infinitescroll_section_1; ?> 
                            
                            <?php 
                            
                                // Query
                                $wp_query = new WP_Query(
                                    array(
                                        'post_type'      => 'uix-portfolio',
                                        'showposts' => $per, 
                                        'paged' => $paged
                                    )
                                );
                                
                                    $wp_count = 0;
                                    
                                if ( $wp_query->have_posts() ) { 
                            
                                                      
                                            // Loop through each item
                                            while ($wp_query->have_posts()) : $wp_query->the_post(); 
                                            
                                            
                                                     $wp_count++;
                                                     
                                                      get_template_part( 'content_uix_portfolio', get_post_format() );
                                                
                                                
                                                      if ( $wp_count == '2' ) $wp_count = 0;
                                                      
                                                
                                            endwhile; 
                                            
                                 ?>
                                 
                                 <?php } else { ?>
                    
                                <?php get_template_part( 'content', 'none' ); ?>
                    
                            <?php } ?>
                            
                            <?php echo $infinitescroll_section_2; ?> 
                            
                            </div><!-- /.uix-portfolio-list -->
                                
                         
                            <!-- ==================  /Post list ==================  -->
                            
                            
                             
                             
                             
                             
                    
                            
                            <!-- ==================  Pagination ==================  -->
                            <div class="clear"></div>
                            <div class="uix-portfolio-pagination">
                                <?php 
                                        //Use Infinite Scroll
                                        if ( $infinitescroll_enable == true ) {
                                            UixPortfolio::loadmore();
											add_action( 'wp_footer', 'uix_portfolio_infinite_scroll_init', 100 );	
                                            
                                        }

                  
										 if ( get_theme_mod( 'custom_pagination', true ) ) {
												//Use numeric Paginate
												UixPortfolio::pagination( 3, '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>', true, $infinitescroll_enable );	 
										 } else {
												//Only "next" and "previous" button
												UixPortfolio::pagejump( '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>', true, $infinitescroll_enable ); 
										 }
                                  
                                ?>
                            </div>
                            <!-- ==================  /Pagination ==================  -->
                            
                           

         
                         
            </section>

    </div><!-- /.container -->



<?php get_footer(); ?>


