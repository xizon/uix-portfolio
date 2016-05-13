<?php
/**
 * Building WordPress themes using the Kirki Customizer
 *
 */

if ( class_exists( 'Kirki' )  && class_exists( 'UixPortfolio' )  ) {
	
	global $wp_customize;
	
	$uix_portfolio_kirki_config_id = 'uix_portfolio_kirki_custom';
	
	/*
	*
	* Kirki customizer configuration
	*
	*/
	
	Kirki::add_config( $uix_portfolio_kirki_config_id, array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
	) );
	

	
	
	//Function of "Allowing html in text"
	function uix_portfolio_kirki_do_not_filter_anything( $value ) {
		return $value;
	}
		
	
			
	//This function adds some styles to the WordPress Customizer
	function uix_portfolio_kirki_custom_style() {
	
		wp_enqueue_style( 'kirki-customizer-custom-css', UixPortfolio::plug_directory() .  'customizer-extras/css/main.css', null, null );

	}
	if ( $wp_customize ) {
	
		add_action( 'customize_controls_print_styles', 'uix_portfolio_kirki_custom_style', 100 );
		
	}
	


    /*
     * ------------------------------------------------------------------------------------------------
     */

	
	Kirki::add_section( 'panel-theme-uix-portfolio', array(
		'title'          => __( 'Uix Portfolio Settings', 'uix-portfolio' ),
		'priority'       => 1,
		'capability'     => 'edit_theme_options',
	) );
	
	
	/**
	 * Add the configuration.
	 * 
	 * will inherit these options
	 */
	
		


	Kirki::add_field( $uix_portfolio_kirki_config_id, array(
		'type'        => 'slider',
		'settings'    => 'custom_uix_portfolio_show',
		'label'       => __( 'Portfolio Pages Show at Most', 'uix-portfolio' ),
		'description' => '',
		'section'     => 'panel-theme-uix-portfolio',
		'default'     => '10',
		'priority'    => 10,
		'choices' => array(
			'min' => 1,
			'max' => 100,
			'step' => 1,
		),
	) );


	
	Kirki::add_field( $uix_portfolio_kirki_config_id, array(
		'type'        => 'radio-image',
		'settings'    => 'custom_uix_portfolio_layout',
		'label'       => __( 'Portfolio Layout', 'uix-portfolio' ),
		'description' => '',
		'section'     => 'panel-theme-uix-portfolio',
		'default'     => 'standard',
		'priority'    => 10,
		'choices'     => array(
			'standard'   => UixPortfolio::plug_directory() . 'customizer-extras/images/layout-style-1.png',
			'filterable' => UixPortfolio::plug_directory() . 'customizer-extras/images/layout-style-2.png',
			'masonry'  => UixPortfolio::plug_directory() . 'customizer-extras/images/layout-style-3.png',
		),
	) );
	
	Kirki::add_field( $uix_portfolio_kirki_config_id, array(
		'type'        => 'radio',
		'settings'    => 'custom_uix_portfolio_coversize',
		'label'       => __( 'Thumbnail Size', 'uix-portfolio' ),
		'description' => '',
		'section'     => 'panel-theme-uix-portfolio',
		'default'     => 'medium',
		'priority'    => 10,
		'choices'     => array(
			'large'   => __( 'Large', 'uix-portfolio' ),
			'medium' => __( 'Medium', 'uix-portfolio' ),
			'small' => __( 'Small', 'uix-portfolio' ),
		),
	) );


	Kirki::add_field( $uix_portfolio_kirki_config_id, array(
		'type'        => 'switch',
		'settings'    => 'custom_uix_portfolio_infinitescroll_list',
		'label'       => __( 'Add Infinite Scroll to Your Portfolio', 'uix-portfolio' ),
		'description' => __( 'Automatically append the next page of posts (via AJAX) to your page when a user scrolls to the bottom or clicks button of loading from the bottom.', 'uix-portfolio' ),
		'section'     => 'panel-theme-uix-portfolio',
		'default'     => false,
		'priority'    => 10,
	) );


	
	
	Kirki::add_field( $uix_portfolio_kirki_config_id, array(
		'type'        => 'switch',
		'settings'    => 'custom_uix_portfolio_infinitescroll_eff',
		'label'       => __( 'Infinite Scrolling Occurs when You Scroll to The Bottom', 'uix-portfolio' ),
		'description' => __( 'Close to the bottom the refresh occurs, and this option acts on posts. When this option is enabled, you will see the effect.', 'uix-portfolio' ),
		'section'     => 'panel-theme-uix-portfolio',
		'default'     => false,
		'priority'    => 10,
	) );



	Kirki::add_field( $uix_portfolio_kirki_config_id, array(
		'type'        => 'custom',
		'settings'    => 'custom_uix_portfolio_cover_size_title',
		'label'       => __( 'Image Size for Cover Thumbnails', 'uix-portfolio' ),
		'description' => '',
		'section'     => 'panel-theme-uix-portfolio',
		'default'     => '',
		'priority'    => 10,
	) );


	Kirki::add_field( $uix_portfolio_kirki_config_id, array(
		'type'        => 'text',
		'settings'    => 'custom_uix_portfolio_cover_size_w',
		'label'       => '',
		'description' => __( 'Max Width (in px)', 'uix-portfolio' ),
		'section'     => 'panel-theme-uix-portfolio',
		'default'     => '475',
		'priority'    => 10
	) );
	
	Kirki::add_field( $uix_portfolio_kirki_config_id, array(
		'type'        => 'text',
		'settings'    => 'custom_uix_portfolio_cover_size_h',
		'label'       => '',
		'description' => __( 'Max Height (in px)', 'uix-portfolio' ),
		'section'     => 'panel-theme-uix-portfolio',
		'default'     => '329',
		'priority'    => 10
	) );
	
	Kirki::add_field( $uix_portfolio_kirki_config_id, array(
		'type'        => 'custom',
		'settings'    => 'custom_uix_portfolio_single_size_title',
		'label'       => __( 'Image Size for Entry', 'uix-portfolio' ),
		'description' => '',
		'section'     => 'panel-theme-uix-portfolio',
		'default'     => '',
		'priority'    => 10,
	) );


	Kirki::add_field( $uix_portfolio_kirki_config_id, array(
		'type'        => 'text',
		'settings'    => 'custom_uix_portfolio_single_size_w',
		'label'       => '',
		'description' => __( 'Max Width (in px)', 'uix-portfolio' ),
		'section'     => 'panel-theme-uix-portfolio',
		'default'     => '1920',
		'priority'    => 10
	) );
	
	Kirki::add_field( $uix_portfolio_kirki_config_id, array(
		'type'        => 'text',
		'settings'    => 'custom_uix_portfolio_single_size_h',
		'label'       => '',
		'description' => __( 'Max Height (in px)', 'uix-portfolio' ),
		'section'     => 'panel-theme-uix-portfolio',
		'default'     => '9999',
		'priority'    => 10
	) );
	


	
	//Read css file value
	global $org_cssname_uix_portfolio;
	global $org_csspath_uix_portfolio;

    $org_cssname_uix_portfolio = 'uix-portfolio-style.css';
	$org_csspath_uix_portfolio = get_template_directory_uri() .'/'. $org_cssname_uix_portfolio;
	
	
	function uix_portfolio_view_style() {
		

		global $org_cssname_uix_portfolio;
		global $org_csspath_uix_portfolio;
	
		
		wp_nonce_field( 'customize-filesystem-nonce' );
		
		// capture output from WP_Filesystem
		ob_start();
		
			UixPortfolio::wpfilesystem_read_file( 'customize-filesystem-nonce', 'customize.php', '', $org_cssname_uix_portfolio, 'theme' );
			$filesystem_uix_portfolio_out = ob_get_contents();
		ob_end_clean();
		
		if ( empty( $filesystem_uix_portfolio_out ) ) {
			
			$style_org_code_uix_portfolio = UixPortfolio::wpfilesystem_read_file( 'customize-filesystem-nonce', 'customize.php', '', $org_cssname_uix_portfolio, 'theme' );
			
			echo '
					 <div class="uix-portfolio-dialog-mask"></div>
					 <div class="uix-portfolio-dialog" id="uix-portfolio-view-css-container">  
						<textarea rows="15" style=" width:95%;" class="regular-text">'.$style_org_code_uix_portfolio.'</textarea>
						<a href="javascript:" id="uix_portfolio_close_css" class="close button button-primary">'.__( 'Close', 'uix-portfolio' ).'</a>  
					</div>
					<script type="text/javascript">
						
					( function($) {
						
						"use strict";
						
						$( function() {
							
							var dialog_uix_portfolio = $( "#uix-portfolio-view-css-container, .uix-portfolio-dialog-mask" );  
							
							$( "#uix_portfolio_view_css" ).click( function() {
								dialog_uix_portfolio.show();
							});
							$( "#uix_portfolio_close_css" ).click( function() {
								dialog_uix_portfolio.hide();
							});
						
				
						} );
						
					} ) ( jQuery );
					
					</script>
			
			';	
	
		} else {
			
			echo '
					
					<script type="text/javascript">
						
					( function($) {
						
						"use strict";
						
						$( function() {
							
							$( "#uix_portfolio_view_css" ).attr({ "href": "'.$org_csspath_uix_portfolio.'", "target":"_blank" });
				
						} );
						
					} ) ( jQuery );
					
					</script>
			
			';	
			
			
		}
		
	}
	
	
    add_action( 'customize_controls_print_scripts', 'uix_portfolio_view_style' );


	Kirki::add_field( $uix_portfolio_kirki_config_id, array(
		'type'        => 'custom',
		'settings'    => 'custom_uix_portfolio_css_tip',
		'label'       => __( 'Custom CSS', 'uix-portfolio' ),
		'description' => __( 'You can overview the original styles to overwrite it. It will be on creating new styles to your website, without modifying original <code>.css</code> files.', 'uix-portfolio' ),
		'section'     => 'panel-theme-uix-portfolio',
		'default'     => '
        <p>'.__( 'CSS file root directory:', 'uix-portfolio' ).'
            <a href="javascript:" id="uix_portfolio_view_css" >'.$org_csspath_uix_portfolio.'</a>
        </p>  
		',
		'priority'    => 10
	) );
	
	Kirki::add_field( $uix_portfolio_kirki_config_id, array(
		'type'        => 'code',
		'settings'    => 'custom_uix_portfolio_css',
		'label'       => '',
		'description' => '',
		'section'     => 'panel-theme-uix-portfolio',
		'default'     => '',
		'priority'    => 10,
		'choices'     => array(
			'language' => 'css',
			'theme'    => 'monokai',
			'height'   => 250,
		),
	) );

	



}