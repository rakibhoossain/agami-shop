<?php
/*adding sections for blog layout options*/
$wp_customize->add_section( 'agami-shop-design-blog-layout-option', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Default Blog/Archive Layout', 'agami-shop' ),
    'panel'          => 'agami-shop-design-panel'
) );

/*blog layout*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-blog-archive-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['agami-shop-blog-archive-layout'],
    'sanitize_callback' => 'agami_shop_sanitize_select'
) );
$choices = agami_shop_blog_layout();
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-blog-archive-layout]', array(
    'choices'  	=> $choices,
    'label'		=> esc_html__( 'Default Blog/Archive Layout', 'agami-shop' ),
    'description'=> esc_html__( 'Image display options', 'agami-shop' ),
    'section'   => 'agami-shop-design-blog-layout-option',
    'settings'  => 'agami_shop_theme_options[agami-shop-blog-archive-layout]',
    'type'	  	=> 'select'
) );

/*blog image size*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-blog-archive-img-size]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-blog-archive-img-size'],
	'sanitize_callback' => 'agami_shop_sanitize_select'
) );
$choices = agami_shop_get_image_sizes_options();
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-blog-archive-img-size]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Image Layout Options', 'agami-shop' ),
	'section'   => 'agami-shop-design-blog-layout-option',
	'settings'  => 'agami_shop_theme_options[agami-shop-blog-archive-img-size]',
	'type'	  	=> 'select',
) );

/*Read More Text*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-blog-archive-more-text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-blog-archive-more-text'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-blog-archive-more-text]', array(
	'label'		=> esc_html__( 'Read More Text', 'agami-shop' ),
	'section'   => 'agami-shop-design-blog-layout-option',
	'settings'  => 'agami_shop_theme_options[agami-shop-blog-archive-more-text]',
	'type'	  	=> 'text'
) );