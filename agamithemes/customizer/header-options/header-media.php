<?php
/*adding sections for header news options*/
$agami_shop_header_image = $wp_customize->get_section( 'header_image' );
$agami_shop_header_image->panel = 'agami-shop-header-panel';
$agami_shop_header_image->priority = 60;

/*header media position options*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-header-media-position]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-header-media-position'],
	'sanitize_callback' => 'agami_shop_sanitize_select'
) );
$choices = agami_shop_header_media_position();
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-header-media-position]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Header Media Position', 'agami-shop' ),
	'section'   => 'header_image',
	'settings'  => 'agami_shop_theme_options[agami-shop-header-media-position]',
	'type'	  	=> 'radio'
) );

/*header ad img link*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-header-image-link]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-header-image-link'],
	'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-header-image-link]', array(
	'label'		=> esc_html__( 'Header Image Link', 'agami-shop' ),
	'description'=> esc_html__( 'Left empty for no link', 'agami-shop' ),
	'section'   => 'header_image',
	'settings'  => 'agami_shop_theme_options[agami-shop-header-image-link]',
	'type'	  	=> 'url'
) );

/*header image in new tab*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-header-image-link-new-tab]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-header-image-link-new-tab'],
	'sanitize_callback' => 'agami_shop_sanitize_checkbox',
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-header-image-link-new-tab]', array(
	'label'		=> esc_html__( 'Check to Open New Tab Header Image Link', 'agami-shop' ),
	'section'   => 'header_image',
	'settings'  => 'agami_shop_theme_options[agami-shop-header-image-link-new-tab]',
	'type'	  	=> 'checkbox'
) );