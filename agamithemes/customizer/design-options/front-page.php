<?php
/*adding sections for front page */
$wp_customize->add_section( 'agami-shop-front-page-options', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Front Page Options', 'agami-shop' ),
    'panel'          => 'agami-shop-design-panel'
) );

/*Show Hide Front Page Content*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-hide-front-page-content]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['agami-shop-hide-front-page-content'],
    'sanitize_callback' => 'agami_shop_sanitize_checkbox'
) );

$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-hide-front-page-content]', array(
    'label'		=> esc_html__( 'Hide Blog Posts or Static Page on Front Page', 'agami-shop' ),
    'section'   => 'agami-shop-front-page-options',
    'settings'  => 'agami_shop_theme_options[agami-shop-hide-front-page-content]',
    'type'	  	=> 'checkbox'
) );