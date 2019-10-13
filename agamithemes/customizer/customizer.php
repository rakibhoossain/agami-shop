<?php
/**
 * Agami Shop Theme Customizer.
 *
 * @since Agami Shop 1.0.0
 * @package Agami Themes
 * @subpackage Agami Shop
 */

/*
* file for customizer core functions
*/
require_once agami_shop_file_directory('agamithemes/customizer/customizer-core.php');

/*
* file for customizer sanitization functions
*/
require_once agami_shop_file_directory('agamithemes/customizer/sanitize-functions.php');

/**
 * Adding different options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function agami_shop_customize_register( $wp_customize ) {

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    /*saved options*/
    $options  = agami_shop_get_theme_options();

    /*defaults options*/
    $defaults = agami_shop_get_default_theme_options();

    /*
    * file for customizer custom controls classes
    */
    require_once agami_shop_file_directory('agamithemes/customizer/custom-controls.php');
	require_once agami_shop_file_directory('agamithemes/customizer/customizer-repeater/customizer-control-repeater.php');

    /*
     * file for feature panel of home page
     */
	require_once agami_shop_file_directory('agamithemes/customizer/feature-section/feature-panel.php');

	/*
	* file for header top options
	*/
	require_once agami_shop_file_directory('agamithemes/customizer/header-top/header-top-panel.php');

    /*
    * file for header panel
    */
	require_once agami_shop_file_directory('agamithemes/customizer/header-options/header-panel.php');

	/*
    * file for menu panel
    */
	require_once agami_shop_file_directory('agamithemes/customizer/menu-options/menu-panel.php');

    /*
    * file for customizer footer section
    */
	require_once agami_shop_file_directory('agamithemes/customizer/footer-section/footer-section.php');

    /*
    * file for design/layout panel
    */
	require_once agami_shop_file_directory('agamithemes/customizer/design-options/design-panel.php');

    /*
    * file for single post sections
    */
	require_once agami_shop_file_directory('agamithemes/customizer/single-posts/single-post-section.php');

    /*
     * file for options panel
     */
	require_once agami_shop_file_directory('agamithemes/customizer/options/options-panel.php');

    /*
  * file for options reset
  */
	require_once agami_shop_file_directory('agamithemes/customizer/options/options-reset.php');

	/*woocommerce options*/
	if ( agami_shop_is_woocommerce_active() ) :
		require_once agami_shop_file_directory('agamithemes/customizer/wc-options/wc-panel.php');
	endif;

	/*sorting core and widget for ease of theme use*/
	$wp_customize->get_section( 'static_front_page' )->priority = 10;

	$agami_shop_home_section = $wp_customize->get_section( 'sidebar-widgets-agami-shop-home' );
	if ( ! empty( $agami_shop_home_section ) ) {
		$agami_shop_home_section->panel = '';
		$agami_shop_home_section->title = esc_html__( 'Home Main Content Area ', 'agami-shop' );
		$agami_shop_home_section->priority = 80;
	}
	$agami_shop_before_feature = $wp_customize->get_section( 'sidebar-widgets-agami-shop-before-feature' );
	if ( ! empty( $agami_shop_before_feature ) ) {
		$agami_shop_before_feature->panel = 'agami-shop-feature-panel';
		$agami_shop_before_feature->title = esc_html__( 'Before Feature ', 'agami-shop' );
		$agami_shop_before_feature->priority = 80;
	}
	$agami_shop_before_feature = $wp_customize->get_section( 'sidebar-widgets-popup-widget-area' );
	if ( ! empty( $agami_shop_before_feature ) ) {
		$agami_shop_before_feature->panel = 'agami-shop-header-top-panel';
		$agami_shop_before_feature->title = esc_html__( 'Popup Widget Area ', 'agami-shop' );
		$agami_shop_before_feature->priority = 80;
	}
	/*sidebar-widgets-agami-shop-header done in respected file*/
}
add_action( 'customize_register', 'agami_shop_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function agami_shop_customize_preview_js() {
    wp_enqueue_script( 'agami-shop-customizer', get_template_directory_uri() . '/agamithemes/core/js/customizer.js', array( 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'agami_shop_customize_preview_js' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function agami_shop_customize_controls_scripts() {
	/*Font-Awesome-master*/
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/library/Font-Awesome/css/font-awesome.min.css', array(), '4.7.0' );

	wp_enqueue_script( 'agami-shop-customizer-controls', get_template_directory_uri() . '/agamithemes/core/js/customizer-controls.js', array( 'customize-preview' ), '1.1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'agami_shop_customize_controls_scripts' );