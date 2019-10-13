<?php
/*adding header top options panel*/
$wp_customize->add_panel( 'agami-shop-header-top-panel', array(
	'priority'       => 11,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Header Top', 'agami-shop' ),
) );
/*
* file for header top options
*/
require_once agami_shop_file_directory('agamithemes/customizer/header-top/header-top.php');

/*
* file for basic info
*/
require_once agami_shop_file_directory('agamithemes/customizer/header-top/basic-info.php');