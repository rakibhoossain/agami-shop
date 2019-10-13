<?php
/**
 * Main include functions ( to support child theme )
 *
 * @since Agami Shop 1.0.0
 *
 * @param string $file_path, path from the theme
 * @return string full path of file inside theme
 *
 */
if( !function_exists('agami_shop_file_directory') ){

    function agami_shop_file_directory( $file_path ){
        if( file_exists( trailingslashit( get_stylesheet_directory() ) . $file_path) ) {
            return trailingslashit( get_stylesheet_directory() ) . $file_path;
        }
        else{
            return trailingslashit( get_template_directory() ) . $file_path;
        }
    }
}

/**
 * Check empty or null
 *
 * @since Agami Shop 1.0.0
 *
 * @param string $str, string
 * @return boolean
 *
 */
if( !function_exists('agami_shop_is_null_or_empty') ){
	function agami_shop_is_null_or_empty( $str ){
		return ( !isset($str) || trim($str)==='' );
	}
}

/*file for library*/
if ( ! class_exists( 'TGM_Plugin_Activation' ) ) {
	require_once agami_shop_file_directory('agamithemes/library/tgm/class-tgm-plugin-activation.php');
}

/*
* file for customizer theme options
*/
require_once agami_shop_file_directory('agamithemes/customizer/customizer.php');

/*
* file for additional functions files
*/
require_once agami_shop_file_directory('agamithemes/functions.php');

require_once agami_shop_file_directory('agamithemes/functions/header.php');

require_once agami_shop_file_directory('agamithemes/functions/sidebar-selection.php');

/*woocommerce*/
require_once agami_shop_file_directory('agamithemes/woocommerce/functions-woocommerce.php');

require_once agami_shop_file_directory('agamithemes/woocommerce/class-woocommerce.php');

/*
* files for hooks
*/
require_once agami_shop_file_directory('agamithemes/hooks/tgm.php');

require_once agami_shop_file_directory('agamithemes/hooks/front-page.php');

require_once agami_shop_file_directory('agamithemes/hooks/slider-selection.php');

require_once agami_shop_file_directory('agamithemes/hooks/header.php');

require_once agami_shop_file_directory('agamithemes/hooks/dynamic-css.php');

require_once agami_shop_file_directory('agamithemes/hooks/footer.php');

require_once agami_shop_file_directory('agamithemes/hooks/comment-forms.php');

require_once agami_shop_file_directory('agamithemes/hooks/excerpts.php');

require_once agami_shop_file_directory('agamithemes/hooks/related-posts.php');

require_once agami_shop_file_directory('agamithemes/hooks/siteorigin-panels.php');

require_once agami_shop_file_directory('agamithemes/hooks/acme-demo-setup.php');

require_once agami_shop_file_directory('agamithemes/hooks/header-helper.php');

/*
* file for sidebar and widgets
*/
require_once agami_shop_file_directory('agamithemes/sidebar-widget/acme-col-posts.php');

require_once agami_shop_file_directory('agamithemes/sidebar-widget/acme-about.php');

require_once agami_shop_file_directory('agamithemes/sidebar-widget/acme-logo.php');

require_once agami_shop_file_directory('agamithemes/sidebar-widget/acme-featured-page.php');

require_once agami_shop_file_directory('agamithemes/sidebar-widget/acme-social.php');

if ( agami_shop_is_woocommerce_active() ) :
	require_once agami_shop_file_directory('agamithemes/sidebar-widget/acme-wc-products.php');
	require_once agami_shop_file_directory('agamithemes/sidebar-widget/acme-wc-cats.php');
	require_once agami_shop_file_directory('agamithemes/sidebar-widget/acme-wc-cats-tabs.php');
	require_once agami_shop_file_directory('agamithemes/sidebar-widget/acme-wc-search.php');
endif;

require_once agami_shop_file_directory('agamithemes/sidebar-widget/sidebar.php');

/*
* file for core functions imported from functions.php while downloading Underscores
*/
require_once agami_shop_file_directory('agamithemes/core.php');
require_once agami_shop_file_directory('agamithemes/gutenberg/gutenberg-init.php');

/**
 * Implement Custom Metaboxes
 */
require_once agami_shop_file_directory('agamithemes/metabox/meta-icons.php');
require_once agami_shop_file_directory('agamithemes/metabox/metabox.php');

