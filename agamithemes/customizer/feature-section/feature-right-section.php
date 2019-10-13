<?php
/*check if post*/
if ( !function_exists('agami_shop_is_feature_right_content_post') ) :
	function agami_shop_is_feature_right_content_post() {
		$agami_shop_customizer_all_values = agami_shop_get_theme_options();
		if( 'post' == $agami_shop_customizer_all_values['agami-shop-feature-right-content-options'] ){
			return true;
		}
		return false;
	}
endif;

/*check if product*/
if ( !function_exists('agami_shop_is_feature_right_content_product') ) :
	function agami_shop_is_feature_right_content_product() {
		$agami_shop_customizer_all_values = agami_shop_get_theme_options();
		if( agami_shop_is_woocommerce_active() && 'product' == $agami_shop_customizer_all_values['agami-shop-feature-right-content-options'] ){
			return true;
		}
		return false;
	}
endif;

/*check if feature not disable*/
if ( !function_exists('agami_shop_if_feature_right_not_disable') ) :
	function agami_shop_if_feature_right_not_disable() {
		$agami_shop_customizer_all_values = agami_shop_get_theme_options();
		$agami_shop_feature_right_content_options = $agami_shop_customizer_all_values['agami-shop-feature-right-content-options'];
		if( ( agami_shop_is_woocommerce_active() && 'product' == $agami_shop_feature_right_content_options ) || 'post' == $agami_shop_feature_right_content_options ){
			return true;
		}
		return false;
	}
endif;

/*adding sections for feature right*/
$wp_customize->add_section( 'agami-shop-feature-right-content-options', array(
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Feature Right Section', 'agami-shop' ),
	'description'	 => sprintf( esc_html__( 'Feature section will display on front/home page. Feature Section includes Feature Main Section, Feature Right Section and  Special Menu Feature Left  .%1$s Note : Please go to %2$s Homepage Settings %3$s, Select "A static page" then "Front page" and "Posts page" to enable it', 'agami-shop' ), '<br />','<b><a class="at-customizer button button-primary" data-section="static_front_page"> ','</a></b>' ),
	'panel'          => 'agami-shop-feature-panel'
) );

/*Feature Content Options*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-feature-right-content-options]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-feature-right-content-options'],
	'sanitize_callback' => 'agami_shop_sanitize_select'
) );
$choices = agami_shop_feature_section_content_options();
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-feature-right-content-options]', array(
	'choices'  	    => $choices,
	'label'		    => esc_html__( 'Show', 'agami-shop' ),
	'description'   => esc_html__( 'Show post, page, or product on Feature section', 'agami-shop' ),
	'section'       => 'agami-shop-feature-right-content-options',
	'settings'      => 'agami_shop_theme_options[agami-shop-feature-right-content-options]',
	'type'	  	    => 'select'
) );

/* feature cat selection */
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-feature-right-post-cat]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-feature-right-post-cat'],
	'sanitize_callback' => 'agami_shop_sanitize_number'
) );

$wp_customize->add_control(
	new agami_shop_Customize_Category_Dropdown_Control(
		$wp_customize,
		'agami_shop_theme_options[agami-shop-feature-right-post-cat]',
		array(
			'label'		=> esc_html__( 'Select Post Category', 'agami-shop' ),
			'section'   => 'agami-shop-feature-right-content-options',
			'settings'  => 'agami_shop_theme_options[agami-shop-feature-right-post-cat]',
			'type'	  	=> 'category_dropdown',
			'active_callback'   => 'agami_shop_is_feature_right_content_post'
		)
	)
);

/* feature product cat selection */
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-feature-right-product-cat]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-feature-right-product-cat'],
	'sanitize_callback' => 'agami_shop_sanitize_number'
) );

$wp_customize->add_control(
	new agami_shop_Customize_WC_Category_Dropdown_Control(
		$wp_customize,
		'agami_shop_theme_options[agami-shop-feature-right-product-cat]',
		array(
			'label'		=> esc_html__( 'Select Product Category', 'agami-shop' ),
			'section'   => 'agami-shop-feature-right-content-options',
			'settings'  => 'agami_shop_theme_options[agami-shop-feature-right-product-cat]',
			'type'	  	=> 'category_dropdown',
			'active_callback'   => 'agami_shop_is_feature_right_content_product'
		)
	)
);

/*Post Number*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-feature-right-post-number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-feature-right-post-number'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-feature-right-post-number]', array(
	'label'		=> esc_html__( 'Number', 'agami-shop' ),
	'section'   => 'agami-shop-feature-right-content-options',
	'settings'  => 'agami_shop_theme_options[agami-shop-feature-right-post-number]',
	'type'	  	=> 'number',
	'active_callback'   => 'agami_shop_if_feature_right_not_disable'
) );

/*display-title*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-feature-right-display-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-feature-right-display-title'],
	'sanitize_callback' => 'agami_shop_sanitize_checkbox'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-feature-right-display-title]', array(
	'label'		    => esc_html__( 'Display Title', 'agami-shop' ),
	'section'       => 'agami-shop-feature-right-content-options',
	'settings'      => 'agami_shop_theme_options[agami-shop-feature-right-display-title]',
	'type'	  	    => 'checkbox',
	'active_callback'   => 'agami_shop_if_feature_right_not_disable'
) );

/*display-arrow*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-feature-right-display-arrow]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-feature-right-display-arrow'],
	'sanitize_callback' => 'agami_shop_sanitize_checkbox'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-feature-right-display-arrow]', array(
	'label'		    => esc_html__( 'Display Arrow', 'agami-shop' ),
	'section'       => 'agami-shop-feature-right-content-options',
	'settings'      => 'agami_shop_theme_options[agami-shop-feature-right-display-arrow]',
	'type'	  	    => 'checkbox',
	'active_callback'   => 'agami_shop_if_feature_right_not_disable'
) );

/*enable-autoplay*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-feature-right-enable-autoplay]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-feature-right-enable-autoplay'],
	'sanitize_callback' => 'agami_shop_sanitize_checkbox'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-feature-right-enable-autoplay]', array(
	'label'		    => esc_html__( 'Enable Autoplay', 'agami-shop' ),
	'section'       => 'agami-shop-feature-right-content-options',
	'settings'      => 'agami_shop_theme_options[agami-shop-feature-right-enable-autoplay]',
	'type'	  	    => 'checkbox',
	'active_callback'   => 'agami_shop_if_feature_right_not_disable'
) );

/*Image Display Behavior*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-feature-right-image-display-options]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-feature-right-image-display-options'],
	'sanitize_callback' => 'agami_shop_sanitize_select'
) );
$choices = agami_shop_fs_image_display_options();
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-feature-right-image-display-options]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Feature Slider Image Display Options', 'agami-shop' ),
	'description'=> esc_html__( 'Recommended Image Size 372*255 or 744*510 ', 'agami-shop' ),
	'section'   => 'agami-shop-feature-right-content-options',
	'settings'  => 'agami_shop_theme_options[agami-shop-feature-right-image-display-options]',
	'type'	  	=> 'radio',
	'active_callback'   => 'agami_shop_if_feature_right_not_disable'
) );

/*Button text*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-feature-right-button-text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-feature-right-button-text'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-feature-right-button-text]', array(
	'label'		=> esc_html__( 'Button Text', 'agami-shop' ),
	'description'=> esc_html__( 'Left empty to hide', 'agami-shop' ),
	'section'   => 'agami-shop-feature-right-content-options',
	'settings'  => 'agami_shop_theme_options[agami-shop-feature-right-button-text]',
	'type'	  	=> 'text',
	'active_callback' => 'agami_shop_if_feature_right_not_disable'
) );