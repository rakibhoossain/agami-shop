<?php
/*adding theme options panel*/
$wp_customize->add_panel( 'agami-shop-options', array(
    'priority'       => 210,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Theme Options', 'agami-shop' ),
    'description'    => esc_html__( 'Customize your awesome site with theme options ', 'agami-shop' )
) );

/*
* file for social options
*/
require_once agami_shop_file_directory('agamithemes/customizer/options/social-options.php');

/*
* file for header breadcrumb options
*/
require_once agami_shop_file_directory('agamithemes/customizer/options/breadcrumb.php');

/*
* file for header search options
*/
require_once agami_shop_file_directory('agamithemes/customizer/options/search.php');