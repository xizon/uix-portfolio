<?php

function uix_portfolio_options_page(){
	
    //must check that the user has the required capability 
    if (!current_user_can('manage_options'))
    {
      wp_die( __('You do not have sufficient permissions to access this page.', 'uix-portfolio') );
    }

  
?>

<style>
.uix-bg-custom-wrapper img{
	background-color:#fff;
    border: 1px solid #ddd;
    padding: 5px;
	-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	-moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.uix-bg-custom-wrapper a{
	text-decoration:none;
}

.uix-bg-custom-wrapper code{
	border:1px solid #B1B1B1;
	-webkit-border-radius: 2px; 
	-moz-border-radius: 2px; 
	border-radius: 2px;
	line-height:1.1em;
	margin-bottom:5px;
	display:inline-block;
	
}

.uix-bg-custom-title{
	font-size:1.1em;
	font-weight:bold;
}
.uix-bg-custom-title strong{
	color:#D16E15;
}

</style>

<div class="wrap uix-bg-custom-wrapper">
    
    <h2><?php _e( 'Uix Portfolio Helper', 'uix-portfolio' ); ?></h2>
    <?php
	
	if( !isset( $_GET[ 'tab' ] ) ) {
		$active_tab = 'about';
	}
	
	if( isset( $_GET[ 'tab' ] ) ) {
		$active_tab = $_GET[ 'tab' ];
	} 
	
	$tabs = array();
	$tabs[] = array(
	    'tab'     =>  'about', 
		'title'   =>  __( 'About', 'uix-portfolio' )
	);
	$tabs[] = array(
	    'tab'     =>  'usage', 
		'title'   =>  __( 'How to use?', 'uix-portfolio' )
	);
	
	$tabs[] = array(
	    'tab'     =>  'credits', 
		'title'   =>  __( 'Credits', 'uix-portfolio' )
	);
	
	$tabs[] = array(
	    'tab'     =>  'temp', 
		'title'   =>  __( 'Template Files', 'uix-portfolio' )
	);

	
	?>
    <h2 class="nav-tab-wrapper">
        <?php foreach ( $tabs as $key ) :  ?>
            <?php $url = 'admin.php?page=' . rawurlencode( UixPortfolio::HELPER ) . '&tab=' . rawurlencode( $key[ 'tab' ] ); ?>
            <a href="<?php echo esc_attr( is_network_admin() ? network_admin_url( $url ) : admin_url( $url ) ) ?>"
               class="nav-tab<?php echo $active_tab === $key[ 'tab' ] ? esc_attr( ' nav-tab-active' ) : '' ?>">
                <?php echo $key[ 'title' ] ?>
            </a>
        <?php endforeach ?>
    </h2>

    <?php 
		foreach ( glob( WP_PLUGIN_DIR .'/'.UixPortfolio::get_slug(). "/helper/tabs/*.php") as $file ) {
			include $file;
		}	
	?>
        
    
    
</div>
 
    <?php
     
}