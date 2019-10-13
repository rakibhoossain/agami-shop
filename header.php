<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Agami Themes
 * @subpackage Agami Shop
 */

/**
 * agami_shop_action_before_head hook
 * @since Agami Shop 1.0.0
 *
 * @hooked agami_shop_set_global -  0
 * @hooked agami_shop_doctype -  10
 */
do_action( 'agami_shop_action_before_head' );?>
	<head>

		<?php
		/**
		 * agami_shop_action_before_wp_head hook
		 * @since Agami Shop 1.0.0
		 *
		 * @hooked agami_shop_before_wp_head -  10
		 */
		do_action( 'agami_shop_action_before_wp_head' );

		wp_head();
		?>

	</head>
<body <?php body_class();
/**
 * agami_shop_action_body_attr hook
 * @since Agami Shop 1.0.0
 *
 * @hooked agami_shop_body_attr- 10
 */
do_action( 'agami_shop_action_body_attr' );?>>

<?php
/**
 * agami_shop_action_before hook
 * @since Agami Shop 1.0.0
 *
 * @hooked agami_shop_page_start - 10
 * @hooked agami_shop_page_start - 15
 */
do_action( 'agami_shop_action_before' );

/**
 * agami_shop_action_before_header hook
 * @since Agami Shop 1.0.0
 *
 * @hooked agami_shop_skip_to_content - 10
 */
do_action( 'agami_shop_action_before_header' );

/**
 * agami_shop_action_header hook
 * @since Agami Shop 1.0.0
 *
 * @hooked agami_shop_after_header - 10
 */
do_action( 'agami_shop_action_header' );

/**
 * agami_shop_action_after_header hook
 * @since Agami Shop 1.0.0
 *
 * @hooked null
 */
do_action( 'agami_shop_action_after_header' );

/**
 * agami_shop_action_before_content hook
 * @since Agami Shop 1.0.0
 *
 * @hooked agami_shop_before_content - 10
 */
do_action( 'agami_shop_action_before_content' );