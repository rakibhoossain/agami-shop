<?php
/*adding sections for site identity */
$wp_customize->add_section( 'agami-shop-site-identity-placement', array(
    'priority'       => 45,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Header Placement', 'agami-shop' ),
    'panel'          => 'agami-shop-header-panel'
) );

/*header site identity position*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-header-logo-ads-display-position]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['agami-shop-header-logo-ads-display-position'],
    'sanitize_callback' => 'agami_shop_sanitize_select'
) );
$choices = agami_shop_header_logo_menu_display_position();
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-header-logo-ads-display-position]', array(
    'choices'  	=> $choices,
    'label'		=> esc_html__( 'Logo and Advertisement Position', 'agami-shop' ),
    'section'   => 'agami-shop-site-identity-placement',
    'settings'  => 'agami_shop_theme_options[agami-shop-header-logo-ads-display-position]',
    'type'	  	=> 'select'
) );