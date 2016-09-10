<?php
/**
 * Building WordPress themes using the Kirki Customizer
 *
 */

if ( class_exists( 'Kirki' )  && class_exists( 'UixPortfolio' )  ) {
	
	
	$uix_portfolio_kirki_config_id = 'uix_portfolio_kirki_custom';
	



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
	


	Kirki::add_field( $uix_portfolio_kirki_config_id, array(
		'type'        => 'custom',
		'settings'    => 'custom_uix_portfolio_css_tip',
		'label'       => __( 'Custom CSS', 'uix-portfolio' ),
		'description' => __( 'You can overview the original styles to overwrite it. It will be on creating new styles to your website, without modifying original <code>.css</code> files.', 'uix-portfolio' ),
		'section'     => 'panel-theme-uix-portfolio',
		'default'     => '
        <p>'.__( 'CSS file root directory:', 'uix-portfolio' ).'
            <a href="'.get_template_directory_uri().'/uix-portfolio-style.css" id="uix_slides_view_css" target="_blank" >'.get_template_directory_uri().'/uix-portfolio-style.css</a>
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