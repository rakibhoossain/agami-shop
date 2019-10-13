<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package Agami Themes
 * @subpackage Agami Shop
 * @since 1.0.0
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
if ( ! function_exists( 'agami_shop_jetpack_setup' ) ) :
	function agami_shop_jetpack_setup() {
		add_theme_support( 'infinite-scroll', array(
			'container' => 'main',
			'render'    => 'agami_shop_infinite_scroll_render',
			'footer'    => 'page',
		) );
	} // end function agami_shop_jetpack_setup
endif;
add_action( 'after_setup_theme', 'agami_shop_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
if ( ! function_exists( 'agami_shop_infinite_scroll_render' ) ) :
	function agami_shop_infinite_scroll_render() {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content', get_post_format() );
		}
	} // end function agami_shop_infinite_scroll_render
endif;