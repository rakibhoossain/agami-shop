<?php
/**
 * Header top display options of elements
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return array $agami_shop_header_top_display_selection
 *
 */
if ( !function_exists('agami_shop_header_top_display_selection') ) :
	function agami_shop_header_top_display_selection() {
		$agami_shop_header_top_display_selection =  array(
			'hide' => esc_html__( 'Hide', 'agami-shop' ),
			'left' => esc_html__( 'on Top Left', 'agami-shop' ),
			'right' => esc_html__( 'on Top Right', 'agami-shop' )
		);
		return apply_filters( 'agami_shop_header_top_display_selection', $agami_shop_header_top_display_selection );
	}
endif;

/**
 * agami_shop_menu_right_button_link_options
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return array $agami_shop_menu_right_button_link_options
 *
 */
if ( !function_exists('agami_shop_menu_right_button_link_options') ) :
	function agami_shop_menu_right_button_link_options() {
		$agami_shop_menu_right_button_link_options =  array(
			'disable' => esc_html__( 'Disable', 'agami-shop' ),
			'widget' => esc_html__( 'Widget on Popup', 'agami-shop' ),
			'link' => esc_html__( 'Normal Link', 'agami-shop' )
		);
		return apply_filters( 'agami_shop_menu_right_button_link_options', $agami_shop_menu_right_button_link_options );
	}
endif;

/**
 * Header Basic Info number
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return array $agami_shop_header_bi_number
 *
 */
if ( !function_exists('agami_shop_header_bi_number') ) :
	function agami_shop_header_bi_number() {
		$agami_shop_header_bi_number =  array(
			1 => esc_html__( '1', 'agami-shop' ),
			2 => esc_html__( '2', 'agami-shop' ),
			3 => esc_html__( '3', 'agami-shop' ),
			4 => esc_html__( '4', 'agami-shop' )
		);
		return apply_filters( 'agami_shop_header_bi_number', $agami_shop_header_bi_number );
	}
endif;

/**
 * Header Media Position options
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return array $agami_shop_header_media_position
 *
 */
if ( !function_exists('agami_shop_header_media_position') ) :
	function agami_shop_header_media_position() {
		$agami_shop_header_media_position =  array(
			'very-top' => esc_html__( 'Very Top', 'agami-shop' ),
			'above-logo' => esc_html__( 'Above Site Identity', 'agami-shop' ),
			'above-menu' => esc_html__( 'Below Site Identity and Above Menu', 'agami-shop' ),
			'below-menu' => esc_html__( 'Below Menu', 'agami-shop' )
		);
		return apply_filters( 'agami_shop_header_media_position', $agami_shop_header_media_position );
	}
endif;

/**
 * Header Site identity and ads display options
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return array $agami_shop_header_logo_menu_display_position
 *
 */
if ( !function_exists('agami_shop_header_logo_menu_display_position') ) :
	function agami_shop_header_logo_menu_display_position() {
		$agami_shop_header_logo_menu_display_position =  array(
			'left-logo-right-ads' => esc_html__( 'Left Logo and Right Ads', 'agami-shop' ),
			'right-logo-left-ads' => esc_html__( 'Right Logo and Left Ads', 'agami-shop' ),
			'center-logo-below-ads' => esc_html__( 'Center Logo and Below Ads', 'agami-shop' )
		);
		return apply_filters( 'agami_shop_header_logo_menu_display_position', $agami_shop_header_logo_menu_display_position );
	}
endif;

/**
 * Feature Section Options
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return array $agami_shop_feature_section_content_options
 *
 */
if ( !function_exists('agami_shop_feature_section_content_options') ) :
	function agami_shop_feature_section_content_options() {
		$agami_shop_feature_section_content_options =  array(
			'disable' => esc_html__( 'Disable', 'agami-shop' ),
			'post' => esc_html__( 'Post', 'agami-shop' ),
		);
		if( agami_shop_is_woocommerce_active() ){
			$agami_shop_feature_section_content_options['product'] = esc_html__( 'Product', 'agami-shop' );
		}
		return apply_filters( 'agami_shop_feature_section_content_options', $agami_shop_feature_section_content_options );
	}
endif;

/**
 * Featured Slider Image Options
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return array $agami_shop_fs_image_display_options
 *
 */
if ( !function_exists('agami_shop_fs_image_display_options') ) :
	function agami_shop_fs_image_display_options() {
		$agami_shop_fs_image_display_options =  array(
			'full-screen-bg' => esc_html__( 'Full Screen Background', 'agami-shop' ),
			'responsive-img' => esc_html__( 'Responsive Image', 'agami-shop' )
		);
		return apply_filters( 'agami_shop_fs_image_display_options', $agami_shop_fs_image_display_options );
	}
endif;

/**
 * Sidebar layout options
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return array $agami_shop_sidebar_layout
 *
 */
if ( !function_exists('agami_shop_sidebar_layout') ) :
    function agami_shop_sidebar_layout() {
        $agami_shop_sidebar_layout =  array(
	        'right-sidebar' => esc_html__( 'Right Sidebar', 'agami-shop' ),
	        'left-sidebar'  => esc_html__( 'Left Sidebar' , 'agami-shop' ),
	        'both-sidebar'  => esc_html__( 'Both Sidebar' , 'agami-shop' ),
	        'middle-col'  => esc_html__( 'Middle Column' , 'agami-shop' ),
	        'no-sidebar'    => esc_html__( 'No Sidebar', 'agami-shop' )
        );
        return apply_filters( 'agami_shop_sidebar_layout', $agami_shop_sidebar_layout );
    }
endif;

/**
 * Blog layout options
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return array $agami_shop_blog_layout
 *
 */
if ( !function_exists('agami_shop_blog_layout') ) :
    function agami_shop_blog_layout() {
        $agami_shop_blog_layout =  array(
            'show-image' => esc_html__( 'Show Image', 'agami-shop' ),
            'no-image'   => esc_html__( 'Hide Image', 'agami-shop' )
        );
        return apply_filters( 'agami_shop_blog_layout', $agami_shop_blog_layout );
    }
endif;

/**
 * Reset Options
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('agami_shop_reset_options') ) :
    function agami_shop_reset_options() {
        $agami_shop_reset_options =  array(
            '0'  => esc_html__( 'Do Not Reset', 'agami-shop' ),
            'reset-color-options'  => esc_html__( 'Reset Colors Options', 'agami-shop' ),
            'reset-all' => esc_html__( 'Reset All', 'agami-shop' )
        );
        return apply_filters( 'agami_shop_reset_options', $agami_shop_reset_options );
    }
endif;

/**
 * Breadcrumbs options
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('agami_shop_breadcrumbs_options') ) :
	function agami_shop_breadcrumbs_options() {
		$agami_shop_breadcrumbs_options =  array(
			'disable'  => esc_html__( 'Disable', 'agami-shop' ),
			'default'  => esc_html__( 'Default', 'agami-shop' )
		);
		if( agami_shop_is_woocommerce_active() ){
			$agami_shop_breadcrumbs_options['wc-breadcrumb'] = esc_html__( 'WC Breadcrumb', 'agami-shop' );
		}
		return apply_filters( 'agami_shop_breadcrumbs_options', $agami_shop_breadcrumbs_options );
	}
endif;

/**
 * Blog Archive Display Options
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('agami_shop_blog_archive_category_display_options') ) :
	function agami_shop_blog_archive_category_display_options() {
		$agami_shop_blog_archive_category_display_options =  array(
			'default'  => esc_html__( 'Default', 'agami-shop' ),
			'cat-color'  => esc_html__( 'Categories with Color', 'agami-shop' )
		);
		return apply_filters( 'agami_shop_blog_archive_category_display_options', $agami_shop_blog_archive_category_display_options );
	}
endif;

/**
 * Related Post Display From Options
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('agami_shop_related_post_display_from') ) :
	function agami_shop_related_post_display_from() {
		$agami_shop_related_post_display_from =  array(
			'cat'  => esc_html__( 'Related Posts From Categories', 'agami-shop' ),
			'tag'  => esc_html__( 'Related Posts From Tags', 'agami-shop' )
		);
		return apply_filters( 'agami_shop_related_post_display_from', $agami_shop_related_post_display_from );
	}
endif;

/**
 * Image Size
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return array $agami_shop_get_image_sizes_options
 *
 */
if ( !function_exists('agami_shop_get_image_sizes_options') ) :
	function agami_shop_get_image_sizes_options( $add_disable = false ) {
		global $_wp_additional_image_sizes;
		$choices = array();
		if ( true == $add_disable ) {
			$choices['disable'] = esc_html__( 'No Image', 'agami-shop' );
		}
		foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
			$choices[ $_size ] = $_size . ' ('. get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
		}
		$choices['full'] = esc_html__( 'full (original)', 'agami-shop' );
		if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {

			foreach ($_wp_additional_image_sizes as $key => $size ) {
				$choices[ $key ] = $key . ' ('. $size['width'] . 'x' . $size['height'] . ')';
			}
		}
		return apply_filters( 'agami_shop_get_image_sizes_options', $choices );
	}
endif;

/**
 *  Default Theme layout options
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return array $agami_shop_theme_layout
 *
 */
if ( !function_exists('agami_shop_get_default_theme_options') ) :
    function agami_shop_get_default_theme_options() {

        $default_theme_options = array(

	        /*basic info*/
	        'agami-shop-header-bi-number'  => 4,
	        'agami-shop-first-info-icon'  => 'fa-volume-control-phone',
	        'agami-shop-first-info-title'  => esc_html__('+00 123 456 789', 'agami-shop'),
	        'agami-shop-first-info-link'  => '',
	        'agami-shop-second-info-icon'  => 'fa-envelope-o',
	        'agami-shop-second-info-title'  => esc_html__('example@youremail.com', 'agami-shop'),
	        'agami-shop-second-info-link'  => '',
	        'agami-shop-third-info-icon'  => 'fa-map-marker',
	        'agami-shop-third-info-title'  => esc_html__('Our Location', 'agami-shop'),
	        'agami-shop-third-info-link'  => '',
	        'agami-shop-forth-info-icon'  => 'fa-clock-o',
	        'agami-shop-forth-info-title'  => esc_html__('Working Hours', 'agami-shop'),
	        'agami-shop-forth-info-link'  => '',
            
            /*feature section options*/
            'agami-shop-feature-post-cat'  => 0,
            'agami-shop-feature-product-cat'  => 0,
            'agami-shop-feature-content-options'  => 'disable',
            'agami-shop-feature-post-number'  => 3,
            'agami-shop-feature-slider-display-cat'  => '',
            'agami-shop-feature-slider-display-title'  => 1,
            'agami-shop-feature-slider-display-excerpt'  => '',
            'agami-shop-feature-slider-display-arrow'  => 1,
            'agami-shop-feature-slider-enable-autoplay'  => 1,
            'agami-shop-fs-image-display-options'  => 'full-screen-bg',
            'agami-shop-feature-button-text'  => esc_html__('Shop Now', 'agami-shop'),

            /*feature-right*/
	        'agami-shop-feature-right-content-options'  => 'disable',
	        'agami-shop-feature-right-post-cat'  => 0,
	        'agami-shop-feature-right-product-cat'  => 0,
	        'agami-shop-feature-right-post-number'  => 2,
	        'agami-shop-feature-right-display-title'  => 1,
	        'agami-shop-feature-right-display-arrow'  => '',
	        'agami-shop-feature-right-enable-autoplay'  => 1,
	        'agami-shop-feature-right-image-display-options'  => 'full-screen-bg',
	        'agami-shop-feature-right-button-text'  => esc_html__('Shop Now', 'agami-shop'),

	        /*feature special menu*/
	        'agami-shop-feature-enable-special-menu'  => '',

	        /*header options*/
            'agami-shop-enable-header-top'  => '',
            'agami-shop-header-top-basic-info-display-selection'  => 'left',
            'agami-shop-header-top-menu-display-selection'  => 'hide',
            'agami-shop-header-top-social-display-selection'  => 'right',
            'agami-shop-top-right-button-options'  => 'link',
            'agami-shop-top-right-button-title'  => esc_html__('My Account', 'agami-shop'),
            'agami-shop-popup-widget-title'  => esc_html__('Popup Content', 'agami-shop'),
            'agami-shop-top-right-button-link'  => '',

	        /*header icons*/
	        'agami-shop-enable-cart-icon'  => '',
	        'agami-shop-enable-wishlist-icon'  => '',

            /*site identity*/
            'agami-shop-display-site-logo'  => 1,
            'agami-shop-display-site-title'  => 1,
            'agami-shop-display-site-tagline'  => 1,

            /*Menu Options*/
	        'agami-shop-enable-special-menu'  => '',
	        'agami-shop-special-menu-text'  => esc_html__('Special Menu', 'agami-shop'),

            'agami-shop-menu-right-text'  => '',
            'agami-shop-menu-right-highlight-text'  => '',
            'agami-shop-menu-right-text-link'  => '',
            'agami-shop-menu-right-link-new-tab'  => '',

	        'agami-shop-enable-sticky-menu'  => '',

            /*social options*/
            'agami-shop-social-data'  => '',

            /*media options*/
            'agami-shop-header-media-position'  => 'above-menu',
            'agami-shop-header-image-link'  => esc_url( home_url() ),
            'agami-shop-header-image-link-new-tab'  => '',

            /*logo and menu*/
            'agami-shop-header-logo-ads-display-position'  => 'left-logo-right-ads',

            /*footer options*/
            'agami-shop-footer-copyright'  => esc_html__( 'Copyright &copy; All Right Reserved', 'agami-shop' ),
	        'agami-shop-enable-footer-power-text'  => 1,

            /*blog layout*/
            'agami-shop-blog-archive-img-size' => 'full',
            'agami-shop-blog-archive-more-text'  => esc_html__( 'Read More', 'agami-shop' ),

	        /*layout/design options*/
            'agami-shop-single-sidebar-layout'  => 'right-sidebar',
            'agami-shop-front-page-sidebar-layout'  => 'right-sidebar',
            'agami-shop-archive-sidebar-layout'  => 'right-sidebar',

            'agami-shop-enable-sticky-sidebar'  => 1,
            'agami-shop-blog-archive-layout'  => 'show-image',

            'agami-shop-primary-color'  => '#f73838',
            'agami-shop-cat-hover-color'  => '#2d2d2d',

	        /*single post options*/
            'agami-shop-show-related'  => 1,
            'agami-shop-related-title'  => esc_html__( 'Related posts', 'agami-shop' ),
            'agami-shop-related-post-display-from'  => 'cat',
            'agami-shop-single-img-size'  => 'full',

            /*woocommerce*/
	        'agami-shop-wc-shop-archive-sidebar-layout'  => 'no-sidebar',
	        'agami-shop-wc-product-column-number'  => 4,
	        'agami-shop-wc-shop-archive-total-product'  => 16,
	        'agami-shop-wc-single-product-sidebar-layout'  => 'no-sidebar',

	        /*theme options*/
            'agami-shop-search-placeholder'  => esc_html__( 'Search', 'agami-shop' ),
            'agami-shop-breadcrumb-options'  => 'default',

            'agami-shop-hide-front-page-content'  => '',

            /*Reset*/
            'agami-shop-reset-options'  => '0'
        );

        return apply_filters( 'agami_shop_default_theme_options', $default_theme_options );
    }
endif;

/**
 * Get theme options
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return array agami_shop_theme_options
 *
 */
if ( !function_exists('agami_shop_get_theme_options') ) :
    function agami_shop_get_theme_options() {

        $agami_shop_default_theme_options = agami_shop_get_default_theme_options();
        $agami_shop_get_theme_options = get_theme_mod( 'agami_shop_theme_options');
        if( is_array( $agami_shop_get_theme_options )){
            return array_merge( $agami_shop_default_theme_options, $agami_shop_get_theme_options );
        }
        else{
            return $agami_shop_default_theme_options;
        }
    }
endif;