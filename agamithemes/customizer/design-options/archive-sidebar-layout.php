<?php
/*adding sections for default layout options panel*/
$wp_customize->add_section( 'agami-shop-archive-sidebar-layout', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Category/Archive Sidebar Layout', 'agami-shop' ),
    'panel'          => 'agami-shop-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-archive-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['agami-shop-archive-sidebar-layout'],
    'sanitize_callback' => 'agami_shop_sanitize_select'
) );
$choices = agami_shop_sidebar_layout();
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-archive-sidebar-layout]', array(
    'choices'  	    => $choices,
    'label'		    => esc_html__( 'Category/Archive Sidebar Layout', 'agami-shop' ),
    'description'   => esc_html__( 'Sidebar Layout for listing pages like category, author etc', 'agami-shop' ),
    'section'       => 'agami-shop-archive-sidebar-layout',
    'settings'      => 'agami_shop_theme_options[agami-shop-archive-sidebar-layout]',
    'type'	  	    => 'select'
) );