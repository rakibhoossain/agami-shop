<?php
/*adding sections for breadcrumb */
$wp_customize->add_section( 'agami-shop-breadcrumb-options', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Breadcrumb Options', 'agami-shop' ),
    'panel'          => 'agami-shop-options'
) );

/*Breadcrumb Options*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-breadcrumb-options]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-breadcrumb-options'],
	'sanitize_callback' => 'agami_shop_sanitize_select'
) );

$choices = agami_shop_breadcrumbs_options();
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-breadcrumb-options]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Breadcrumb Options', 'agami-shop' ),
	'section'   => 'agami-shop-breadcrumb-options',
	'settings'  => 'agami_shop_theme_options[agami-shop-breadcrumb-options]',
	'type'	  	=> 'select'
) );