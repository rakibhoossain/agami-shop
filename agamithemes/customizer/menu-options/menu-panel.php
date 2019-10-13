<?php
/*Menu Panel*/
$wp_customize->add_panel( 'agami-shop-header-menu', array(
	'priority'       => 50,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Menu Options', 'agami-shop' )
) );
/*
* Special Menu
*/
require_once agami_shop_file_directory('agamithemes/customizer/menu-options/special-menu.php');

/*
* Sticky Menu
*/
require_once agami_shop_file_directory('agamithemes/customizer/menu-options/sticky-menu.php');

/*
* Menu Right
*/
require_once agami_shop_file_directory('agamithemes/customizer/menu-options/menu-right.php');