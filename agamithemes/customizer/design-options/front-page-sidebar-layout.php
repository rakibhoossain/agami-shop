<?php
/*adding sections for default layout options panel*/
$wp_customize->add_section( 'agami-shop-front-page-sidebar-layout', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Front/Home Sidebar Layout', 'agami-shop' ),
    'panel'          => 'agami-shop-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-front-page-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['agami-shop-front-page-sidebar-layout'],
    'sanitize_callback' => 'agami_shop_sanitize_select'
) );
$choices = agami_shop_sidebar_layout();
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-front-page-sidebar-layout]', array(
    'choices'  	=> $choices,
    'label'		=> esc_html__( 'Front/Home Sidebar Layout', 'agami-shop' ),
    'section'   => 'agami-shop-front-page-sidebar-layout',
    'settings'  => 'agami_shop_theme_options[agami-shop-front-page-sidebar-layout]',
    'type'	  	=> 'select'
) );