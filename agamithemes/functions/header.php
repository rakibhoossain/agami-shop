<?php
/**
 * Displays header media
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Agami Themes
 * @subpackage Agami Shop
 * @since 1.0.0
 */
function agami_shop_header_image_markup( $html, $header, $attr ) {

	$output = '';
	$agami_shop_customizer_all_values = agami_shop_get_theme_options();
	$agami_shop_header_image_link = $agami_shop_customizer_all_values['agami-shop-header-image-link'];
	$agami_shop_header_image_link_new_tab = $agami_shop_customizer_all_values['agami-shop-header-image-link-new-tab'];
	$output .= '<div class="wrapper header-image-wrap">';
	if ( !empty( $agami_shop_header_image_link)) {
		$target = "";
		if( 1 == $agami_shop_header_image_link_new_tab ){
			$target = 'target = _blank';
		}
		$output .= '<a '.esc_attr( $target ) .' href="'.esc_url( $agami_shop_header_image_link ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">';
	}
	$output .= $html;
	if ( !empty( $agami_shop_header_image_link)) {
		$output .= ' </a>';
	}
	$output .= "</div>";
	return $output;
}
add_filter( 'get_header_image_tag', 'agami_shop_header_image_markup', 99, 3 );

if ( ! function_exists( 'agami_shop_header_markup' ) ) :

	function agami_shop_header_markup() {
		if ( function_exists( 'the_custom_header_markup' ) ) {
			the_custom_header_markup();
		}
		else {
			$header_image = get_header_image();
			if( ! empty( $header_image ) ) {
				$agami_shop_customizer_all_values = agami_shop_get_theme_options();
				$agami_shop_header_image_link = $agami_shop_customizer_all_values['agami-shop-header-image-link'];
				$agami_shop_header_image_link_new_tab = $agami_shop_customizer_all_values['agami-shop-header-image-link-new-tab'];
				echo '<div class="wrapper header-image-wrap">';
				if ( !empty( $agami_shop_header_image_link)) {
					$target = "";
				    if( 1 == $agami_shop_header_image_link_new_tab ){
				        $target = "target = _blank";
                    }
				    ?>
					<a <?php echo esc_attr( $target ); ?> href="<?php echo esc_url( $agami_shop_header_image_link ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<?php
				}
				?>
                <img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				<?php
				if ( !empty( $agami_shop_header_image_link ) ) { ?>
					</a>
					<?php
				}
				echo "</div>";
			}
		}
	}
endif;