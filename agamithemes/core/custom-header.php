<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Agami Themes
 * @subpackage Agami Shop
 * @since 1.0.0
 */

/**
 * Set up the WordPress core custom header feature.
 */
function agami_shop_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'agami_shop_custom_header_args', array(
		'default-image'				=> '',
		'header-text'				=> false,
		'width'						=> 1600,
		'height'					=> 460,
		'flex-width'				=> true,
		'flex-height'				=> true,
		'video'						=> true
    ) ) );
}
add_action( 'after_setup_theme', 'agami_shop_custom_header_setup' );