<?php
/*adding theme options panel*/
$wp_customize->add_panel( 'agami-shop-design-panel', array(
    'priority'       => 90,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Layout/Design Options', 'agami-shop' )
) );

$wp_customize->get_section( 'background_image' )->panel = 'agami-shop-design-panel';
$wp_customize->get_section( 'background_image' )->priority = 50;

/*
* file for sidebar layout
*/
require_once agami_shop_file_directory('agamithemes/customizer/design-options/sidebar-layout.php');

/*
* file for front page
*/
require_once agami_shop_file_directory('agamithemes/customizer/design-options/front-page.php');

/*
* file for front page sidebar layout options
*/
require_once agami_shop_file_directory('agamithemes/customizer/design-options/front-page-sidebar-layout.php');

/*
* file for front archive sidebar layout options
*/
require_once agami_shop_file_directory('agamithemes/customizer/design-options/archive-sidebar-layout.php');

/*
* Category color options
*/
require_once agami_shop_file_directory('agamithemes/customizer/design-options/colors-cats.php');

/*
* file for sticky sidebar
*/
require_once agami_shop_file_directory('agamithemes/customizer/design-options/sticky-sidebar.php');

/*
* file for blog layout
*/
require_once agami_shop_file_directory('agamithemes/customizer/design-options/blog-layout.php');

/*
* file for color options
*/
require_once agami_shop_file_directory('agamithemes/customizer/design-options/colors-options.php');