<?php
/*Site Logo*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-display-site-logo]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-display-site-logo'],
	'sanitize_callback' => 'agami_shop_sanitize_checkbox'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-display-site-logo]', array(
	'label'		=> esc_html__( 'Display Logo', 'agami-shop' ),
	'section'   => 'title_tagline',
	'settings'  => 'agami_shop_theme_options[agami-shop-display-site-logo]',
	'type'	  	=> 'checkbox'
) );

/*Site Title*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-display-site-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-display-site-title'],
	'sanitize_callback' => 'agami_shop_sanitize_checkbox'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-display-site-title]', array(
	'label'		=> esc_html__( 'Display Site Title', 'agami-shop' ),
	'section'   => 'title_tagline',
	'settings'  => 'agami_shop_theme_options[agami-shop-display-site-title]',
	'type'	  	=> 'checkbox'
) );

/*Site Tagline*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-display-site-tagline]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-display-site-tagline'],
	'sanitize_callback' => 'agami_shop_sanitize_checkbox'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-display-site-tagline]', array(
	'label'		=> esc_html__( 'Display Site Tagline', 'agami-shop' ),
	'section'   => 'title_tagline',
	'settings'  => 'agami_shop_theme_options[agami-shop-display-site-tagline]',
	'type'	  	=> 'checkbox'
) );