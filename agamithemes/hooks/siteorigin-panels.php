<?php
/**
 * Adds Agami Shop Theme Widgets in SiteOrigin Pagebuilder Tabs
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return null
 *
 */
function agami_shop_widgets($widgets) {
    $theme_widgets = array(
        'agami_shop_about',
        'agami_shop_posts_col',
        'agami_shop_featured_page',
        'agami_shop_advanced_image_logo',
        'agami_shop_social',
        'agami_shop_wc_feature_cats',
        'agami_shop_wc_cats_tabs',
        'agami_shop_wc_products',
        'agami_shop_advanced_search'
    );
    foreach($theme_widgets as $theme_widget) {
        if( isset( $widgets[$theme_widget] ) ) {
            $widgets[$theme_widget]['groups'] = array('agami-shop');
            $widgets[$theme_widget]['icon']   = 'dashicons dashicons-screenoptions';
        }
    }
    return $widgets;
}
add_filter('siteorigin_panels_widgets', 'agami_shop_widgets' );

/**
 * Add a tab for the theme widgets in the page builder
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return null
 *
 */
function agami_shop_widgets_tab($tabs){
    $tabs[] = array(
        'title'  => esc_html__('AT Agami Shop Widgets', 'agami-shop'),
        'filter' => array(
            'groups' => array('agami-shop')
        )
    );
    return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'agami_shop_widgets_tab', 20 );