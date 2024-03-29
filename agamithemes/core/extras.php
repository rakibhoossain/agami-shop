<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Agami Themes
 * @subpackage Agami Shop
 * @since 1.0.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
if ( ! function_exists( 'agami_shop_body_classes' ) ) :
	function agami_shop_body_classes( $classes ) {
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}

		return $classes;
	}
endif;
add_filter( 'body_class', 'agami_shop_body_classes' );