<?php
/*adding sections for Search Placeholder*/
$wp_customize->add_section( 'agami-shop-search', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Search', 'agami-shop' ),
    'panel'          => 'agami-shop-options'
) );

/*Search Placeholder*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-search-placeholder]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['agami-shop-search-placeholder'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-search-placeholder]', array(
    'label'		=> esc_html__( 'Search Placeholder', 'agami-shop' ),
    'section'   => 'agami-shop-search',
    'settings'  => 'agami_shop_theme_options[agami-shop-search-placeholder]',
    'type'	  	=> 'text'
) );