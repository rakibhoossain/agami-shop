<?php
/*adding sections for Single post options*/
$wp_customize->add_section( 'agami-shop-single-post', array(
    'priority'       => 90,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Single Post Options', 'agami-shop' )
) );

/*single image size*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-single-img-size]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['agami-shop-single-img-size'],
    'sanitize_callback' => 'agami_shop_sanitize_select'
) );
$choices = agami_shop_get_image_sizes_options(1);
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-single-img-size]', array(
    'choices'  	=> $choices,
    'label'		=> esc_html__( 'Image Size', 'agami-shop' ),
    'section'   => 'agami-shop-single-post',
    'settings'  => 'agami_shop_theme_options[agami-shop-single-img-size]',
    'type'	  	=> 'select'
) );

/*show related posts*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-show-related]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['agami-shop-show-related'],
    'sanitize_callback' => 'agami_shop_sanitize_checkbox'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-show-related]', array(
    'label'		=> esc_html__( 'Show Related Posts In Single Post', 'agami-shop' ),
    'section'   => 'agami-shop-single-post',
    'settings'  => 'agami_shop_theme_options[agami-shop-show-related]',
    'type'	  	=> 'checkbox'
) );

/*Related title*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-related-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-related-title'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-related-title]', array(
	'label'		=> esc_html__( 'Related Posts title', 'agami-shop' ),
	'section'   => 'agami-shop-single-post',
	'settings'  => 'agami_shop_theme_options[agami-shop-related-title]',
	'type'	  	=> 'text'
) );

/*related post by tag or category*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-related-post-display-from]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-related-post-display-from'],
	'sanitize_callback' => 'agami_shop_sanitize_select'
) );
$choices = agami_shop_related_post_display_from();
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-related-post-display-from]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Related Post Display From Options', 'agami-shop' ),
	'section'   => 'agami-shop-single-post',
	'settings'  => 'agami_shop_theme_options[agami-shop-related-post-display-from]',
	'type'	  	=> 'select'
) );