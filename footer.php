<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Agami Themes
 * @subpackage Agami Shop
 */

/**
 * agami_shop_action_after_content hook
 * @since Agami Shop 1.0.0
 *
 * @hooked agami_shop_after_content - 10
 */
do_action( 'agami_shop_action_after_content' );

/**
 * agami_shop_action_before_footer hook
 * @since Agami Shop 1.0.0
 *
 * @hooked null
 */
do_action( 'agami_shop_action_before_footer' );

/**
 * agami_shop_action_footer hook
 * @since Agami Shop 1.0.0
 *
 * @hooked agami_shop_footer - 10
 */
do_action( 'agami_shop_action_footer' );

/**
 * agami_shop_action_after_footer hook
 * @since Agami Shop 1.0.0
 *
 * @hooked null
 */
do_action( 'agami_shop_action_after_footer' );

/**
 * agami_shop_action_after hook
 * @since Agami Shop 1.0.0
 *
 * @hooked agami_shop_page_end - 10
 */
do_action( 'agami_shop_action_after' );
wp_footer(); ?>
</body>
</html>