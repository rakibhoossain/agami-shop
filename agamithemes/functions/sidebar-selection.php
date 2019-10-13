<?php
/**
 * Select sidebar according to the options saved
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return string
 *
 */
if ( !function_exists('agami_shop_sidebar_selection') ) :
	function agami_shop_sidebar_selection( ) {
		wp_reset_postdata();
		$agami_shop_customizer_all_values = agami_shop_get_theme_options();
		global $post;
		if(
			isset( $agami_shop_customizer_all_values['agami-shop-single-sidebar-layout'] ) &&
			(
				'left-sidebar' == $agami_shop_customizer_all_values['agami-shop-single-sidebar-layout'] ||
				'both-sidebar' == $agami_shop_customizer_all_values['agami-shop-single-sidebar-layout'] ||
				'middle-col' == $agami_shop_customizer_all_values['agami-shop-single-sidebar-layout'] ||
				'no-sidebar' == $agami_shop_customizer_all_values['agami-shop-single-sidebar-layout']
			)
		){
			$agami_shop_body_global_class = $agami_shop_customizer_all_values['agami-shop-single-sidebar-layout'];
		}
		else{
			$agami_shop_body_global_class= 'right-sidebar';
		}

		if ( agami_shop_is_woocommerce_active() && ( is_product() || is_shop() || is_product_taxonomy() )) {
			if( is_product() ){
				$post_class = get_post_meta( $post->ID, 'agami_shop_sidebar_layout', true );
				$agami_shop_wc_single_product_sidebar_layout = $agami_shop_customizer_all_values['agami-shop-wc-single-product-sidebar-layout'];

				if ( 'default-sidebar' != $post_class ){
					if ( $post_class ) {
						$agami_shop_body_classes = $post_class;
					} else {
						$agami_shop_body_classes = $agami_shop_wc_single_product_sidebar_layout;
					}
				}
				else{
					$agami_shop_body_classes = $agami_shop_wc_single_product_sidebar_layout;

				}
			}
			else{
				if( isset( $agami_shop_customizer_all_values['agami-shop-wc-shop-archive-sidebar-layout'] ) ){
					$agami_shop_archive_sidebar_layout = $agami_shop_customizer_all_values['agami-shop-wc-shop-archive-sidebar-layout'];
					if(
						'right-sidebar' == $agami_shop_archive_sidebar_layout ||
						'left-sidebar' == $agami_shop_archive_sidebar_layout ||
						'both-sidebar' == $agami_shop_archive_sidebar_layout ||
						'middle-col' == $agami_shop_archive_sidebar_layout ||
						'no-sidebar' == $agami_shop_archive_sidebar_layout
					){
						$agami_shop_body_classes = $agami_shop_archive_sidebar_layout;
					}
					else{
						$agami_shop_body_classes = $agami_shop_body_global_class;
					}
				}
				else{
					$agami_shop_body_classes= $agami_shop_body_global_class;
				}
			}
		}
		elseif( is_front_page() ){
			if( isset( $agami_shop_customizer_all_values['agami-shop-front-page-sidebar-layout'] ) ){
				if(
					'right-sidebar' == $agami_shop_customizer_all_values['agami-shop-front-page-sidebar-layout'] ||
					'left-sidebar' == $agami_shop_customizer_all_values['agami-shop-front-page-sidebar-layout'] ||
					'both-sidebar' == $agami_shop_customizer_all_values['agami-shop-front-page-sidebar-layout'] ||
					'middle-col' == $agami_shop_customizer_all_values['agami-shop-front-page-sidebar-layout'] ||
					'no-sidebar' == $agami_shop_customizer_all_values['agami-shop-front-page-sidebar-layout']
				){
					$agami_shop_body_classes = $agami_shop_customizer_all_values['agami-shop-front-page-sidebar-layout'];
				}
				else{
					$agami_shop_body_classes = $agami_shop_body_global_class;
				}
			}
			else{
				$agami_shop_body_classes= $agami_shop_body_global_class;
			}
		}

		elseif ( is_singular() && isset( $post->ID ) ) {
			$post_class = get_post_meta( $post->ID, 'agami_shop_sidebar_layout', true );
			if ( 'default-sidebar' != $post_class ){
				if ( $post_class ) {
					$agami_shop_body_classes = $post_class;
				} else {
					$agami_shop_body_classes = $agami_shop_body_global_class;
				}
			}
			else{
				$agami_shop_body_classes = $agami_shop_body_global_class;
			}

		}
		elseif ( is_archive() ) {
			if( isset( $agami_shop_customizer_all_values['agami-shop-archive-sidebar-layout'] ) ){
				$agami_shop_archive_sidebar_layout = $agami_shop_customizer_all_values['agami-shop-archive-sidebar-layout'];
				if(
					'right-sidebar' == $agami_shop_archive_sidebar_layout ||
					'left-sidebar' == $agami_shop_archive_sidebar_layout ||
					'both-sidebar' == $agami_shop_archive_sidebar_layout ||
					'middle-col' == $agami_shop_archive_sidebar_layout ||
					'no-sidebar' == $agami_shop_archive_sidebar_layout
				){
					$agami_shop_body_classes = $agami_shop_archive_sidebar_layout;
				}
				else{
					$agami_shop_body_classes = $agami_shop_body_global_class;
				}
			}
			else{
				$agami_shop_body_classes= $agami_shop_body_global_class;
			}
		}
		else {
			$agami_shop_body_classes = $agami_shop_body_global_class;
		}
		return $agami_shop_body_classes;
	}
endif;