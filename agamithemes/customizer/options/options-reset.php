<?php
/**
 * Reset options
 * Its outside options panel
 *
 * @param  array $reset_options
 * @return void
 *
 * @since Agami Shop 1.0.0
 */
if ( ! function_exists( 'agami_shop_reset_db_options' ) ) :
    function agami_shop_reset_db_options( $reset_options ) {
        set_theme_mod( 'agami_shop_theme_options', $reset_options );
    }
endif;

function agami_shop_reset_db_setting( ){
	$agami_shop_customizer_all_values = agami_shop_get_theme_options();
	$input = $agami_shop_customizer_all_values['agami-shop-reset-options'];
	if( '0' == $input ){
		return;
	}
    $agami_shop_default_theme_options = agami_shop_get_default_theme_options();
    $agami_shop_get_theme_options = get_theme_mod( 'agami_shop_theme_options');

    switch ( $input ) {
        case "reset-color-options":
            $agami_shop_get_theme_options['agami-shop-primary-color'] = $agami_shop_default_theme_options['agami-shop-primary-color'];
            agami_shop_reset_db_options($agami_shop_get_theme_options);
            break;

        case "reset-all":
            agami_shop_reset_db_options($agami_shop_default_theme_options);
            break;

        default:
            break;
    }
}
add_action( 'customize_save_after','agami_shop_reset_db_setting' );

/*adding sections for Reset Options*/
$wp_customize->add_section( 'agami-shop-reset-options', array(
    'priority'       => 220,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Reset Options', 'agami-shop' )
) );

/*Reset Options*/
$wp_customize->add_setting( 'agami_shop_theme_options[agami-shop-reset-options]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['agami-shop-reset-options'],
    'sanitize_callback' => 'agami_shop_sanitize_select',
    'transport'			=> 'postMessage'
) );

$choices = agami_shop_reset_options();
$wp_customize->add_control( 'agami_shop_theme_options[agami-shop-reset-options]', array(
    'choices'  	=> $choices,
    'label'		=> esc_html__( 'Reset Options', 'agami-shop' ),
    'description'=> esc_html__( 'Caution: Reset theme settings according to the given options. Refresh the page after saving to view the effects. ', 'agami-shop' ),
    'section'   => 'agami-shop-reset-options',
    'settings'  => 'agami_shop_theme_options[agami-shop-reset-options]',
    'type'	  	=> 'select'
) );