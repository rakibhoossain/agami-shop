<?php
/**
 * Before main content
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'agami_shop_featured_slider' ) ) :

	function agami_shop_featured_slider() {
		if( is_front_page() && !is_home() ) {

			/*Slider Feature Section*/
			/**
			 * agami_shop_action_feature_slider
			 * @since Agami Shop 1.0.0
			 *
			 * @hooked agami_shop_feature_slider -  0
			 */
			do_action('agami_shop_action_feature_slider');

		}
	}
endif;
add_action( 'agami_shop_action_front_page', 'agami_shop_featured_slider', 10 );

/**
 * Front page hook for all WordPress Conditions
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'agami_shop_front_page' ) ) :

    function agami_shop_front_page() {
	    $agami_shop_customizer_all_values = agami_shop_get_theme_options();
	    $agami_shop_hide_front_page_content = $agami_shop_customizer_all_values['agami-shop-hide-front-page-content'];

	    /*show widget in front page, now user are not force to use front page*/
	    if( is_active_sidebar( 'agami-shop-home' ) && !is_home() ){
		    dynamic_sidebar( 'agami-shop-home' );
	    }
	    $sidebar_layout = agami_shop_sidebar_selection( get_the_ID() );
	    if( 'both-sidebar' == $sidebar_layout && is_front_page() && !is_home() ) {
		    echo '<div id="primary-wrap" class="clearfix">';
	    }
	    if ( 'posts' == get_option( 'show_on_front' ) ) {
		    include( get_home_template() );
	    }
	    else {
		    if( 1 != $agami_shop_hide_front_page_content ){
			    include( get_page_template() );
		    }
	    }
    }
endif;
add_action( 'agami_shop_action_front_page', 'agami_shop_front_page', 20 );