<?php
/**
 * The front-page template file.
 *
 * @package Agami Themes
 * @subpackage Agami Shop
 * @since Agami Shop 1.0.0
 */
get_header();
/**
 * agami_shop_action_front_page hook
 * @since Agami Shop 1.0.0
 *
 * @hooked agami_shop_front_page -  10
 */
do_action( 'agami_shop_action_front_page' );

get_footer();