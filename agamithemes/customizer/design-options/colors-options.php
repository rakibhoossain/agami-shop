<?php
/*customizing default colors section and adding new controls-setting too*/
$wp_customize->add_section( 'colors', array(
    'priority'       => 40,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Colors', 'agami-shop' ),
    'panel'          => 'agami-shop-design-panel'
) );

/*Primary color*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-primary-color]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['agami-shop-primary-color'],
    'sanitize_callback' => 'sanitize_hex_color'
) );

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'agami_shop_theme_options[agami-shop-primary-color]',
		array(
			'label'		=> esc_html__( 'Primary Color', 'agami-shop' ),
			'section'   => 'colors',
			'settings'  => 'agami_shop_theme_options[agami-shop-primary-color]',
			'type'	  	=> 'color'
		)
	)
);