<?php
/**
 * Custom Widget for displaying recent portfolio
 *
 * @link https://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 */

class Uix_Portfolio_Recent_Portfolio_Widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_uix_portfolio_recentposts',
			'description' => __( 'Use this widget to list your recent portfolio.', 'uix-portfolio' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'uix_portfolio_recentposts', __( 'Recent Portfolio (Uix Portfolio Widget)', 'uix-portfolio' ), $widget_ops );
	}
	

	/**
	 * Output the HTML for this widget.
	 *
	 */
	public function widget( $args, $instance ) {

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 2;
		if ( ! $number )
			$number = 2;
		
		$title  = apply_filters( 'widget_title', !isset( $instance['title'] ) ? __( 'Recent Portfolio', 'uix-portfolio' ) : $instance['title'], $instance, $this->id_base );
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		$recent_portfolio = new WP_Query( array(
		    'post_type'           => 'uix-portfolio',
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
			
		) );

		if ( $recent_portfolio->have_posts() ) :
	
			echo $args['before_widget'];
			?>
			 <?php
             if ( !empty( $title ) ) {
                echo $args['before_title'] . $title . $args['after_title'];
             }
             ?>
			<ul class="uix-portfolio-widget">

				<?php
					while ( $recent_portfolio->have_posts() ) :
						$recent_portfolio->the_post();
		
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
                           <?php if ( $show_date ) { ?>
                               <div class="item-date"><?php echo get_the_date(); ?></div>
                           <?php } ?>

                       </div>
                     
    
				</li>
				<?php endwhile; ?>

			</ul>
			
			<?php

			echo $args['after_widget'];

			// Reset the post globals as this query will have stomped on it.
			wp_reset_postdata();


		endif; // End check for recent_portfoliol posts.
	}

	/**
	 * Deal with the settings when they are saved by the admin.
	 *
	 * Here is where any validation should happen.
	 *
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		
		return $instance;
	}

	/**
	 * Display the form for this widget on the Widgets page of the Admin area.
	 *
	 */
	function form( $instance ) {
		$instance  = wp_parse_args( (array) $instance, array( 'title' => __( 'Recent Portfolio', 'uix-portfolio' ), 'number' => 2 ) );
		$title     = sanitize_text_field( $instance['title'] );
		$number    = absint( $instance['number'] );
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		?>
			<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'uix-portfolio' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>"></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of portfolio to show:', 'uix-portfolio' ); ?></label>
		<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" />
        </p>

		<p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?', 'uix-portfolio' ); ?></label>
        </p>
  

		<?php
	}
}
