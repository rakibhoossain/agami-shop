<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'agami-shop-design-sidebar-sticky-option', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Sticky Sidebar Option', 'agami-shop' ),
    'panel'          => 'agami-shop-design-panel'
) );

/*sticky sidebar enable disable*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-enable-sticky-sidebar]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['agami-shop-enable-sticky-sidebar'],
    'sanitize_callback' => 'agami_shop_sanitize_checkbox'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-enable-sticky-sidebar]', array(
    'label'		=> esc_html__( 'Enable Sticky Sidebar', 'agami-shop' ),
    'section'   => 'agami-shop-design-sidebar-sticky-option',
    'settings'  => 'agami_shop_theme_options[agami-shop-enable-sticky-sidebar]',
    'type'	  	=> 'checkbox'
) );