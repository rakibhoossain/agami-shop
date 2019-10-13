<?php
/**
 * Custom columns of category with various options
 *
 * @package Agami Themes
 * @subpackage Agami Shop
 * @since 1.0.0
 */
if ( ! class_exists( 'agami_shop_Posts_Col' ) ) {
    /**
     * Class for adding widget
     *
     * @package Agami Themes
     * @subpackage agami_shop_Posts_Col
     * @since 1.0.0
     */
    class agami_shop_Posts_Col extends WP_Widget {

        /*defaults values for fields*/
        private $defaults = array(
	        'agami_shop_widget_title' => '',
	        'post_advanced_option' => 'recent',
	        'agami_shop_post_cat' => -1,
	        'agami_shop_post_tag' => -1,
            'post_number' => 4,
            'column_number' => 4,
            'display_type' => 'column',
            'orderby' => 'date',
            'order' => 'DESC',
	        'view_all_option' => 'disable',
	        'all_link_text' => '',
	        'all_link_url' => '',
	        'enable_prev_next' => 1,
	        'agami_shop_img_size' => 'large'
        );

        function __construct() {
            parent::__construct(
            /*Base ID of your widget*/
                'agami_shop_posts_col',
                /*Widget name will appear in UI*/
                esc_html__('AT Posts Column', 'agami-shop'),
                /*Widget description*/
                array( 'description' => esc_html__( 'Show posts from selected category with advanced options', 'agami-shop' ), )
            );
        }

        /*Widget Backend*/
        public function form( $instance ) {
            $instance = wp_parse_args( (array) $instance, $this->defaults);
	        $agami_shop_widget_title = esc_attr( $instance['agami_shop_widget_title'] );
	        $post_advanced_option = esc_attr( $instance[ 'post_advanced_option' ] );
	        $agami_shop_post_cat = esc_attr( $instance['agami_shop_post_cat'] );
	        $agami_shop_post_tag = esc_attr( $instance['agami_shop_post_tag'] );
	        $post_number = absint( $instance[ 'post_number' ] );
	        $column_number = absint( $instance[ 'column_number' ] );
	        $display_type = esc_attr( $instance[ 'display_type' ] );
	        $orderby = esc_attr( $instance[ 'orderby' ] );
	        $order = esc_attr( $instance[ 'order' ] );
	        $view_all_option = esc_attr( $instance[ 'view_all_option' ] );
	        $all_link_text = esc_attr( $instance['all_link_text'] );
	        $all_link_url = esc_url( $instance['all_link_url'] );
	        $enable_prev_next = esc_attr( $instance['enable_prev_next'] );
	        $agami_shop_img_size = esc_attr( $instance['agami_shop_img_size'] );

	        $choices = agami_shop_get_image_sizes_options();
	        ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'agami_shop_widget_title' ) ); ?>">
                    <?php esc_html_e( 'Title', 'agami-shop' ); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'agami_shop_widget_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'agami_shop_widget_title' ) ); ?>" type="text" value="<?php echo $agami_shop_widget_title; ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'post_advanced_option' ) ); ?>"><?php esc_html_e( 'Show', 'agami-shop' ); ?></label>
                <select class="widefat at-post-advanced-option" id="<?php echo esc_attr( $this->get_field_id( 'post_advanced_option' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_advanced_option' ) ); ?>" >
			        <?php
			        $post_advanced_options = agami_shop_post_advanced_options();
			        foreach ( $post_advanced_options as $key => $value ){
				        ?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $post_advanced_option ); ?>><?php echo esc_attr( $value );?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <p class="post-cat post-select">
                <label for="<?php echo esc_attr( $this->get_field_id('agami_shop_post_cat') ); ?>">
                    <?php esc_html_e('Select Category', 'agami-shop'); ?>
                </label>
                <?php
                $agami_shop_dropown_cat = array(
	                'show_option_none'   => false,
	                'orderby'            => 'name',
                    'order'              => 'asc',
                    'show_count'         => 1,
                    'hide_empty'         => 1,
                    'echo'               => 1,
                    'selected'           => $agami_shop_post_cat,
                    'hierarchical'       => 1,
                    'name'               => $this->get_field_name('agami_shop_post_cat'),
                    'id'                 => $this->get_field_id('agami_shop_post_cat'),
                    'class'              => 'widefat',
                    'taxonomy'           => 'category',
                    'hide_if_empty'      => false,
                );
                wp_dropdown_categories( $agami_shop_dropown_cat );
                ?>
            </p>
            <p class="post-tag post-select">
                <label for="<?php echo esc_attr( $this->get_field_id('agami_shop_post_tag') ); ?>">
			        <?php esc_html_e('Select Tag', 'agami-shop'); ?>
                </label>
		        <?php
		        $agami_shop_dropown_cat = array(
			        'show_option_none'   => false,
			        'orderby'            => 'name',
			        'order'              => 'asc',
			        'show_count'         => 1,
			        'hide_empty'         => 1,
			        'echo'               => 1,
			        'selected'           => $agami_shop_post_tag,
			        'hierarchical'       => 1,
			        'name'               => $this->get_field_name('agami_shop_post_tag'),
			        'id'                 => $this->get_field_name('agami_shop_post_tag'),
			        'class'              => 'widefat',
			        'taxonomy'           => 'post_tag',
			        'hide_if_empty'      => false,
		        );
		        wp_dropdown_categories( $agami_shop_dropown_cat );
		        ?>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'post_number' ) ); ?>">
			        <?php esc_html_e( 'Number of posts to show', 'agami-shop' ); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_number' ) ); ?>" type="number" value="<?php echo $post_number; ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'column_number' ) ); ?>"><?php esc_html_e( 'Column Number', 'agami-shop' ); ?></label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'column_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'column_number' ) ); ?>" >
			        <?php
			        $agami_shop_widget_column_numbers = agami_shop_widget_column_number();
			        foreach ( $agami_shop_widget_column_numbers as $key => $value ){
				        ?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $column_number ); ?>><?php echo esc_attr( $value );?></option>
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
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>">
			        <?php esc_html_e( 'Order by', 'agami-shop' ); ?>
                </label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>" >
			        <?php
			        $agami_shop_post_orderby = agami_shop_post_orderby();
			        foreach ( $agami_shop_post_orderby as $key => $value ){
				        ?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $orderby ); ?>><?php echo esc_attr( $value );?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>">
			        <?php esc_html_e( 'Order by', 'agami-shop' ); ?>
                </label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>" >
			        <?php
			        $agami_shop_post_order = agami_shop_post_order();
			        foreach ( $agami_shop_post_order as $key => $value ){
				        ?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $order ); ?>><?php echo esc_attr( $value );?></option>
				        <?php
			        }
			        ?>
                </select>
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
            <p class="at-enable-prev-next">
                <input id="<?php echo esc_attr( $this->get_field_id( 'enable_prev_next' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'enable_prev_next' ) ); ?>" type="checkbox" <?php checked( 1 == $enable_prev_next ? $instance['enable_prev_next'] : 0); ?> />
                <label for="<?php echo esc_attr( $this->get_field_id( 'enable_prev_next' ) ); ?>"><?php esc_html_e( 'Enable Prev - Next on Carousel Column', 'agami-shop' ); ?></label>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'agami_shop_img_size' ) ); ?>">
			        <?php esc_html_e( 'Normal Featured Post Image', 'agami-shop' ); ?>
                </label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'agami_shop_img_size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'agami_shop_img_size' ) ); ?>">
			        <?php
			        foreach( $choices as $key => $agami_shop_column_array ){
				        echo ' <option value="'.esc_attr( $key ).'" '.selected( $agami_shop_img_size, $key, 0). '>'.esc_attr( $agami_shop_column_array ).'</option>';
			        }
			        ?>
                </select>
            </p>
            <p>
                <small><?php esc_html_e( 'Note: Some of the features only work in "Home main content area" due to minimum width in other areas.' ,'agami-shop'); ?></small>
            </p>
            <?php
        }

        /**
         * Function to Updating widget replacing old instances with new
         *
         * @access public
         * @since 1.0.0
         *
         * @param array $new_instance new arrays value
         * @param array $old_instance old arrays value
         * @return array
         *
         */
        public function update( $new_instance, $old_instance ) {
            $instance = array();
	        $instance[ 'agami_shop_widget_title' ] = ( isset( $new_instance['agami_shop_widget_title'] ) ) ? sanitize_text_field( $new_instance['agami_shop_widget_title'] ) : '';

	        $post_advanced_options = agami_shop_post_advanced_options();
	        $instance[ 'post_advanced_option' ] = agami_shop_sanitize_choice_options( $new_instance[ 'post_advanced_option' ], $post_advanced_options, 'recent' );

	        $instance[ 'agami_shop_post_cat' ] = ( isset( $new_instance['agami_shop_post_cat'] ) ) ? absint( $new_instance['agami_shop_post_cat'] ) : '';
	        $instance[ 'agami_shop_post_tag' ] = ( isset( $new_instance['agami_shop_post_tag'] ) ) ? absint( $new_instance['agami_shop_post_tag'] ) : '';
	        $instance[ 'post_number' ] = absint( $new_instance[ 'post_number' ] );
	        $instance[ 'column_number' ] = absint( $new_instance[ 'column_number' ] );

	        $agami_shop_widget_display_types = agami_shop_widget_display_type();
	        $instance[ 'display_type' ] = agami_shop_sanitize_choice_options( $new_instance[ 'display_type' ], $agami_shop_widget_display_types, 'column' );

	        $agami_shop_post_orderby = agami_shop_post_orderby();
	        $instance[ 'orderby' ] = agami_shop_sanitize_choice_options( $new_instance[ 'orderby' ], $agami_shop_post_orderby, 'date' );

	        $agami_shop_post_order = agami_shop_post_order();
	        $instance[ 'order' ] = agami_shop_sanitize_choice_options( $new_instance[ 'order' ], $agami_shop_post_order, 'DESC' );

	        $agami_shop_link_options = agami_shop_adv_link_options();
	        $instance[ 'view_all_option' ] = agami_shop_sanitize_choice_options( $new_instance[ 'view_all_option' ], $agami_shop_link_options, 'disable' );

	        $instance[ 'all_link_text' ] = sanitize_text_field( $new_instance[ 'all_link_text' ] );
	        $instance[ 'all_link_url' ] = esc_url_raw( $new_instance[ 'all_link_url' ] );
	        $instance[ 'enable_prev_next' ] = isset($new_instance['enable_prev_next'])? 1 : 0;

	        $agami_shop_img_size = agami_shop_get_image_sizes_options();
	        $instance[ 'agami_shop_img_size' ] = agami_shop_sanitize_choice_options( $new_instance[ 'agami_shop_img_size' ], $agami_shop_img_size, 'large' );

            return $instance;
        }

        /**
         * Function to Creating widget front-end. This is where the action happens
         *
         * @access public
         * @since 1.0.0
         *
         * @param array $args widget setting
         * @param array $instance saved values
         * @return void
         *
         */
        public function widget($args, $instance) {
            $instance = wp_parse_args( (array) $instance, $this->defaults);
	        $agami_shop_post_cat = esc_attr( $instance['agami_shop_post_cat'] );
	        $agami_shop_post_tag = esc_attr( $instance['agami_shop_post_tag'] );
	        $agami_shop_widget_title = !empty( $instance['agami_shop_widget_title'] ) ? esc_attr( $instance['agami_shop_widget_title'] ) : get_cat_name($agami_shop_post_cat);
	        $agami_shop_widget_title = apply_filters( 'widget_title', $agami_shop_widget_title, $instance, $this->id_base );
	        $post_advanced_option = esc_attr( $instance[ 'post_advanced_option' ] );
	        $post_number = absint( $instance[ 'post_number' ] );
	        $column_number = absint( $instance[ 'column_number' ] );
	        $display_type = esc_attr( $instance[ 'display_type' ] );
	        $orderby = esc_attr( $instance[ 'orderby' ] );
	        $order = esc_attr( $instance[ 'order' ] );
	        $view_all_option = esc_attr( $instance[ 'view_all_option' ] );
	        $all_link_text = esc_html( $instance[ 'all_link_text' ] );
	        $all_link_url = esc_url( $instance[ 'all_link_url' ] );
	        $enable_prev_next = esc_attr( $instance['enable_prev_next'] );
	        $agami_shop_img_size = esc_attr( $instance['agami_shop_img_size'] );

            /**
             * Filter the arguments for the Recent Posts widget.
             *
             * @since 1.0.0
             *
             * @see WP_Query
             *
             */
	        $sticky = get_option( 'sticky_posts' );
	        $query_args = array(
		        'posts_per_page' => $post_number,
		        'post_status'    => 'publish',
		        'post_type'      => 'post',
		        'no_found_rows'  => 1,
		        'order'          => $order,
		        'ignore_sticky_posts' => true,
		        'post__not_in' => $sticky
	        );
	        switch ( $post_advanced_option ) {

		        case 'cat' :
			        $query_args['cat'] = $agami_shop_post_cat;
			        break;

		        case 'tag' :
			        $query_args['tag'] = $agami_shop_post_tag;
			        break;
	        }

	        switch ( $orderby ) {

                case 'ID' :
		        case 'author' :
		        case 'title' :
		        case 'date' :
		        case 'modified' :
		        case 'rand' :
		        case 'comment_count' :
		        case 'menu_order' :
			        $query_args['orderby']  = $orderby;
			        break;

		        default :
			        $query_args['orderby']  = 'date';
	        }

            $agami_shop_featured_query = new WP_Query( $query_args );

            if ($agami_shop_featured_query->have_posts()) :
                echo $args['before_widget'];
	            if ( !empty( $agami_shop_widget_title ) ||
	                 'disable' != $view_all_option ||
	                 ( 1 == $enable_prev_next && 'carousel' == $display_type )
	            ){
		            if( -1 != $agami_shop_post_cat ){
			            echo "<div class='at-cat-color-wrap-".$agami_shop_post_cat."'>";
		            }
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
		            if( -1 != $agami_shop_post_cat ){
			            echo "</div>";
		            }
	            }
	            $div_attr = 'class="featured-entries-col '.$display_type.'"';
	            if( 'carousel' == $display_type ){
		            $div_attr = 'class="featured-entries-col acme-slick-carausel" data-column="'.absint( $column_number ).'"';
	            }
                ?>
                <div <?php echo $div_attr;?>>
	                <?php
	                $agami_shop_featured_index = 1;
	                while ( $agami_shop_featured_query->have_posts() ) :$agami_shop_featured_query->the_post();
		                $thumb = $agami_shop_img_size;
		                $agami_shop_list_classes = 'single-list';
		                $agami_shop_words = 21;
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
                            <div class="post-container">
                                <div class="post-thumb">
                                    <a href="<?php the_permalink(); ?>">
			                            <?php
			                            if( has_post_thumbnail() ):
				                            the_post_thumbnail( $thumb );
			                            else:
				                            ?>
                                            <div class="no-image-widgets">
					                            <?php
					                            the_title( sprintf( '<h2 class="caption-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
					                            if( !get_the_title() ){
						                            the_date( '', sprintf( '<h2 class="caption-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
					                            }
					                            ?>
                                            </div>
				                            <?php
			                            endif;
			                            ?>
                                    </a>
                                </div><!-- .post-thumb-->
                                <div class="post-content">
                                    <div class="entry-header">
			                            <?php
			                            agami_shop_list_post_category();
                                        the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                                    </div><!-- .entry-header -->
                                    <div class="entry-content clearfix">
	                                    <?php
	                                    $excerpt = agami_shop_excerpt_words_count( absint( $agami_shop_words ) );
	                                    echo '<div class="details">'.wp_kses_post( wpautop( $excerpt ) ).'</div>';
	                                    ?>
                                    </div><!-- .entry-content -->
                                </div><!--.post-content-->
                            </div><!--.post-container-->
                        </div><!--dynamic css-->
		                <?php
		                $agami_shop_featured_index++;
	                endwhile;
	                ?>
                </div><!--featured entries-col-->
                <?php
                echo $args['after_widget'];
                echo "<div class='clearfix'></div>";
                // Reset the global $the_post as this query will have stomped on it
            endif;
	        wp_reset_postdata();
        }
    } // Class agami_shop_Posts_Col ends here
}