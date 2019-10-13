<?php
/*Menu Right Section*/
$wp_customize->add_section( 'agami-shop-menu-right', array(
	'priority'       => 50,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Menu Right Options', 'agami-shop' ),
	'panel'          => 'agami-shop-header-menu',
) );

/*Menu Right Text and Link*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-menu-right-text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-menu-right-text'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-menu-right-text]', array(
	'label'		=> esc_html__( 'Menu Right Text', 'agami-shop' ),
	'section'   => 'agami-shop-menu-right',
	'settings'  => 'agami_shop_theme_options[agami-shop-menu-right-text]',
	'type'	  	=> 'text'
) );

/*Highlight text*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-menu-right-highlight-text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-menu-right-highlight-text'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-menu-right-highlight-text]', array(
	'label'		=> esc_html__( 'Menu Right Highlight Text', 'agami-shop' ),
	'section'   => 'agami-shop-menu-right',
	'settings'  => 'agami_shop_theme_options[agami-shop-menu-right-highlight-text]',
	'type'	  	=> 'text',
) );

/*Link*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-menu-right-text-link]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-menu-right-text-link'],
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-menu-right-text-link]', array(
	'label'		=> esc_html__( 'Menu Right Text Link', 'agami-shop' ),
	'section'   => 'agami-shop-menu-right',
	'settings'  => 'agami_shop_theme_options[agami-shop-menu-right-text-link]',
	'type'	  	=> 'url',
) );

/*enable new tab on link*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-menu-right-link-new-tab]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-menu-right-link-new-tab'],
	'sanitize_callback' => 'agami_shop_sanitize_checkbox',
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-menu-right-link-new-tab]', array(
	'label'		=> esc_html__( 'Open Link New Tab', 'agami-shop' ),
	'section'   => 'agami-shop-menu-right',
	'settings'  => 'agami_shop_theme_options[agami-shop-menu-right-link-new-tab]',
	'type'	  	=> 'checkbox'
) );