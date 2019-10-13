<?php
/**
 * Sanitize choices
 * @since Agami Shop 1.1.1
 * @param null
 * @return string $agami_shop_about_column_number
 *
 */
if ( ! function_exists( 'agami_shop_sanitize_choice_options' ) ) :
	function agami_shop_sanitize_choice_options( $value, $choices, $default ) {
		$input = esc_attr( $value );
		$output = array_key_exists( $input, $choices ) ? $input : $default;
		return $output;
	}
endif;

/**
 * Common functions for widgets
 * @since Agami Shop 1.0.0
 * @param null
 * @return array $agami_shop_about_column_number
 *
 */
if ( ! function_exists( 'agami_shop_background_options' ) ) :
	function agami_shop_background_options() {
		$agami_shop_about_column_number = array(
			'default' => esc_html__( 'Default', 'agami-shop' ),
			'gray' => esc_html__( 'Gray', 'agami-shop' )
		);
		return apply_filters( 'agami_shop_background_options', $agami_shop_about_column_number );
	}
endif;

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function agami_shop_widget_init(){
    register_sidebar(array(
        'name' => esc_html__('Main( Right or Left ) Sidebar Area', 'agami-shop'),
        'id'   => 'agami-shop-sidebar',
        'description' => esc_html__('Displays items on sidebar.', 'agami-shop'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="at-title-action-wrapper clearfix"><h3 class="widget-title">',
        'after_title' => '</h3></div>'
    ));
	if ( is_customize_preview() ) {
		$description = sprintf( esc_html__( 'Displays widgets on home page main content area.%1$s Note : Please go to %2$s Homepage Settings %3$s, Select "A static page" then "Front page" and "Posts page" to show added widgets', 'agami-shop' ), '<br />','<b><a class="at-customizer" data-section="static_front_page" style="cursor: pointer">','</a></b>' );
	}
	else{
		$description = esc_html__( 'Displays widgets on Front/Home page. Note : Please go to Setting => Reading, Select "A static page" then "Front page" and "Posts page" to show added widgets', 'agami-shop' );
	}
    register_sidebar(array(
        'name' => esc_html__('Home Main Content Area', 'agami-shop'),
        'id'   => 'agami-shop-home',
        'description'	=> $description,
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="at-title-action-wrapper clearfix"><h2 class="widget-title">',
        'after_title' => '</h2></div>',
    ));
	register_sidebar(array(
		'name' => esc_html__('Left Sidebar Area', 'agami-shop'),
		'id'   => 'agami-shop-sidebar-left',
		'description' => esc_html__('Displays items on left sidebar.', 'agami-shop'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="at-title-action-wrapper clearfix"><h3 class="widget-title">',
		'after_title' => '</h3></div>'
	));

	$description = esc_html__('Displays items on header area. Fit For Advertisement or AT Advanced WooCommerce Search Widget', 'agami-shop');
	register_sidebar(array(
		'name' => esc_html__('Header Area', 'agami-shop'),
		'id'   => 'agami-shop-header',
		'description' => $description,
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="at-title-action-wrapper clearfix"><h3 class="widget-title">',
		'after_title' => '</h3></div>'
	));
	$description = esc_html__('Displays items before Feature Section. Fit For "AT About Service" Section Widget', 'agami-shop');
	register_sidebar(array(
		'name' => esc_html__('Before Feature', 'agami-shop'),
		'id'   => 'agami-shop-before-feature',
		'description' => $description,
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="at-title-action-wrapper clearfix"><h3 class="widget-title">',
		'after_title' => '</h3></div>'
	));

	register_sidebar(array(
		'name' => esc_html__('Single After Content', 'agami-shop'),
		'id'   => 'single-after-content',
		'description' => esc_html__('Displays items on single post after content', 'agami-shop'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="at-title-action-wrapper clearfix"><h3 class="widget-title">',
		'after_title' => '</h3></div>'
	));

	register_sidebar(array(
		'name' => esc_html__('Full Width Top Footer Area', 'agami-shop'),
		'id'   => 'full-width-top-footer',
		'description' => esc_html__('Displays items on Footer area.', 'agami-shop'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="at-title-action-wrapper clearfix"><h3 class="widget-title">',
		'after_title' => '</h3></div>'
	));

    register_sidebar(array(
        'name' => esc_html__('Footer Top Column One', 'agami-shop'),
        'id' => 'footer-top-col-one',
        'description' => esc_html__('Displays items on top footer section.', 'agami-shop'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="at-title-action-wrapper clearfix"><h3 class="widget-title">',
        'after_title' => '</h3></div>'
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Top Column Two', 'agami-shop'),
        'id' => 'footer-top-col-two',
        'description' => esc_html__('Displays items on top footer section.', 'agami-shop'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="at-title-action-wrapper clearfix"><h3 class="widget-title">',
        'after_title' => '</h3></div>'
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Top Column Three', 'agami-shop'),
        'id' => 'footer-top-col-three',
        'description' => esc_html__('Displays items on top footer section.', 'agami-shop'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="at-title-action-wrapper clearfix"><h3 class="widget-title">',
        'after_title' => '</h3></div>'
    ));

	register_sidebar(array(
		'name' => esc_html__('Footer Top Column Four', 'agami-shop'),
		'id' => 'footer-top-col-four',
		'description' => esc_html__('Displays items on top footer section.', 'agami-shop'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="at-title-action-wrapper clearfix"><h3 class="widget-title">',
		'after_title' => '</h3></div>'
	));

	register_sidebar(array(
		'name' => esc_html__('Footer Bottom Column One', 'agami-shop'),
		'id' => 'footer-bottom-col-one',
		'description' => esc_html__('Displays items on bottom footer section.', 'agami-shop'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="at-title-action-wrapper clearfix"><h3 class="widget-title">',
		'after_title' => '</h3></div>'
	));

	register_sidebar(array(
		'name' => esc_html__('Footer Bottom Column Two', 'agami-shop'),
		'id' => 'footer-bottom-col-two',
		'description' => esc_html__('Displays items on bottom footer section.', 'agami-shop'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="at-title-action-wrapper clearfix"><h3 class="widget-title">',
		'after_title' => '</h3></div>'
	));

	register_sidebar(array(
		'name' => esc_html__('Full Width Bottom Footer Area', 'agami-shop'),
		'id'   => 'full-width-bottom-footer',
		'description' => esc_html__('Displays items on Footer area.', 'agami-shop'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="at-title-action-wrapper clearfix"><h3 class="widget-title">',
		'after_title' => '</h3></div>'
	));

	register_sidebar(array(
		'name' => esc_html__('Footer Bottom Left Area', 'agami-shop'),
		'id'   => 'footer-bottom-left-area',
		'description' => esc_html__('Displays items on Left of the site info', 'agami-shop'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="at-title-action-wrapper clearfix"><h3 class="widget-title">',
		'after_title' => '</h3></div>'
	));

	register_sidebar(array(
		'name' => esc_html__('Popup Widget Area', 'agami-shop'),
		'id'   => 'popup-widget-area',
		'description' => esc_html__('Displays items on Left of the site info', 'agami-shop'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="at-title-action-wrapper clearfix"><h3 class="widget-title">',
		'after_title' => '</h3></div>'
	));

	/*Widgets*/
	register_widget( 'agami_shop_Posts_Col' );
	register_widget( 'agami_shop_About' );
	register_widget( 'agami_shop_Advanced_Image_Logo' );
	register_widget( 'agami_shop_Featured_Page' );
	register_widget( 'agami_shop_Social' );
	if ( agami_shop_is_woocommerce_active() ) :
		register_widget( 'agami_shop_Wc_Products' );
		register_widget( 'agami_shop_Advanced_Search_Widget' );
		register_widget( 'agami_shop_Wc_Feature_Cats' );
		register_widget( 'agami_shop_Wc_Cats_Tabs' );
	endif;
}
add_action('widgets_init', 'agami_shop_widget_init');

/* ajax callback for get_edit_post_link*/
add_action( 'wp_ajax_at_get_edit_post_link', 'agami_shop_get_edit_post_link' );
function agami_shop_get_edit_post_link(){
	if( isset( $_GET['id'] ) ){
		$id = absint( $_GET['id'] );
		if( get_edit_post_link( $id ) ){
			?>
			<a class="button button-link at-postid alignright" target="_blank" href="<?php echo esc_url( get_edit_post_link( $id ) ); ?>">
				<?php esc_html_e('Full Edit','agami-shop');?>
			</a>
			<?php
		}
		else{
			echo 0;
		}
		exit;
	}
}