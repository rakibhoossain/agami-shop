<?php
/*check if post*/
if ( !function_exists('agami_shop_is_special_menu_feature_left') ) :
	function agami_shop_is_special_menu_feature_left() {
		$agami_shop_customizer_all_values = agami_shop_get_theme_options();
		if( 1 == $agami_shop_customizer_all_values['agami-shop-feature-enable-special-menu'] ){
			return true;
		}
		return false;
	}
endif;

/*Sticky  Menu Section*/
$wp_customize->add_section( 'agami-shop-sticky-menu', array(
	'priority'       => 50,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Sticky Menu Options', 'agami-shop' ),
	'panel'          => 'agami-shop-header-menu',
) );

/*sticky menu*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-enable-sticky-menu]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-enable-sticky-menu'],
	'sanitize_callback' => 'agami_shop_sanitize_checkbox'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-enable-sticky-menu]', array(
	'label'		=> esc_html__( 'Enable Sticky Menu', 'agami-shop' ),
	'section'   => 'agami-shop-sticky-menu',
	'settings'  => 'agami_shop_theme_options[agami-shop-enable-sticky-menu]',
	'type'	  	=> 'checkbox'
) );

$wp_customize->add_setting('agami_shop_theme_options[agami-shop-sticky-menu-message]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> '',
	'sanitize_callback' => 'esc_attr'
));

$wp_customize->add_control(
	new agami_shop_Customize_Message_Control(
		$wp_customize,
		'agami_shop_theme_options[agami-shop-sticky-menu-message]',
		array(
			'section'   => 'agami-shop-sticky-menu',
			'description'=> sprintf( esc_html__( 'Stick Menu wont work, if you Display Special Menu on Feature Left.%1$s Note : Please go to %2$s "Special Menu Feature Left"%3$s and uncheck( disable ) it', 'agami-shop' ), '<br />','<b><a class="at-customizer" data-section="agami-shop-feature-special-menu"> ','</a></b>' ),
			'settings'  => 'agami_shop_theme_options[agami-shop-sticky-menu-message]',
			'type'	  	=> 'message',
			'active_callback'   => 'agami_shop_is_special_menu_feature_left'
		)
	)
);