<?php
/*adding sections for footer options*/
$wp_customize->add_section( 'agami-shop-footer-option', array(
    'priority'       => 80,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Footer Options', 'agami-shop' )
) );

/*copyright*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-footer-copyright]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['agami-shop-footer-copyright'],
    'sanitize_callback' => 'wp_kses_post'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-footer-copyright]', array(
    'label'		=> esc_html__( 'Copyright Text', 'agami-shop' ),
    'section'   => 'agami-shop-footer-option',
    'settings'  => 'agami_shop_theme_options[agami-shop-footer-copyright]',
    'type'	  	=> 'text'
) );

/*footer power by text enable-disable */
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-enable-footer-power-text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-enable-footer-power-text'],
	'sanitize_callback' => 'agami_shop_sanitize_checkbox'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-enable-footer-power-text]', array(
	'label'		=> esc_html__( ' Enable Theme Name And Powered By Text ', 'agami-shop' ),
	'section'   => 'agami-shop-footer-option',
	'settings'  => 'agami_shop_theme_options[agami-shop-enable-footer-power-text]',
	'type'	  	=> 'checkbox'
) );

/*footer info*/
$wp_customize->add_setting('agami_shop_theme_options[agami-shop-footer-info]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> '',
	'sanitize_callback' => 'esc_attr'
));
$description = sprintf( esc_html__( 'Add Footer Widgets from %1$s here%2$s', 'agami-shop' ), '<a class="at-customizer button button-primary" data-panel="widgets" style="cursor: pointer">','</a>' );
$wp_customize->add_control(
	new agami_shop_Customize_Message_Control(
		$wp_customize,
		'agami_shop_theme_options[agami-shop-footer-info]',
		array(
			'section'   => 'agami-shop-footer-option',
			'description'    => $description,
			'settings'  => 'agami_shop_theme_options[agami-shop-footer-info]',
			'type'	  	=> 'message'
		)
	)
);