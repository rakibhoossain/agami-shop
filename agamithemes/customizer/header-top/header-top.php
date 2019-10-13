<?php
/*check if enable header top*/
if ( !function_exists('agami_shop_is_enable_header_top') ) :
	function agami_shop_is_enable_header_top() {
		$agami_shop_customizer_all_values = agami_shop_get_theme_options();
		if( 1 == $agami_shop_customizer_all_values['agami-shop-enable-header-top'] ){
			return true;
		}
		return false;
	}
endif;

/*check for agami-shop-top-right-button-options*/
if ( !function_exists('agami_shop_top_right_button_if_not_disable') ) :
	function agami_shop_top_right_button_if_not_disable() {
		$agami_shop_customizer_all_values = agami_shop_get_theme_options();
		$agami_shop_enable_header_top = $agami_shop_customizer_all_values['agami-shop-enable-header-top'];
		$agami_shop_top_right_button_options = $agami_shop_customizer_all_values['agami-shop-top-right-button-options'];
		if( 1 == $agami_shop_enable_header_top && 'disable' != $agami_shop_top_right_button_options ){
			return true;
		}
		return false;
	}
endif;

if ( !function_exists('agami_shop_top_right_button_if_widget') ) :
	function agami_shop_top_right_button_if_widget() {
		$agami_shop_customizer_all_values = agami_shop_get_theme_options();
		$agami_shop_enable_header_top = $agami_shop_customizer_all_values['agami-shop-enable-header-top'];
		$agami_shop_top_right_button_options = $agami_shop_customizer_all_values['agami-shop-top-right-button-options'];
		if( 1 == $agami_shop_enable_header_top && 'widget' == $agami_shop_top_right_button_options ){
			return true;
		}
		return false;
	}
endif;

if ( !function_exists('agami_shop_menu_right_button_if_link') ) :
	function agami_shop_menu_right_button_if_link() {
		$agami_shop_customizer_all_values = agami_shop_get_theme_options();
		$agami_shop_enable_header_top = $agami_shop_customizer_all_values['agami-shop-enable-header-top'];
		$agami_shop_top_right_button_options = $agami_shop_customizer_all_values['agami-shop-top-right-button-options'];
		if( 1 == $agami_shop_enable_header_top && 'link' == $agami_shop_top_right_button_options ){
			return true;
		}
		return false;
	}
endif;

/*adding sections for header options*/
$wp_customize->add_section( 'agami-shop-header-top-option', array(
	'priority'       => 10,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Header Top', 'agami-shop' ),
	'panel'          => 'agami-shop-header-top-panel'
) );

/*header top enable*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-enable-header-top]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-enable-header-top'],
	'sanitize_callback' => 'agami_shop_sanitize_checkbox',
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-enable-header-top]', array(
	'label'		=> esc_html__( 'Enable Header Top Options', 'agami-shop' ),
	'section'   => 'agami-shop-header-top-option',
	'settings'  => 'agami_shop_theme_options[agami-shop-enable-header-top]',
	'type'	  	=> 'checkbox'
) );

/*header top message*/
$wp_customize->add_setting('agami_shop_theme_options[agami-shop-header-top-message]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> '',
	'sanitize_callback' => 'esc_attr'
));

$wp_customize->add_control(
	new agami_shop_Customize_Message_Control(
		$wp_customize,
		'agami_shop_theme_options[agami-shop-header-top-message]',
		array(
			'section'   => 'agami-shop-header-top-option',
			'description'    => "<hr /><h2>".esc_html__('Display Different Element on Top Right or Left','agami-shop')."</h2>",
			'settings'  => 'agami_shop_theme_options[agami-shop-header-top-message]',
			'type'	  	=> 'message',
			'active_callback'   => 'agami_shop_is_enable_header_top'
		)
	)
);

/*Basic Info display*/
$choices = agami_shop_header_top_display_selection();
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-header-top-basic-info-display-selection]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-header-top-basic-info-display-selection'],
	'sanitize_callback' => 'agami_shop_sanitize_select'
) );
$description = sprintf( esc_html__( 'Add/Edit Basic Info from %1$s here%2$s', 'agami-shop' ), '<a class="at-customizer button button-primary" data-section="agami-shop-header-info" style="cursor: pointer">','</a>' );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-header-top-basic-info-display-selection]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Basic Info Display', 'agami-shop' ),
	'description'=> $description,
	'section'   => 'agami-shop-header-top-option',
	'settings'  => 'agami_shop_theme_options[agami-shop-header-top-basic-info-display-selection]',
	'type'	  	=> 'select',
	'active_callback'   => 'agami_shop_is_enable_header_top'
) );

/*Top Menu Display*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-header-top-menu-display-selection]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-header-top-menu-display-selection'],
	'sanitize_callback' => 'agami_shop_sanitize_select'
) );
$description = sprintf( esc_html__( 'Add/Edit Menu Items from %1$s here%2$s and select Menu Location : Top Menu ( Support First Level Only ) ', 'agami-shop' ), '<a class="at-customizer button button-primary" data-panel="nav_menus" style="cursor: pointer">','</a>' );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-header-top-menu-display-selection]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Top Menu Display', 'agami-shop' ),
	'description'=> $description,
	'section'   => 'agami-shop-header-top-option',
	'settings'  => 'agami_shop_theme_options[agami-shop-header-top-menu-display-selection]',
	'type'	  	=> 'select',
	'active_callback'=> 'agami_shop_is_enable_header_top'
) );

/*Social Display*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-header-top-social-display-selection]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-header-top-social-display-selection'],
	'sanitize_callback' => 'agami_shop_sanitize_select'
) );
$description = sprintf( esc_html__( 'Add/Edit Social Items from %1$s here%2$s ', 'agami-shop' ), '<a class="at-customizer button button-primary" data-section="agami-shop-social-options" style="cursor: pointer">','</a>' );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-header-top-social-display-selection]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Social Display', 'agami-shop' ),
	'description'=> $description,
	'section'   => 'agami-shop-header-top-option',
	'settings'  => 'agami_shop_theme_options[agami-shop-header-top-social-display-selection]',
	'type'	  	=> 'select',
	'active_callback'   => 'agami_shop_is_enable_header_top'
) );

/*Button Right Message*/
$wp_customize->add_setting('agami_shop_theme_options[agami-shop-top-right-button-message]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> '',
	'sanitize_callback' => 'esc_attr'
));
$wp_customize->add_control(
	new agami_shop_Customize_Message_Control(
		$wp_customize,
		'agami_shop_theme_options[agami-shop-top-right-button-message]',
		array(
			'section'   => 'agami-shop-header-top-option',
			'description'    => "<hr /><h2>".esc_html__('Special Button On Top Right','agami-shop')."</h2>",
			'settings'  => 'agami_shop_theme_options[agami-shop-top-right-button-message]',
			'type'	  	=> 'message',
			'active_callback'   => 'agami_shop_is_enable_header_top'
		)
	)
);

/*Button Link Options*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-top-right-button-options]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-top-right-button-options'],
	'sanitize_callback' => 'agami_shop_sanitize_select'
) );
$choices = agami_shop_menu_right_button_link_options();
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-top-right-button-options]', array(
	'choices'  	    => $choices,
	'label'		    => esc_html__( 'Top Right Button Options', 'agami-shop' ),
	'section'       => 'agami-shop-header-top-option',
	'settings'      => 'agami_shop_theme_options[agami-shop-top-right-button-options]',
	'type'	  	    => 'select',
	'active_callback'   => 'agami_shop_is_enable_header_top'
) );

/*Button title*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-top-right-button-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-top-right-button-title'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-top-right-button-title]', array(
	'label'		=> esc_html__( 'Button Title', 'agami-shop' ),
	'section'   => 'agami-shop-header-top-option',
	'settings'  => 'agami_shop_theme_options[agami-shop-top-right-button-title]',
	'type'	  	=> 'text',
	'active_callback'   => 'agami_shop_top_right_button_if_not_disable'
) );

/*Popup widget title*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-popup-widget-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-popup-widget-title'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-popup-widget-title]', array(
	'label'		=> esc_html__( 'Popup Widget Title', 'agami-shop' ),
	'section'   => 'agami-shop-header-top-option',
	'settings'  => 'agami_shop_theme_options[agami-shop-popup-widget-title]',
	'type'	  	=> 'text',
	'active_callback'   => 'agami_shop_top_right_button_if_not_disable'
) );

/*Button Right appointment Message*/
$wp_customize->add_setting('agami_shop_theme_options[agami-shop-top-right-button-widget-message]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> '',
	'sanitize_callback' => 'esc_attr'
));
$description = sprintf( esc_html__( 'Add Widgets from %1$s here%2$s ', 'agami-shop' ), '<a class="at-customizer button button-primary" data-section="sidebar-widgets-popup-widget-area" style="cursor: pointer">','</a>' );
$wp_customize->add_control(
	new agami_shop_Customize_Message_Control(
		$wp_customize,
		'agami_shop_theme_options[agami-shop-top-right-button-widget-message]',
		array(
			'section'   => 'agami-shop-header-top-option',
			'description'    => $description,
			'settings'  => 'agami_shop_theme_options[agami-shop-top-right-button-widget-message]',
			'type'	  	=> 'message',
			'active_callback'   => 'agami_shop_top_right_button_if_widget'
		)
	)
);

/*Button link*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-top-right-button-link]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-top-right-button-link'],
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-top-right-button-link]', array(
	'label'		=> esc_html__( 'Button Link', 'agami-shop' ),
	'section'   => 'agami-shop-header-top-option',
	'settings'  => 'agami_shop_theme_options[agami-shop-top-right-button-link]',
	'type'	  	=> 'url',
	'active_callback'   => 'agami_shop_menu_right_button_if_link'
) );