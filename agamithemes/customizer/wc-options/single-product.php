<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'agami-shop-wc-single-product-options', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Single Product', 'agami-shop' ),
	'panel'          => 'agami-shop-wc-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-wc-single-product-sidebar-layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-wc-single-product-sidebar-layout'],
	'sanitize_callback' => 'agami_shop_sanitize_select'
) );
$choices = agami_shop_sidebar_layout();
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-wc-single-product-sidebar-layout]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Single Product Sidebar Layout', 'agami-shop' ),
	'section'   => 'agami-shop-wc-single-product-options',
	'settings'  => 'agami_shop_theme_options[agami-shop-wc-single-product-sidebar-layout]',
	'type'	  	=> 'select'
) );