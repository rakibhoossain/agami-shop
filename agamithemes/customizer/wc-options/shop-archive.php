<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'agami-shop-wc-shop-archive-option', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Shop Archive Sidebar Layout', 'agami-shop' ),
	'panel'          => 'agami-shop-wc-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-wc-shop-archive-sidebar-layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-wc-shop-archive-sidebar-layout'],
	'sanitize_callback' => 'agami_shop_sanitize_select'
) );
$choices = agami_shop_sidebar_layout();
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-wc-shop-archive-sidebar-layout]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Shop Archive Sidebar Layout', 'agami-shop' ),
	'section'   => 'agami-shop-wc-shop-archive-option',
	'settings'  => 'agami_shop_theme_options[agami-shop-wc-shop-archive-sidebar-layout]',
	'type'	  	=> 'select'
) );

/*wc-product-column-number*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-wc-product-column-number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-wc-product-column-number'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-wc-product-column-number]', array(
	'label'		=> esc_html__( 'Products Per Row', 'agami-shop' ),
	'section'   => 'agami-shop-wc-shop-archive-option',
	'settings'  => 'agami_shop_theme_options[agami-shop-wc-product-column-number]',
	'type'	  	=> 'number'
) );

/*wc-shop-archive-total-product*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-wc-shop-archive-total-product]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-wc-shop-archive-total-product'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-wc-shop-archive-total-product]', array(
	'label'		=> esc_html__( 'Total Products Per Page', 'agami-shop' ),
	'section'   => 'agami-shop-wc-shop-archive-option',
	'settings'  => 'agami_shop_theme_options[agami-shop-wc-shop-archive-total-product]',
	'type'	  	=> 'number'
) );