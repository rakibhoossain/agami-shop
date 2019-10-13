<?php
/*sorting core and widget for ease of theme use*/
$agami_shop_header_sidebar_section = $wp_customize->get_section( 'sidebar-widgets-agami-shop-header' );
if ( ! empty( $agami_shop_header_sidebar_section ) ) {
	$agami_shop_header_sidebar_section->panel = 'agami-shop-header-panel';
	$agami_shop_header_sidebar_section->title = esc_html__( 'Header Search or Ads', 'agami-shop' );
	$agami_shop_header_sidebar_section->priority = 30;
}

$agami_shop_header_title_tagline = $wp_customize->get_section( 'title_tagline' );
$agami_shop_header_title_tagline->panel = 'agami-shop-header-panel';
$agami_shop_header_title_tagline->title = esc_html__( 'Site Identity( Logo, Title & Tagline )', 'agami-shop' );
$agami_shop_header_title_tagline->priority = 20;