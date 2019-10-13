<?php
/**
 * Class for adding About Section Widget
 *
 * @package Agami Themes
 * @subpackage Agami Shop
 * @since 1.0.0
 */
if ( ! class_exists( 'agami_shop_About' ) ) {

	class agami_shop_About extends WP_Widget {
		/*defaults values for fields*/
		private $defaults = array(
		        'agami_shop_widget_title' => '',
                'at_all_page_items' => '',
		        'single_item_link_option' => 'disable',
		        'column_number'     => 3,
                'display_type' => 'column',
                'view_all_option' => 'disable',
                'all_link_text' => '',
                'all_link_url' => '',
                'enable_prev_next' => 1
        );

		function __construct() {
			parent::__construct(
			/*Base ID of your widget*/
				'agami_shop_about',
				/*Widget name will appear in UI*/
				esc_html__( 'AT About/Service Section', 'agami-shop' ),
				/*Widget description*/
				array( 'description' => esc_html__( 'Show Section with beautiful Icons.', 'agami-shop' ), )
			);
		}

		/*Widget Backend*/
		public function form( $instance ) {
			$instance = wp_parse_args( (array) $instance, $this->defaults );
			/*default values*/
			$agami_shop_widget_title = esc_attr( $instance['agami_shop_widget_title'] );
            $at_all_page_items = $instance['at_all_page_items'];
			$single_item_link_option = esc_attr( $instance[ 'single_item_link_option' ] );
			$column_number = absint( $instance['column_number'] );
			$display_type = esc_attr( $instance[ 'display_type' ] );
			$view_all_option = esc_attr( $instance[ 'view_all_option' ] );
			$all_link_text = esc_attr( $instance['all_link_text'] );
			$all_link_url = esc_url( $instance['all_link_url'] );
			$enable_prev_next = esc_attr( $instance['enable_prev_next'] );
			?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'agami_shop_widget_title' ) ); ?>"><?php esc_html_e( 'Title', 'agami-shop' ); ?>:</label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'agami_shop_widget_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'agami_shop_widget_title' ) ); ?>" type="text" value="<?php echo $agami_shop_widget_title; ?>"/>
            </p>

            <!--updated code-->
            <label><?php esc_html_e( 'Select Pages For About', 'agami-shop' ); ?></label>
            <br/>
            <small><?php esc_html_e( 'Add Page, Reorder and Remove. Please do not forget to add Icon and Excerpt on selected pages.', 'agami-shop' ); ?></small>
            <div class="at-repeater">
				<?php
				$total_repeater = 0;
				if  ( is_array($at_all_page_items) && count($at_all_page_items) > 0 ){
					foreach ($at_all_page_items as $about){
						$repeater_id  = $this->get_field_id( 'at_all_page_items') .$total_repeater.'page_id';
						$repeater_name  = $this->get_field_name( 'at_all_page_items' ).'['.$total_repeater.']['.'page_id'.']';
						?>
                        <div class="repeater-table">
                            <div class="at-repeater-top">
                                <div class="at-repeater-title-action">
                                    <button type="button" class="at-repeater-action">
                                        <span class="at-toggle-indicator" aria-hidden="true"></span>
                                    </button>
                                </div>
                                <div class="at-repeater-title">
                                    <h3><?php esc_html_e( 'Select Item', 'agami-shop' )?><span class="in-at-repeater-title"></span></h3>
                                </div>
                            </div>
                            <div class='at-repeater-inside hidden'>
								<?php
								/* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
								$args = array(
									'selected'         => $about['page_id'],
									'name'             => $repeater_name,
									'id'               => $repeater_id,
									'class'            => 'widefat at-select',
									'show_option_none' => esc_html__( 'Select Page', 'agami-shop'),
									'option_none_value'=> 0 // string
								);
								wp_dropdown_pages( $args );
								?>
                                <div class="at-repeater-control-actions">
                                    <button type="button" class="button-link button-link-delete at-repeater-remove"><?php esc_html_e('Remove','agami-shop');?></button> |
                                    <button type="button" class="button-link at-repeater-close"><?php esc_html_e('Close','agami-shop');?></button>
                                    <?php
                                    if( get_edit_post_link( $about['page_id'] ) ){
	                                    ?>
                                        <a class="button button-link at-postid alignright" target="_blank" href="<?php echo esc_url( get_edit_post_link( $about['page_id'] ) ); ?>">
		                                    <?php esc_html_e('Full Edit','agami-shop');?>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
						<?php
						$total_repeater = $total_repeater + 1;
					}
				}
				$coder_repeater_depth = 'coderRepeaterDepth_'.'0';
				$repeater_id  = $this->get_field_id( 'at_all_page_items') .$coder_repeater_depth.'page_id';
				$repeater_name  = $this->get_field_name( 'at_all_page_items' ).'['.$coder_repeater_depth.']['.'page_id'.']';
				?>
                <script type="text/html" class="at-code-for-repeater">
                    <div class="repeater-table">
                        <div class="at-repeater-top">
                            <div class="at-repeater-title-action">
                                <button type="button" class="at-repeater-action">
                                    <span class="at-toggle-indicator" aria-hidden="true"></span>
                                </button>
                            </div>
                            <div class="at-repeater-title">
                                <h3><?php esc_html_e( 'Select Item', 'agami-shop' )?><span class="in-at-repeater-title"></span></h3>
                            </div>
                        </div>
                        <div class='at-repeater-inside hidden'>
							<?php
							/* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
							$args = array(
								'selected'         => '',
								'name'             => $repeater_name,
								'id'               => $repeater_id,
								'class'            => 'widefat at-select',
								'show_option_none' => esc_html__( 'Select Page', 'agami-shop'),
								'option_none_value'=> 0 // string
							);
							wp_dropdown_pages( $args );
							?>
                            <div class="at-repeater-control-actions">
                                <button type="button" class="button-link button-link-delete at-repeater-remove"><?php esc_html_e('Remove','agami-shop');?></button> |
                                <button type="button" class="button-link at-repeater-close"><?php esc_html_e('Close','agami-shop');?></button>
                            </div>
                        </div>
                    </div>
                </script>
				<?php
				/*most imp for repeater*/
				echo '<input class="at-total-repeater" type="hidden" value="'.esc_attr( $total_repeater ).'">';
				$add_field = esc_html__('Add Item', 'agami-shop');
				echo '<span class="button-primary at-add-repeater" id="'.esc_attr( $coder_repeater_depth ).'">'.$add_field.'</span><br/>';
				?>
            </div>
            <!--updated code-->
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'column_number' ) ); ?>"><?php esc_html_e( 'Column Number', 'agami-shop' ); ?></label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'column_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'column_number' ) ); ?>">
					<?php
					$agami_shop_about_column_numbers = agami_shop_widget_column_number();
					foreach ( $agami_shop_about_column_numbers as $key => $value ) {
						?>
                        <option value="<?php echo esc_attr( $key ) ?>" <?php selected( $key, $column_number ); ?>><?php echo esc_attr( $value ); ?></option>
						<?php
					}
					?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'single_item_link_option' ) ); ?>">
					<?php esc_html_e( 'Single item link option', 'agami-shop' ); ?>
                </label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'single_item_link_option' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'single_item_link_option' ) ); ?>" >
					<?php
					$agami_shop_single_item_link_options = agami_shop_adv_link_options();
					foreach ( $agami_shop_single_item_link_options as $key => $value ){
						?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $single_item_link_option ); ?>><?php echo esc_attr( $value );?></option>
						<?php
					}
					?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'display_type' ) ); ?>">
					<?php esc_html_e( 'Display Type', 'agami-shop' ); ?>
                </label>
                <select class="widefat at-display-select" id="<?php echo esc_attr( $this->get_field_id( 'display_type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'display_type' ) ); ?>" >
					<?php
					$agami_shop_widget_display_types = agami_shop_widget_display_type();
					foreach ( $agami_shop_widget_display_types as $key => $value ){
						?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $display_type ); ?>><?php echo esc_attr( $value );?></option>
						<?php
					}
					?>
                </select>
            </p>
            <p class="at-enable-prev-next">
                <input id="<?php echo esc_attr( $this->get_field_id( 'enable_prev_next' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'enable_prev_next' ) ); ?>" type="checkbox" <?php checked( 1 == $enable_prev_next ? $instance['enable_prev_next'] : 0); ?> />
                <label for="<?php echo esc_attr( $this->get_field_id( 'enable_prev_next' ) ); ?>"><?php esc_html_e( 'Enable Prev - Next on Carousel Column', 'agami-shop' ); ?></label>
            </p>
            <hr /><!--view all link separate-->

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'view_all_option' ) ); ?>">
					<?php esc_html_e( 'View all options', 'agami-shop' ); ?>
                </label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'view_all_option' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'view_all_option' ) ); ?>" >
					<?php
					$agami_shop_adv_link_options = agami_shop_adv_link_options();
					foreach ( $agami_shop_adv_link_options as $key => $value ){
						?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $view_all_option ); ?>><?php echo esc_attr( $value );?></option>
						<?php
					}
					?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'all_link_text' ) ); ?>">
					<?php esc_html_e( 'All Link Text', 'agami-shop' ); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'all_link_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'all_link_text' ) ); ?>" type="text" value="<?php echo $all_link_text; ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'all_link_url' ) ); ?>">
					<?php esc_html_e( 'All Link Url', 'agami-shop' ); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'all_link_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'all_link_url' ) ); ?>" type="text" value="<?php echo $all_link_url; ?>" />
            </p>
            <hr />
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
		 *
		 * @return array
		 *
		 */
		public function update( $new_instance, $old_instance ) {
			$instance                  = $old_instance;
			$instance[ 'agami_shop_widget_title' ] = ( isset( $new_instance['agami_shop_widget_title'] ) ) ? sanitize_text_field( $new_instance['agami_shop_widget_title'] ) : '';
			/*updated code*/
			$page_ids = array();
			if( isset($new_instance['at_all_page_items'] )){
				$at_all_page_items    = $new_instance['at_all_page_items'];
				if  ( is_array($at_all_page_items) && count($at_all_page_items) > 0 ){
					foreach ($at_all_page_items as $key=>$about ){
						$page_ids[$key]['page_id'] = absint( $about['page_id'] );
					}
				}
            }
			$instance[ 'at_all_page_items' ] = $page_ids;

			$agami_shop_link_options = agami_shop_adv_link_options();
			$instance[ 'single_item_link_option' ] = agami_shop_sanitize_choice_options( $new_instance[ 'single_item_link_option' ], $agami_shop_link_options, 'disable' );

			$instance[ 'column_number' ] = absint( $new_instance['column_number'] );

			$agami_shop_widget_display_types = agami_shop_widget_display_type();
			$instance[ 'display_type' ] = agami_shop_sanitize_choice_options( $new_instance[ 'display_type' ], $agami_shop_widget_display_types, 'column' );

			$instance[ 'view_all_option' ] = agami_shop_sanitize_choice_options( $new_instance[ 'view_all_option' ], $agami_shop_link_options, 'disable' );

			$instance[ 'all_link_text' ] = sanitize_text_field( $new_instance[ 'all_link_text' ] );
			$instance[ 'all_link_url' ] = esc_url_raw( $new_instance[ 'all_link_url' ] );
			$instance[ 'enable_prev_next' ] = isset( $new_instance['enable_prev_next'] )? 1 : 0;

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
		 *
		 * @return void
		 *
		 */
		public function widget( $args, $instance ) {
			$instance = wp_parse_args( (array) $instance, $this->defaults );
			/*default values*/
			$agami_shop_widget_title = !empty( $instance['agami_shop_widget_title'] ) ? esc_attr( $instance['agami_shop_widget_title'] ) : '';
			$agami_shop_widget_title = apply_filters( 'widget_title', $agami_shop_widget_title, $instance, $this->id_base );
			$at_all_page_items = $instance['at_all_page_items'];
			$single_item_link_option = esc_attr( $instance[ 'single_item_link_option' ] );
			$column_number = absint( $instance['column_number'] );
			$display_type = esc_attr( $instance[ 'display_type' ] );
			$view_all_option = esc_attr( $instance[ 'view_all_option' ] );
			$all_link_text = esc_html( $instance[ 'all_link_text' ] );
			$all_link_url = esc_url( $instance[ 'all_link_url' ] );
			$enable_prev_next = esc_attr( $instance['enable_prev_next'] );

			$div_attr = 'class="featured-entries-col featured-entries-about '.$display_type.'"';
			if( 'carousel' == $display_type ){
				$div_attr = 'class="featured-entries-col featured-entries-about acme-slick-carausel" data-column="'.absint( $column_number ).'"';
			}

            echo $args['before_widget'];
			if ( !empty( $agami_shop_widget_title ) ||
			     'disable' != $view_all_option ||
			     ( 1 == $enable_prev_next && 'carousel' == $display_type )
			){

				echo $args['before_title'];
				echo $agami_shop_widget_title;
				echo "<span class='at-action-wrapper'>";
				if( 'disable' != $view_all_option && !empty( $all_link_text ) && !empty( $all_link_url )){
					$target ='';
					if( 'new-tab-link' == $view_all_option ){
						$target = 'target="_blank"';
					}
					echo '<a href="'.$all_link_url.'" class="all-link" '.$target.'>'.$all_link_text.'</a>';
				}

				if( 1 == $enable_prev_next && 'carousel' == $display_type){
					echo '<i class="prev fa fa-angle-left"></i><i class="next fa fa-angle-right"></i>';
				}
				echo "</span>";/*.at-action-wrapper*/

				echo $args['after_title'];

			}
			?>
            <div <?php echo $div_attr;?>>
	            <?php
	            $post_in = array();
	            if  ( is_array($at_all_page_items) && count($at_all_page_items) > 0 ){
		            foreach ( $at_all_page_items as $about ){
			            if( isset( $about['page_id'] ) && !empty( $about['page_id'] ) ){
				            $post_in[] = $about['page_id'];
			            }
		            }
	            }
	            if( !empty( $post_in )) :
                    $query_args = array(
                            'post__in'         => $post_in,
                            'orderby'             => 'post__in',
                            'posts_per_page'      => count( $post_in ),
                            'post_type'           => 'page',
                            'no_found_rows'       => true,
                            'post_status'         => 'publish'
                    );
	                $agami_shop_featured_query = new WP_Query( $query_args );
		            $agami_shop_featured_index = 1;
		            while ( $agami_shop_featured_query->have_posts() ) :$agami_shop_featured_query->the_post();
		            $agami_shop_list_classes = 'single-list';
			            if( 'carousel' != $display_type ){
				            if( 1 != $agami_shop_featured_index && $agami_shop_featured_index % $column_number == 1 ){
					            echo "<div class='clearfix'></div>";
				            }
				            if( 1 == $column_number ){
					            $agami_shop_list_classes .= " acme-col-1";
				            }
                            elseif( 2 == $column_number ){
					            $agami_shop_list_classes .= " acme-col-2";
				            }
                            elseif( 3 == $column_number ){
					            $agami_shop_list_classes .= " acme-col-3";
				            }
				            else{
					            $agami_shop_list_classes .= " acme-col-4";
				            }
			            }
			            ?>
                        <div class="<?php echo esc_attr( $agami_shop_list_classes ); ?>">
                            <div class="single-item">
                                <?php
                                if( 'disable' != $single_item_link_option ){
	                                $target ='';
	                                if( 'new-tab-link' == $single_item_link_option ){
		                                $target = 'target="_blank"';
	                                }
	                                echo '<a href="'.esc_url(get_permalink()).'" class="all-link" '.$target.'>';
                                }
                                ?>
                                    <div class="icon">
                                        <?php
                                        $agami_shop_icon = get_post_meta( get_the_ID(), 'agami-shop-featured-icon', true );
                                        $agami_shop_icon = isset( $agami_shop_icon ) ? esc_attr( $agami_shop_icon ) : '';
                                        if ( ! empty ( $agami_shop_icon ) ) { ?>
                                            <i class="fa <?php echo esc_attr( $agami_shop_icon ); ?>"></i>
                                            <?php
                                        }
                                        else {
                                            echo '<i class="fa fa-suitcase"></i>';
                                        }
                                        ?>
                                    </div>
                                    <div class="content">
                                        <h3 class="title">
                                            <?php the_title(); ?>
                                        </h3>
                                        <div class="details">
                                            <?php the_excerpt(); ?>
                                        </div>
                                    </div>
	                            <?php
	                            if( 'disable' != $single_item_link_option ){
		                            echo '</a>';
	                            }
	                            ?>
                            </div>
                        </div><!--dynamic css-->
			            <?php
			            $agami_shop_featured_index++;
		            endwhile;
		            wp_reset_postdata();
				endif;
	            ?>
            </div>
			<?php
			echo $args['after_widget'];
		}
	} // Class agami_shop_About ends here
}