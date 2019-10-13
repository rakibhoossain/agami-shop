<?php
/*check if feature enable*/
if ( !function_exists('agami_shop_is_feature_section_enable') ) :
	function agami_shop_is_feature_section_enable() {
		$agami_shop_customizer_all_values = agami_shop_get_theme_options();
		$agami_shop_enable_special_menu = $agami_shop_customizer_all_values['agami-shop-enable-special-menu'];
		$agami_shop_feature_content_options = $agami_shop_customizer_all_values['agami-shop-feature-content-options'];
		$agami_shop_feature_right_content_options = $agami_shop_customizer_all_values['agami-shop-feature-right-content-options'];
		if( ('disable' != $agami_shop_feature_content_options || 'disable' != $agami_shop_feature_right_content_options ) &&
		    1 == $agami_shop_enable_special_menu ){
			return true;
		}
		return false;
	}
endif;

/*adding sections for special menu*/
$wp_customize->add_section( 'agami-shop-feature-special-menu', array(
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Special Menu Feature Left', 'agami-shop' ),
	'panel'          => 'agami-shop-feature-panel',
	'active_callback'=> 'agami_shop_is_feature_section_enable'
) );

/*enable-special-menu*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-feature-enable-special-menu]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-feature-enable-special-menu'],
	'sanitize_callback' => 'agami_shop_sanitize_checkbox'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-feature-enable-special-menu]', array(
	'label'		    => esc_html__( 'Display Special Menu on Feature Left', 'agami-shop' ),
	'section'       => 'agami-shop-feature-special-menu',
	'settings'      => 'agami_shop_theme_options[agami-shop-feature-enable-special-menu]',
	'type'	  	    => 'checkbox'
) );