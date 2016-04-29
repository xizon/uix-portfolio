<?php
/**
 * Custom Widget for displaying recent portfolio
 *
 * @link https://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 */

class Uix_Portfolio_Recent_Portfolio_Widget extends WP_Widget {


	public function __construct() {
		parent::__construct( 'Uix_Portfolio_recent_portfolio_widget', __( 'Recent Portfolio (Uix Portfolio Widget)', 'uix-portfolio' ), array(
			'classname'   => 'Uix_Portfolio_recent_portfolio_widget',
			'description' => __( 'Use this widget to list your recent portfolio.', 'uix-portfolio' ),
		) );
	}

	/**
	 * Output the HTML for this widget.
	 *
	 */
	public function widget( $args, $instance ) {

		$number = empty( $instance['number'] ) ? 2 : absint( $instance['number'] );
		$title  = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Recent Portfolio', 'uix-portfolio' ) : $instance['title'], $instance, $this->id_base );

		$recent_portfolio = new WP_Query( array(
			'order'          => 'DESC',
			'posts_per_page' => $number,
			'no_found_rows'  => true,
			'post_status'    => 'publish',
			'post__not_in'   => get_option( 'sticky_posts' ),
			'post_type'      => 'uix-portfolio',
		) );

		if ( $recent_portfolio->have_posts() ) :
			$tmp_content_width = $GLOBALS['content_width'];
			$GLOBALS['content_width'] = 220;

			echo $args['before_widget'];
			?>
			<h4 class="widget-title recent-portfolio">
				<?php echo esc_html( $title ); ?>
			</h4>
			<ul class="uix-portfolio-widget">

				<?php
					while ( $recent_portfolio->have_posts() ) :
						$recent_portfolio->the_post();
						$tmp_more = $GLOBALS['more'];
						$GLOBALS['more'] = 0;
						
						$li_class = '';
						if ( !has_post_thumbnail() ) $li_class = 'nothumb';
							
						
				?>
				<li class="uix-portfolio-recent-item <?php echo $li_class; ?>">
                      
						  <?php if ( has_post_thumbnail() ) { ?>
                           <div class="item-thumb">
                               <a href="<?php the_permalink(); ?>">
                           <?php
                                the_post_thumbnail( 'uix-portfolio-entry', array(
                                    'alt' => get_the_title(),
									'data-uix-portfolio-retina' => wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'uix-portfolio-retina-entry' )[0],
                                ) ); 
							?>
                                </a>
                            </div>
                            <?php } ?>
                       
                       <div class="item-info">
                           <div class="item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                           <div class="item-date"><?php the_date(); ?></a></div>

                       </div>
                     
    
				</li>
				<?php endwhile; ?>

			</ul>
			
			<?php

			echo $args['after_widget'];

			// Reset the post globals as this query will have stomped on it.
			wp_reset_postdata();

			$GLOBALS['more']          = $tmp_more;
			$GLOBALS['content_width'] = $tmp_content_width;

		endif; // End check for recent_portfoliol posts.
	}

	/**
	 * Deal with the settings when they are saved by the admin.
	 *
	 * Here is where any validation should happen.
	 *
	 */
	function update( $new_instance, $instance ) {
		$instance['title']  = strip_tags( $new_instance['title'] );
		$instance['number'] = empty( $new_instance['number'] ) ? 2 : absint( $new_instance['number'] );
		
		return $instance;
	}

	/**
	 * Display the form for this widget on the Widgets page of the Admin area.
	 *
	 */
	function form( $instance ) {
		$title  = empty( $instance['title'] ) ? '' : esc_attr( $instance['title'] );
		$number = empty( $instance['number'] ) ? 2 : absint( $instance['number'] );
		?>
			<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'uix-portfolio' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>"></p>

			<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php _e( 'Number of posts to show:', 'uix-portfolio' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" size="3"></p>


		<?php
	}
}
