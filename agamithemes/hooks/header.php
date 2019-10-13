<?php
/**
 * Setting global variables for all theme options saved values
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'agami_shop_set_global' ) ) :

    function agami_shop_set_global() {
        /*Getting saved values start*/
        $agami_shop_saved_theme_options = agami_shop_get_theme_options();
        $GLOBALS['agami_shop_customizer_all_values'] = $agami_shop_saved_theme_options;
        /*Getting saved values end*/
    }
endif;
add_action( 'agami_shop_action_before_head', 'agami_shop_set_global', 0 );

/**
 * Doctype Declaration
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'agami_shop_doctype' ) ) :
    function agami_shop_doctype() {
        ?><!DOCTYPE html>
        <html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/html">
    <?php
    }
endif;
add_action( 'agami_shop_action_before_head', 'agami_shop_doctype', 10 );

/**
 * Code inside head tage but before wp_head funtion
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'agami_shop_before_wp_head' ) ) :

    function agami_shop_before_wp_head() {
        ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="<?php echo esc_url('http://gmpg.org/xfn/11')?>">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php
    }
endif;
add_action( 'agami_shop_action_before_wp_head', 'agami_shop_before_wp_head', 10 );

/**
 * Add body class
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'agami_shop_body_class' ) ) :

    function agami_shop_body_class( $agami_shop_body_classes ) {
        global $agami_shop_customizer_all_values;
        if ( 'no-image' == $agami_shop_customizer_all_values['agami-shop-blog-archive-layout'] ) {
            $agami_shop_body_classes[] = 'blog-no-image';
        }

	    if( 1 == $agami_shop_customizer_all_values['agami-shop-enable-sticky-sidebar'] ){
		    $agami_shop_body_classes[] = 'at-sticky-sidebar';
	    }
	    $agami_shop_header_logo_menu_display_position = $agami_shop_customizer_all_values['agami-shop-header-logo-ads-display-position'];
	    $agami_shop_body_classes[] = esc_attr( $agami_shop_header_logo_menu_display_position );

        $agami_shop_body_classes[] = agami_shop_sidebar_selection();

        /*feature section*/
	    $agami_shop_enable_special_menu = $agami_shop_customizer_all_values['agami-shop-enable-special-menu'];
	    $agami_shop_feature_enable_special_menu = $agami_shop_customizer_all_values['agami-shop-feature-enable-special-menu'];
	    $agami_shop_feature_content_options = $agami_shop_customizer_all_values['agami-shop-feature-content-options'];
	    $agami_shop_feature_right_content_options = $agami_shop_customizer_all_values['agami-shop-feature-right-content-options'];
	    if( is_front_page() &&
            !is_home() &&
            ('disable' != $agami_shop_feature_content_options || 'disable' != $agami_shop_feature_right_content_options ) &&
            1 == $agami_shop_enable_special_menu &&
            1 == $agami_shop_feature_enable_special_menu
        ){
		    $agami_shop_body_classes[] = 'agami-shop-feature-special-menu';
	    }

        return $agami_shop_body_classes;
    }
endif;
add_action( 'body_class', 'agami_shop_body_class', 10, 1);

/**
 * Page start
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'agami_shop_page_start' ) ) :

    function agami_shop_page_start() {
        ?>
        <div id="page" class="hfeed site">
    <?php
    }
endif;
add_action( 'agami_shop_action_before', 'agami_shop_page_start', 15 );

/**
 * Skip to content
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'agami_shop_skip_to_content' ) ) :

    function agami_shop_skip_to_content() {
        ?>
        <a class="skip-link screen-reader-text" href="#content" title="link"><?php esc_html_e( 'Skip to content', 'agami-shop' ); ?></a>
    <?php
    }
endif;
add_action( 'agami_shop_action_before_header', 'agami_shop_skip_to_content', 10 );

/**
 * Main header
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'agami_shop_header' ) ) :

    function agami_shop_header() {
        global $agami_shop_customizer_all_values;
	    $agami_shop_header_media_position = $agami_shop_customizer_all_values['agami-shop-header-media-position'];
	    if( 'very-top' == $agami_shop_header_media_position ){
		    agami_shop_header_markup();
	    }

	    $agami_shop_enable_header_top = $agami_shop_customizer_all_values['agami-shop-enable-header-top'];
	    $agami_shop_top_right_button_title = $agami_shop_customizer_all_values['agami-shop-top-right-button-title'];
	    $agami_shop_top_right_button_link = $agami_shop_customizer_all_values['agami-shop-top-right-button-link'];
	    ?>
        <header id="masthead" class="site-header">
            <?php
            if( 1 == $agami_shop_enable_header_top ){
	            $agami_shop_header_top_basic_info_display_selection = $agami_shop_customizer_all_values['agami-shop-header-top-basic-info-display-selection'];
	            $agami_shop_header_top_menu_display_selection = $agami_shop_customizer_all_values['agami-shop-header-top-menu-display-selection'];
	            $agami_shop_header_top_social_display_selection = $agami_shop_customizer_all_values['agami-shop-header-top-social-display-selection'];
	            $agami_shop_top_right_button_options = $agami_shop_customizer_all_values['agami-shop-top-right-button-options'];
	            ?>
                <div class="top-header-wrapper clearfix">
                    <div class="wrapper">
                        <div class="header-left">
				            <?php
                            if( 'left' == $agami_shop_header_top_basic_info_display_selection ){
	                            do_action('agami_shop_action_basic_info');
                            }
				            if( 'left' == $agami_shop_header_top_menu_display_selection ){
					            do_action('agami_shop_action_top_menu');
				            }
				            if( 'left' == $agami_shop_header_top_social_display_selection ){
					            do_action('agami_shop_action_social_links');
				            }
				            ?>
                        </div>
                        <div class="header-right">
                            <?php
	                        if( 'right' == $agami_shop_header_top_basic_info_display_selection ){
		                        do_action('agami_shop_action_basic_info');
	                        }
	                        if( 'right' == $agami_shop_header_top_menu_display_selection ){
		                        do_action('agami_shop_action_top_menu');
	                        }
	                        if( 'right' == $agami_shop_header_top_social_display_selection ){
		                        do_action('agami_shop_action_social_links');
	                        }
                            if( 'disable' != $agami_shop_top_right_button_options ){
	                            $agami_shop_top_right_button_title = !empty( $agami_shop_top_right_button_title )? $agami_shop_top_right_button_title : '';
	                            if( 'widget' == $agami_shop_top_right_button_options ){
		                            ?>
                                    <div class="icon-box">
                                        <a id="at-modal-open" class="my-account at-modal" href="<?php echo esc_url( $agami_shop_top_right_button_link );?>">
				                            <?php echo esc_html( $agami_shop_top_right_button_title );?>
                                        </a>
                                    </div>
		                            <?php
	                            }
	                            else{
		                            ?>
                                    <div class="icon-box">
                                        <a class="my-account" href="<?php echo esc_url( $agami_shop_top_right_button_link );?>">
				                            <?php echo esc_html( $agami_shop_top_right_button_title );?>
                                        </a>
                                    </div>
		                            <?php
	                            }
                            }
	                        ?>
                        </div><!--.header-right-->
                    </div><!-- .top-header-container -->
                </div><!-- .top-header-wrapper -->
                <?php
            }
            ?>
            <div class="header-wrapper clearfix">
                <div class="wrapper">
	                <?php
	                if( 'above-logo' == $agami_shop_header_media_position ){
		                agami_shop_header_markup();
	                }
	                $agami_shop_display_site_logo = $agami_shop_customizer_all_values['agami-shop-display-site-logo'];
	                $agami_shop_display_site_title = $agami_shop_customizer_all_values['agami-shop-display-site-title'];
	                $agami_shop_display_site_tagline = $agami_shop_customizer_all_values['agami-shop-display-site-tagline'];
	                if( 1== $agami_shop_display_site_logo || 1 == $agami_shop_display_site_title || 1 == $agami_shop_display_site_tagline ):
		                ?>
                        <div class="site-logo">
			                <?php
			                if ( 1 == $agami_shop_display_site_logo  ):
				                if ( function_exists( 'the_custom_logo' ) ) :
					                the_custom_logo();
				                endif;
			                endif;
			                if ( 1 == $agami_shop_display_site_title || 1 == $agami_shop_display_site_tagline ){
			                    echo "<div class='site-title-tagline'>";
				                if ( 1 == $agami_shop_display_site_title  ):
					                if ( is_front_page() && is_home() ) : ?>
                                        <h1 class="site-title">
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                        </h1>
					                <?php else : ?>
                                        <p class="site-title">
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                        </p>
						                <?php
					                endif;
				                endif;
				                if ( 1 == $agami_shop_display_site_tagline ):
					                $description = get_bloginfo( 'description', 'display' );
					                if ( $description || is_customize_preview() ) : ?>
                                        <p class="site-description"><?php echo esc_html( $description ); ?></p>
					                <?php endif;
				                endif;
				                echo "</div>";
                            }
			                ?>
                        </div><!--site-logo-->
		                <?php
	                endif;
	                $agami_shop_header_logo_menu_display_position = $agami_shop_customizer_all_values['agami-shop-header-logo-ads-display-position'];
	                if( 'center-logo-below-ads' == $agami_shop_header_logo_menu_display_position ){
	                    echo "<div class='center-wrapper'>";
                    }
                    else{
	                    echo "<div class='center-wrapper-mx-width'>";
                    }
	                $agami_shop_enable_cart_icon = $agami_shop_customizer_all_values['agami-shop-enable-cart-icon'];
	                $agami_shop_enable_wishlist_icon = $agami_shop_customizer_all_values['agami-shop-enable-wishlist-icon'];

	                if ( agami_shop_is_woocommerce_active() && ( $agami_shop_enable_cart_icon || $agami_shop_enable_wishlist_icon )) : ?>
                        <div class="cart-section">
			                <?php
			                if ( class_exists( 'YITH_WCWL' ) &&  $agami_shop_enable_wishlist_icon ) :
				                $wishlist_page_id = yith_wcwl_object_id( get_option( 'yith_wcwl_wishlist_page_id' ) );
				                if ( absint( $wishlist_page_id ) > 0 ) : ?>
                                    <div class="yith-wcwl-wrapper">
                                        <a class="at-wc-icon wishlist-icon" href="<?php echo esc_url( get_permalink( $wishlist_page_id ) ); ?>">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                            <span class="wishlist-value"><?php echo absint( yith_wcwl_count_products() ); ?></span>
                                        </a>
                                    </div>
					                <?php
				                endif;
			                endif;
			                if( $agami_shop_enable_cart_icon ){
                                ?>
                            <div class="wc-cart-wrapper">
                                <div class="wc-cart-icon-wrapper">
                                    <a class="at-wc-icon cart-icon" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span class="cart-value cart-customlocation"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
                                    </a>
                                </div>
                                <div class="wc-cart-widget-wrapper">
					                <?php the_widget( 'WC_Widget_Cart', '' ); ?>
                                </div>
                            </div>
                            <?php
			                }
			                ?>
                        </div> <!-- .cart-section -->
	                <?php endif; ?>
                    <div class="header-ads-adv-search float-right">
		                <?php
		                if( is_active_sidebar( 'agami-shop-header' ) ) :
			                dynamic_sidebar( 'agami-shop-header' );
		                endif;
		                ?>
                    </div>
                    <?php
                    echo "</div>";/*.center-wrapper*/
                    ?>
                </div><!--.wrapper-->
                <div class="clearfix"></div>
                <div class="navigation-wrapper">
	                <?php
	                if( 'above-menu' == $agami_shop_header_media_position ){
		                agami_shop_header_markup();
	                }
	                $agami_shop_nav_class ='';
	                $agami_shop_feature_enable_special_menu = $agami_shop_customizer_all_values['agami-shop-feature-enable-special-menu'];

	                if( 1 != $agami_shop_feature_enable_special_menu && 1 == $agami_shop_customizer_all_values['agami-shop-enable-sticky-menu'] ) {
		                $agami_shop_nav_class = ' agami-shop-enable-sticky-menu ';
	                }
	                $agami_shop_enable_special_menu = $agami_shop_customizer_all_values['agami-shop-enable-special-menu'];
	                if( 1 == $agami_shop_enable_special_menu ) {
		                $agami_shop_nav_class .= ' agami-shop-enable-special-menu ';
	                }
	                ?>
                    <nav id="site-navigation" class="main-navigation <?php echo esc_attr( $agami_shop_nav_class );?> clearfix">
                        <div class="header-main-menu wrapper clearfix">
                            <?php
                            if( 1 == $agami_shop_enable_special_menu ){
	                            $agami_shop_special_menu_text = $agami_shop_customizer_all_values['agami-shop-special-menu-text'];
                                ?>
                                <ul class="menu special-menu-wrapper">
                                    <li class="menu-item menu-item-has-children">
                                        <a href="javascript:void(0)" class="special-menu">
                                            <i class="fa fa-navicon toggle"></i><?php echo esc_html( $agami_shop_special_menu_text ); ?>
                                        </a>
			                            <?php
			                            if ( has_nav_menu( 'special-menu' ) ) {
				                            wp_nav_menu( array(
					                            'theme_location' => 'special-menu',
					                            'menu_class' => 'sub-menu special-sub-menu',
					                            'container' => false
				                            ) );
			                            }
			                            ?>
                                        <div class="responsive-special-sub-menu clearfix"></div>
                                    </li>
                                </ul>
                                <?php
                            }/*special menu*/
                            ?>
                            <div class="agamithemes-nav">
	                            <?php
	                            wp_nav_menu(array('theme_location' => 'primary','container' => false));

	                            $agami_shop_menu_right_text = $agami_shop_customizer_all_values['agami-shop-menu-right-text'];
	                            $agami_shop_menu_right_highlight_text = $agami_shop_customizer_all_values['agami-shop-menu-right-highlight-text'];
	                            $agami_shop_menu_right_text_link = $agami_shop_customizer_all_values['agami-shop-menu-right-text-link'];
	                            $agami_shop_menu_right_link_new_tab = $agami_shop_customizer_all_values['agami-shop-menu-right-link-new-tab'];
	                            if( !empty( $agami_shop_menu_right_text ) ){
		                            ?>
                                    <div class="at-menu-right-wrapper">
			                            <?php
			                            if( !empty( $agami_shop_menu_right_text_link ) ){
			                            ?>
                                        <a class="cart-icon" href="<?php echo esc_url( $agami_shop_menu_right_text_link ); ?>" target="<?php echo ($agami_shop_menu_right_link_new_tab==1? '_blank':'')?>">
				                            <?php
				                            }
				                            if( !empty( $agami_shop_menu_right_highlight_text ) ){
					                            ?>
                                                <span class="menu-right-highlight-text">
                                                    <?php echo esc_html( $agami_shop_menu_right_highlight_text );?>
                                                </span>
					                            <?php
				                            }
				                            ?>
                                            <span class="menu-right-text">
                                                <?php echo esc_html( $agami_shop_menu_right_text );?>
                                            </span>
				                            <?php
				                            if( !empty( $agami_shop_menu_right_text_link ) ){
				                            ?>
                                        </a>
		                            <?php
		                            }
		                            ?>
                                    </div><!--.at-menu-right-wrapper-->
		                            <?php
	                            }
	                            ?>
                            </div>

                        </div>
                        <div class="responsive-slick-menu clearfix"></div>
                    </nav>
                    <?php
                    if( 'below-menu' == $agami_shop_header_media_position ){
	                    agami_shop_header_markup();
                    }
                    ?>
                    <!-- #site-navigation -->
                </div>
                <!-- .header-container -->
            </div>
            <!-- header-wrapper-->
        </header>
        <!-- #masthead -->
    <?php
    }
endif;
add_action( 'agami_shop_action_header', 'agami_shop_header', 10 );

/**
 * Before main content
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'agami_shop_before_content' ) ) :

    function agami_shop_before_content() {
	    global $agami_shop_customizer_all_values;
	    ?>
        <div class="content-wrapper clearfix">
            <div id="content" class="wrapper site-content">
        <?php
        if( 'disable' != $agami_shop_customizer_all_values['agami-shop-breadcrumb-options'] && !is_front_page()){
            agami_shop_breadcrumbs();
        }
	    $sidebar_layout = agami_shop_sidebar_selection( get_the_ID() );
	    if( 'both-sidebar' == $sidebar_layout && ( !is_front_page() || (is_front_page() && is_home() )) ) {
		    echo '<div id="primary-wrap" class="clearfix">';
	    }
    }
endif;
add_action( 'agami_shop_action_after_header', 'agami_shop_before_content', 10 );