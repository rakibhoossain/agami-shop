<?php
/*adding theme options panel*/
$wp_customize->add_panel( 'agami-shop-wc-panel', array(
	'priority'       => 100,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'WooCommerce Options', 'agami-shop' )
) );

/*
* file for shop archive
*/
require_once agami_shop_file_directory('agamithemes/customizer/wc-options/shop-archive.php');

/*
* file for single product
*/
require_once agami_shop_file_directory('agamithemes/customizer/wc-options/single-product.php');