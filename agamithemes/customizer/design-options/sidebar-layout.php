<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'agami-shop-design-sidebar-layout-option', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Default Sidebar Layout', 'agami-shop' ),
    'panel'          => 'agami-shop-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-single-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['agami-shop-single-sidebar-layout'],
    'sanitize_callback' => 'agami_shop_sanitize_select'
) );
$choices = agami_shop_sidebar_layout();
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-single-sidebar-layout]', array(
    'choices'  	=> $choices,
    'label'		=> esc_html__( 'Default Sidebar Layout', 'agami-shop' ),
    'section'   => 'agami-shop-design-sidebar-layout-option',
    'settings'  => 'agami_shop_theme_options[agami-shop-single-sidebar-layout]',
    'type'	  	=> 'select'
) );