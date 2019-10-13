<?php
/*adding sections for header options*/
$wp_customize->add_section( 'agami-shop-header-icons', array(
	'priority'       => 40,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Header Icons', 'agami-shop' ),
	'panel'          => 'agami-shop-header-panel'
) );

/*header icons*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-enable-cart-icon]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-enable-cart-icon'],
	'sanitize_callback' => 'agami_shop_sanitize_checkbox',
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-enable-cart-icon]', array(
	'label'		=> esc_html__( 'Enable Cart', 'agami-shop' ),
	'section'   => 'agami-shop-header-icons',
	'settings'  => 'agami_shop_theme_options[agami-shop-enable-cart-icon]',
	'type'	  	=> 'checkbox'
) );

if ( class_exists( 'YITH_WCWL' ) ){
	$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-enable-wishlist-icon]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['agami-shop-enable-wishlist-icon'],
		'sanitize_callback' => 'agami_shop_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-enable-wishlist-icon]', array(
		'label'		=> esc_html__( 'Enable Wishlist', 'agami-shop' ),
		'section'   => 'agami-shop-header-icons',
		'settings'  => 'agami_shop_theme_options[agami-shop-enable-wishlist-icon]',
		'type'	  	=> 'checkbox'
	) );
}