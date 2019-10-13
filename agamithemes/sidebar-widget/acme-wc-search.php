<?php
/**
 * Custom advertisement
 *
 * @package Agami Themes
 * @subpackage Agami Shop
 * @since 1.0.0
 */
if ( ! class_exists( 'agami_shop_Advanced_Search_Widget' ) ) :
	/**
	 * Class for adding advertisement widget
	 * A new way to add advertisement
	 * @package Agami Themes
	 * @subpackage Agami Shop
	 * @since 1.0.0
	 */
	class agami_shop_Advanced_Search_Widget extends WP_Widget {
		function __construct() {
			parent::__construct(
			/*Base ID of your widget*/
				'agami_shop_advanced_search',
				/*Widget name will appear in UI*/
				esc_html__('AT Advanced WooCommerce Search', 'agami-shop'),
				/*Widget description*/
				array( 'description' => esc_html__( 'Add Advanced WooCommerce Search Widget', 'agami-shop' ), )
			);
		}

		/*defaults values for fields*/
		private $defaults = array(
			'agami_shop_search_placeholder'  => ''
		);

		public function form( $instance ) {
			/*merging arrays*/
			$instance = wp_parse_args( (array) $instance, $this->defaults);
			$agami_shop_search_placeholder = esc_attr( $instance['agami_shop_search_placeholder'] );
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'agami_shop_search_placeholder' ) ); ?>"><?php esc_html_e( 'Placeholder Text', 'agami-shop' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'agami_shop_search_placeholder' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'agami_shop_search_placeholder' ) ); ?>" type="text" value="<?php echo esc_attr( $agami_shop_search_placeholder ); ?>" />
			</p>
			<?php
		}

		/**
		 * Function to Updating widget replacing old instances with new
		 *
		 * @access public
		 * @since 1.0
		 *
		 * @param array $new_instance new arrays value
		 * @param array $old_instance old arrays value
		 * @return array
		 *
		 */
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['agami_shop_search_placeholder'] = ( isset( $new_instance['agami_shop_search_placeholder'] ) ) ?  sanitize_text_field( $new_instance['agami_shop_search_placeholder'] ): '';

			return $instance;
		}

		/**
		 * Function to Creating widget front-end. This is where the action happens
		 *
		 * @access public
		 * @since 1.0
		 *
		 * @param array $args widget setting
		 * @param array $instance saved values
		 * @return void
		 *
		 */
		function widget( $args, $instance ) {
			$instance = wp_parse_args( (array) $instance, $this->defaults);
			global $agami_shop_search_placeholder;
			$agami_shop_search_placeholder = esc_attr( $instance['agami_shop_search_placeholder'] );
			echo $args['before_widget'];
			if ( agami_shop_is_woocommerce_active() ) :
				get_template_part( 'template-parts/product-search' );
			else :
				get_search_form();
			endif;
			echo $args['after_widget'];
		}
	}
endif;