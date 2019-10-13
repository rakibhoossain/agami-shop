<?php
/*check if post*/
if ( !function_exists('agami_shop_is_feature_content_post') ) :
	function agami_shop_is_feature_content_post() {
		$agami_shop_customizer_all_values = agami_shop_get_theme_options();
		if( 'post' == $agami_shop_customizer_all_values['agami-shop-feature-content-options'] ){
			return true;
		}
		return false;
	}
endif;

/*check if product*/
if ( !function_exists('agami_shop_is_feature_content_product') ) :
	function agami_shop_is_feature_content_product() {
		$agami_shop_customizer_all_values = agami_shop_get_theme_options();
		if( agami_shop_is_woocommerce_active() && 'product' == $agami_shop_customizer_all_values['agami-shop-feature-content-options'] ){
			return true;
		}
		return false;
	}
endif;

/*check if feature not disable*/
if ( !function_exists('agami_shop_if_feature_not_disable') ) :
	function agami_shop_if_feature_not_disable() {
		$agami_shop_customizer_all_values = agami_shop_get_theme_options();
		$agami_shop_feature_content_options = $agami_shop_customizer_all_values['agami-shop-feature-content-options'];
		if( ( agami_shop_is_woocommerce_active() && 'product' == $agami_shop_feature_content_options ) || 'post' == $agami_shop_feature_content_options ){
			return true;
		}
		return false;
	}
endif;

/*adding sections for feature main*/
$wp_customize->add_section( 'agami-shop-feature-content-options', array(
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Feature Main Section( Left Section )', 'agami-shop' ),
	'description'	 => sprintf( esc_html__( 'Feature section will display on front/home page. Feature Section includes Feature Main Section, Feature Right Section and  Special Menu Feature Left  .%1$s Note : Please go to %2$s Homepage Settings %3$s, Select "A static page" then "Front page" and "Posts page" to enable it', 'agami-shop' ), '<br />','<b><a class="at-customizer button button-primary" data-section="static_front_page"> ','</a></b>' ),
	'panel'          => 'agami-shop-feature-panel'
) );

/*Feature Content Options*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-feature-content-options]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-feature-content-options'],
	'sanitize_callback' => 'agami_shop_sanitize_select'
) );
$choices = agami_shop_feature_section_content_options();
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-feature-content-options]', array(
	'choices'  	    => $choices,
	'label'		    => esc_html__( 'Show', 'agami-shop' ),
	'description'   => esc_html__( 'Show post, page, or product on Feature section', 'agami-shop' ),
	'section'       => 'agami-shop-feature-content-options',
	'settings'      => 'agami_shop_theme_options[agami-shop-feature-content-options]',
	'type'	  	    => 'select'
) );

/* feature cat selection */
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-feature-post-cat]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-feature-post-cat'],
	'sanitize_callback' => 'agami_shop_sanitize_number'
) );

$wp_customize->add_control(
	new agami_shop_Customize_Category_Dropdown_Control(
		$wp_customize,
		'agami_shop_theme_options[agami-shop-feature-post-cat]',
		array(
			'label'		=> esc_html__( 'Select Post Category', 'agami-shop' ),
			'section'   => 'agami-shop-feature-content-options',
			'settings'  => 'agami_shop_theme_options[agami-shop-feature-post-cat]',
			'type'	  	=> 'category_dropdown',
			'active_callback'=> 'agami_shop_is_feature_content_post'
		)
	)
);

/* feature product cat selection */
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-feature-product-cat]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-feature-product-cat'],
	'sanitize_callback' => 'agami_shop_sanitize_number'
) );

$wp_customize->add_control(
	new agami_shop_Customize_WC_Category_Dropdown_Control(
		$wp_customize,
		'agami_shop_theme_options[agami-shop-feature-product-cat]',
		array(
			'label'		=> esc_html__( 'Select Product Category', 'agami-shop' ),
			'section'   => 'agami-shop-feature-content-options',
			'settings'  => 'agami_shop_theme_options[agami-shop-feature-product-cat]',
			'type'	  	=> 'category_dropdown',
			'active_callback' => 'agami_shop_is_feature_content_product'
		)
	)
);

/*Post Number*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-feature-post-number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-feature-post-number'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-feature-post-number]', array(
	'label'		=> esc_html__( 'Number', 'agami-shop' ),
	'section'   => 'agami-shop-feature-content-options',
	'settings'  => 'agami_shop_theme_options[agami-shop-feature-post-number]',
	'type'	  	=> 'number',
	'active_callback'   => 'agami_shop_if_feature_not_disable'
) );

/*display-cat*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-feature-slider-display-cat]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-feature-slider-display-cat'],
	'sanitize_callback' => 'agami_shop_sanitize_checkbox'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-feature-slider-display-cat]', array(
	'label'		    => esc_html__( 'Display Categories', 'agami-shop' ),
	'section'       => 'agami-shop-feature-content-options',
	'settings'      => 'agami_shop_theme_options[agami-shop-feature-slider-display-cat]',
	'type'	  	    => 'checkbox',
	'active_callback'   => 'agami_shop_if_feature_not_disable'
) );

/*display-title*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-feature-slider-display-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-feature-slider-display-title'],
	'sanitize_callback' => 'agami_shop_sanitize_checkbox'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-feature-slider-display-title]', array(
	'label'		    => esc_html__( 'Display Title', 'agami-shop' ),
	'section'       => 'agami-shop-feature-content-options',
	'settings'      => 'agami_shop_theme_options[agami-shop-feature-slider-display-title]',
	'type'	  	    => 'checkbox',
	'active_callback'   => 'agami_shop_if_feature_not_disable'
) );

/*display-excerpt*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-feature-slider-display-excerpt]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-feature-slider-display-excerpt'],
	'sanitize_callback' => 'agami_shop_sanitize_checkbox'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-feature-slider-display-excerpt]', array(
	'label'		    => esc_html__( 'Display Excerpt', 'agami-shop' ),
	'section'       => 'agami-shop-feature-content-options',
	'settings'      => 'agami_shop_theme_options[agami-shop-feature-slider-display-excerpt]',
	'type'	  	    => 'checkbox',
	'active_callback'   => 'agami_shop_if_feature_not_disable'
) );

/*display-arrow*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-feature-slider-display-arrow]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-feature-slider-display-arrow'],
	'sanitize_callback' => 'agami_shop_sanitize_checkbox'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-feature-slider-display-arrow]', array(
	'label'		    => esc_html__( 'Display Arrow', 'agami-shop' ),
	'section'       => 'agami-shop-feature-content-options',
	'settings'      => 'agami_shop_theme_options[agami-shop-feature-slider-display-arrow]',
	'type'	  	    => 'checkbox',
	'active_callback'   => 'agami_shop_if_feature_not_disable'
) );

/*enable-autoplay*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-feature-slider-enable-autoplay]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-feature-slider-enable-autoplay'],
	'sanitize_callback' => 'agami_shop_sanitize_checkbox'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-feature-slider-enable-autoplay]', array(
	'label'		    => esc_html__( 'Enable Autoplay', 'agami-shop' ),
	'section'       => 'agami-shop-feature-content-options',
	'settings'      => 'agami_shop_theme_options[agami-shop-feature-slider-enable-autoplay]',
	'type'	  	    => 'checkbox',
	'active_callback'   => 'agami_shop_if_feature_not_disable'
) );

/*Image Display Behavior*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-fs-image-display-options]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-fs-image-display-options'],
	'sanitize_callback' => 'agami_shop_sanitize_select'
) );
$choices = agami_shop_fs_image_display_options();
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-fs-image-display-options]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Feature Slider Image Display Options', 'agami-shop' ),
	'description'=> esc_html__( 'Recommended Image Size 816*520 ', 'agami-shop' ),
	'section'   => 'agami-shop-feature-content-options',
	'settings'  => 'agami_shop_theme_options[agami-shop-fs-image-display-options]',
	'type'	  	=> 'radio',
	'active_callback'   => 'agami_shop_if_feature_not_disable'
) );

/*Button text*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-feature-button-text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-feature-button-text'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-feature-button-text]', array(
	'label'		=> esc_html__( 'Button Text', 'agami-shop' ),
	'description'=> esc_html__( 'Left empty to hide', 'agami-shop' ),
	'section'   => 'agami-shop-feature-content-options',
	'settings'  => 'agami_shop_theme_options[agami-shop-feature-button-text]',
	'type'	  	=> 'text',
	'active_callback'   => 'agami_shop_if_feature_not_disable'
) );