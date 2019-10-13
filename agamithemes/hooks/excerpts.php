<?php
/**
 * Excerpt length 90 return
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( !function_exists('agami_shop_alter_excerpt') ) :
    function agami_shop_alter_excerpt( $length ){
		if( is_admin() ){
			return $length;
		}
        return 90;
    }
endif;

add_filter('excerpt_length', 'agami_shop_alter_excerpt');

/**
 * Add ... for more view
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return null
 *
 */

if ( !function_exists('agami_shop_excerpt_more') ) :
    function agami_shop_excerpt_more( $more ) {
		if( is_admin() ){
			return $more;
		}
        return '&hellip;';
    }
endif;
add_filter('excerpt_more', 'agami_shop_excerpt_more');