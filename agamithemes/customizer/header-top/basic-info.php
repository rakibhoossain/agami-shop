<?php
/*adding sections for header social options */
$wp_customize->add_section( 'agami-shop-header-info', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Basic Info', 'agami-shop' ),
	'panel'          => 'agami-shop-header-top-panel'
) );

/*header basic info number*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-header-bi-number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-header-bi-number'],
	'sanitize_callback' => 'agami_shop_sanitize_select'
) );
$choices = agami_shop_header_bi_number();
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-header-bi-number]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Header Basic Info Number Display', 'agami-shop' ),
	'section'   => 'agami-shop-header-info',
	'settings'  => 'agami_shop_theme_options[agami-shop-header-bi-number]',
	'type'	  	=> 'select'
) );

/*first info*/
$wp_customize->add_setting('agami_shop_theme_options[agami-shop-first-info-message]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> '',
	'sanitize_callback' => 'esc_attr'
));

$wp_customize->add_control(
	new agami_shop_Customize_Message_Control(
		$wp_customize,
		'agami_shop_theme_options[agami-shop-first-info-message]',
		array(
			'section'   => 'agami-shop-header-info',
			'description'    => "<hr /><h2>".esc_html__('First Info','agami-shop')."</h2>",
			'settings'  => 'agami_shop_theme_options[agami-shop-first-info-message]',
			'type'	  	=> 'message'
		)
	)
);
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-first-info-icon]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-first-info-icon'],
	'sanitize_callback' => 'agami_shop_sanitize_allowed_html'
) );

$wp_customize->add_control(
	new agami_shop_Customize_Icons_Control(
		$wp_customize,
		'agami_shop_theme_options[agami-shop-first-info-icon]',
		array(
			'label'		=> esc_html__( 'Icon', 'agami-shop' ),
			'section'   => 'agami-shop-header-info',
			'settings'  => 'agami_shop_theme_options[agami-shop-first-info-icon]',
			'type'	  	=> 'text'
		)
	)
);

$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-first-info-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-first-info-title'],
	'sanitize_callback' => 'agami_shop_sanitize_allowed_html'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-first-info-title]', array(
	'label'		=> esc_html__( 'Title', 'agami-shop' ),
	'section'   => 'agami-shop-header-info',
	'settings'  => 'agami_shop_theme_options[agami-shop-first-info-title]',
	'type'	  	=> 'text'
) );

$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-first-info-link]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-first-info-link'],
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-first-info-link]', array(
	'label'		=> esc_html__( 'Link', 'agami-shop' ),
	'section'   => 'agami-shop-header-info',
	'settings'  => 'agami_shop_theme_options[agami-shop-first-info-link]',
	'type'	  	=> 'url'
) );

/*Second Info*/
$wp_customize->add_setting('agami_shop_theme_options[agami-shop-second-info-message]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> '',
	'sanitize_callback' => 'esc_attr'
));

$wp_customize->add_control(
	new agami_shop_Customize_Message_Control(
		$wp_customize,
		'agami_shop_theme_options[agami-shop-second-info-message]',
		array(
			'section'   => 'agami-shop-header-info',
			'description'    => "<hr /><h2>".esc_html__('Second Info','agami-shop')."</h2>",
			'settings'  => 'agami_shop_theme_options[agami-shop-second-info-message]',
			'type'	  	=> 'message',
		)
	)
);
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-second-info-icon]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-second-info-icon'],
	'sanitize_callback' => 'agami_shop_sanitize_allowed_html'
) );
$wp_customize->add_control(
	new agami_shop_Customize_Icons_Control(
		$wp_customize,
		'agami_shop_theme_options[agami-shop-second-info-icon]',
		array(
			'label'		=> esc_html__( 'Icon', 'agami-shop' ),
			'section'   => 'agami-shop-header-info',
			'settings'  => 'agami_shop_theme_options[agami-shop-second-info-icon]',
			'type'	  	=> 'text'
		)
	)
);

$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-second-info-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-second-info-title'],
	'sanitize_callback' => 'agami_shop_sanitize_allowed_html'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-second-info-title]', array(
	'label'		=> esc_html__( 'Title', 'agami-shop' ),
	'section'   => 'agami-shop-header-info',
	'settings'  => 'agami_shop_theme_options[agami-shop-second-info-title]',
	'type'	  	=> 'text'
) );

$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-second-info-link]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-second-info-link'],
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-second-info-link]', array(
	'label'		=> esc_html__( 'Link', 'agami-shop' ),
	'section'   => 'agami-shop-header-info',
	'settings'  => 'agami_shop_theme_options[agami-shop-second-info-link]',
	'type'	  	=> 'url'
) );

/*third info*/
$wp_customize->add_setting('agami_shop_theme_options[agami-shop-third-info-message]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> '',
	'sanitize_callback' => 'esc_attr'
));

$wp_customize->add_control(
	new agami_shop_Customize_Message_Control(
		$wp_customize,
		'agami_shop_theme_options[agami-shop-third-info-message]',
		array(
			'section'   => 'agami-shop-header-info',
			'description'    => "<hr /><h2>".esc_html__('Third Info','agami-shop')."</h2>",
			'settings'  => 'agami_shop_theme_options[agami-shop-third-info-message]',
			'type'	  	=> 'message',
		)
	)
);
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-third-info-icon]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-third-info-icon'],
	'sanitize_callback' => 'agami_shop_sanitize_allowed_html'
) );
$wp_customize->add_control(
	new agami_shop_Customize_Icons_Control(
		$wp_customize,
		'agami_shop_theme_options[agami-shop-third-info-icon]',
		array(
			'label'		=> esc_html__( 'Icon', 'agami-shop' ),
			'section'   => 'agami-shop-header-info',
			'settings'  => 'agami_shop_theme_options[agami-shop-third-info-icon]',
			'type'	  	=> 'text'
		)
	)
);

$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-third-info-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-third-info-title'],
	'sanitize_callback' => 'agami_shop_sanitize_allowed_html'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-third-info-title]', array(
	'label'		=> esc_html__( 'Title', 'agami-shop' ),
	'section'   => 'agami-shop-header-info',
	'settings'  => 'agami_shop_theme_options[agami-shop-third-info-title]',
	'type'	  	=> 'text'
) );

$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-third-info-link]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-third-info-link'],
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-third-info-link]', array(
	'label'		=> esc_html__( 'Link', 'agami-shop' ),
	'section'   => 'agami-shop-header-info',
	'settings'  => 'agami_shop_theme_options[agami-shop-third-info-link]',
	'type'	  	=> 'url'
) );

/*forth info*/
$wp_customize->add_setting('agami_shop_theme_options[agami-shop-forth-info-message]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> '',
	'sanitize_callback' => 'esc_attr'
));

$wp_customize->add_control(
	new agami_shop_Customize_Message_Control(
		$wp_customize,
		'agami_shop_theme_options[agami-shop-forth-info-message]',
		array(
			'section'   => 'agami-shop-header-info',
			'description'    => "<hr /><h2>".esc_html__('Forth Info','agami-shop')."</h2>",
			'settings'  => 'agami_shop_theme_options[agami-shop-forth-info-message]',
			'type'	  	=> 'message',
		)
	)
);

$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-forth-info-icon]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-forth-info-icon'],
	'sanitize_callback' => 'agami_shop_sanitize_allowed_html'
) );
$wp_customize->add_control(
	new agami_shop_Customize_Icons_Control(
		$wp_customize,
		'agami_shop_theme_options[agami-shop-forth-info-icon]',
		array(
			'label'		=> esc_html__( 'Icon', 'agami-shop' ),
			'section'   => 'agami-shop-header-info',
			'settings'  => 'agami_shop_theme_options[agami-shop-forth-info-icon]',
			'type'	  	=> 'text'
		)
	)
);

$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-forth-info-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-forth-info-title'],
	'sanitize_callback' => 'agami_shop_sanitize_allowed_html'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-forth-info-title]', array(
	'label'		=> esc_html__( 'Title', 'agami-shop' ),
	'section'   => 'agami-shop-header-info',
	'settings'  => 'agami_shop_theme_options[agami-shop-forth-info-title]',
	'type'	  	=> 'text'
) );

$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-forth-info-link]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['agami-shop-forth-info-link'],
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-forth-info-link]', array(
	'label'		=> esc_html__( 'Link', 'agami-shop' ),
	'section'   => 'agami-shop-header-info',
	'settings'  => 'agami_shop_theme_options[agami-shop-forth-info-link]',
	'type'	  	=> 'url'
) );