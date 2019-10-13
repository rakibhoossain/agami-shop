<?php
/*adding header options panel*/
$wp_customize->add_panel( 'agami-shop-header-panel', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Header Main', 'agami-shop' ),
    'description'    => esc_html__( 'Customize your awesome site header', 'agami-shop' )
) );

/*
* file for header logo options
*/
require_once agami_shop_file_directory('agamithemes/customizer/header-options/header-logo.php');

/*
* file for site identity options
*/
require_once agami_shop_file_directory('agamithemes/customizer/header-options/site-identity-placement.php');

/*
* file for header media display option
*/
require_once agami_shop_file_directory('agamithemes/customizer/header-options/header-media.php');

/*
* file for header main
*/
require_once agami_shop_file_directory('agamithemes/customizer/header-options/header-main.php');

/*
* file for header icons
*/
if( agami_shop_is_woocommerce_active() ){
	require_once agami_shop_file_directory('agamithemes/customizer/header-options/header-icons.php');
}