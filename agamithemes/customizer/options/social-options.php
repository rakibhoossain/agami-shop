<?php
/*adding sections for social options */
$wp_customize->add_section( 'agami-shop-social-options', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Social Options', 'agami-shop' ),
    'panel'          => 'agami-shop-options'
) );

/*repeater social data*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-social-data]', array(
	'sanitize_callback' => 'agami_shop_sanitize_social_data',
	'default' => $defaults['agami-shop-social-data']
) );
$wp_customize->add_control(
	new agami_shop_Repeater_Control(
		$wp_customize,
		'agami_shop_theme_options[agami-shop-social-data]',
		array(
			'label'   => esc_html__('Social Options Selection','agami-shop'),
			'description'=> esc_html__('Select Social Icons and enter link','agami-shop'),
			'section' => 'agami-shop-social-options',
			'settings' => 'agami_shop_theme_options[agami-shop-social-data]',
			'repeater_main_label' => esc_html__('Social Icon','agami-shop'),
			'repeater_add_control_field' => esc_html__('Add New Icon','agami-shop')
		),
		array(
			'icon' => array(
				'type'        => 'icons',
				'label'       => esc_html__( 'Select Icon', 'agami-shop' ),
			),
			'link' => array(
				'type'        => 'url',
				'label'       => esc_html__( 'Enter Link', 'agami-shop' ),
			),
			'checkbox' => array(
				'type'        => 'checkbox',
				'label'       => esc_html__( 'Open in New Window', 'agami-shop' ),
			)
		)
	)
);