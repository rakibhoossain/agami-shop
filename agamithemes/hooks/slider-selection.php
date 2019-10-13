<?php
/**
 * Display default slider
 *
 * @since Agami Shop 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('agami_shop_default_featured') ) :
    function agami_shop_default_featured(){
        ?>
        <div class="acme-col-2" style="background-image: url('<?php echo esc_url( get_template_directory_uri()."/assets/img/default-image.jpg" ); ?>')">

        </div>
        <div class="acme-col-2" style="background-image: url('<?php echo esc_url( get_template_directory_uri()."/assets/img/default-image.jpg" ); ?>')">

        </div>
        <div class="clearfix"></div>
        <div class="acme-col-3" style="background-image: url('<?php echo esc_url( get_template_directory_uri()."/assets/img/default-image.jpg" ); ?>')">

        </div>
        <div class="acme-col-3" style="background-image: url('<?php echo esc_url( get_template_directory_uri()."/assets/img/default-image.jpg" ); ?>')">

        </div>
        <div class="acme-col-3" style="background-image: url('<?php echo esc_url( get_template_directory_uri()."/assets/img/default-image.jpg" ); ?>')">

        </div>
        <?php
    }
endif;

/**
 * Display related posts from same category
 *
 * @since Agami Shop 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('agami_shop_feature_slider') ) :
    function agami_shop_feature_slider() {
	    global $agami_shop_customizer_all_values;
	    $agami_shop_feature_content_options = $agami_shop_customizer_all_values['agami-shop-feature-content-options'];
	    $agami_shop_feature_right_content_options = $agami_shop_customizer_all_values['agami-shop-feature-right-content-options'];
	    $agami_shop_fs_image_display_options = $agami_shop_customizer_all_values['agami-shop-fs-image-display-options'];
	    $slider_full = '';
	    if( 'disable' == $agami_shop_feature_right_content_options ){
	        $slider_full = 'full-width';
        }
	    if( 'disable' == $agami_shop_feature_content_options ){
		    $slider_full = 'full-width-right';
        }
	    ?>
        <div class="clearfix"></div>
        <div class="wrapper">
            <div class="slider-feature-wrap <?php echo esc_attr( $slider_full ); ?> clearfix <?php echo esc_attr( $agami_shop_fs_image_display_options );?>">
	            <?php
	            if( is_active_sidebar( 'agami-shop-before-feature' ) ) :
		            ?>
                    <div class="agami-shop-before-feature">
			            <?php
			            dynamic_sidebar( 'agami-shop-before-feature' );
			            ?>
                    </div>
		            <?php
	            endif;
		        if( 'disable' != $agami_shop_feature_content_options ){
			        ?>
                    <div class="slider-section">
				        <?php
				        $agami_shop_feature_slider_display_arrow = $agami_shop_customizer_all_values['agami-shop-feature-slider-display-arrow'];
				        $agami_shop_feature_slider_enable_autoplay = $agami_shop_customizer_all_values['agami-shop-feature-slider-enable-autoplay'];
				        if( 1 ==$agami_shop_feature_slider_display_arrow ){
					        echo "<span class='at-action-wrapper'>";
					        echo '<i class="prev fa fa-angle-left"></i><i class="next fa fa-angle-right"></i>';
					        echo "</span>";/*.at-action-wrapper*/
				        }
				        ?>
                        <div class="featured-slider at-feature-section"
                             data-autoplay="<?php echo esc_attr( $agami_shop_feature_slider_enable_autoplay );?>"
                             data-arrows="<?php echo esc_attr( $agami_shop_feature_slider_display_arrow );?>"
                        >
					        <?php
					        $agami_shop_feature_post_number = $agami_shop_customizer_all_values['agami-shop-feature-post-number'];
					        $agami_shop_feature_slider_display_cat = $agami_shop_customizer_all_values['agami-shop-feature-slider-display-cat'];
					        $agami_shop_feature_slider_display_title = $agami_shop_customizer_all_values['agami-shop-feature-slider-display-title'];
					        $agami_shop_feature_slider_display_excerpt = $agami_shop_customizer_all_values['agami-shop-feature-slider-display-excerpt'];

					        $sticky = get_option( 'sticky_posts' );

					        if( 'product' == $agami_shop_feature_content_options && agami_shop_is_woocommerce_active() ){
						        $agami_shop_feature_product_cat = $agami_shop_customizer_all_values['agami-shop-feature-product-cat'];
						        $query_args = array(
							        'posts_per_page' => $agami_shop_feature_post_number,
							        'post_status'    => 'publish',
							        'post_type'      => 'product',
							        'no_found_rows'  => 1,
							        'meta_query'     => array(),
							        'tax_query'      => array(
								        'relation' => 'AND',
							        )
						        );
						        if( 0 != $agami_shop_feature_product_cat ){
							        $query_args['tax_query'][] = array(
								        'taxonomy' => 'product_cat',
								        'field'    => 'term_id',
								        'terms'    => $agami_shop_feature_product_cat,
							        );
						        }
					        }
					        else{
						        $agami_shop_feature_post_cat = $agami_shop_customizer_all_values['agami-shop-feature-post-cat'];
						        $query_args = array(
							        'posts_per_page'      => $agami_shop_feature_post_number,
							        'no_found_rows'       => true,
							        'post_status'         => 'publish',
							        'ignore_sticky_posts' => true,
							        'post__not_in' => $sticky
						        );
						        if( 0 != $agami_shop_feature_post_cat ){
							        $query_args['cat'] = $agami_shop_feature_post_cat;
						        }
					        }

					        $slider_query = new WP_Query( $query_args );

					        if ( $slider_query->have_posts() ):
						        while ($slider_query->have_posts()): $slider_query->the_post();
							        if (has_post_thumbnail()) {
								        $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
							        }
							        else {
								        $image_url[0] = get_template_directory_uri() . '/assets/img/default-image.jpg';
							        }
							        $bg_image_style = '';
							        if( 'full-screen-bg' == $agami_shop_fs_image_display_options ){
								        $bg_image_style = 'background-image:url(' . esc_url( $image_url[0] ) . ');background-repeat:no-repeat;background-size:cover;background-position:center;';
							        }
							        ?>
                                    <div class="no-media-query at-slide-unit acme-col-1" style="<?php echo esc_attr( $bg_image_style ); ?>">
								        <?php
								        if( 'responsive-img' == $agami_shop_fs_image_display_options ){
									        echo '<img src="'.esc_url( $image_url[0] ).'"/>';
								        }
								        ?>
                                        <a class="at-overlay" href="<?php the_permalink()?>"></a>
                                        <div class="slider-desc">
									        <?php
									        if( 1 == $agami_shop_feature_slider_display_cat ){
										        ?>
                                                <div class="above-slider-details">
											        <?php
											        if( 'product' == $agami_shop_feature_content_options && agami_shop_is_woocommerce_active() ){
												        agami_shop_list_product_category();
											        }
											        else{
												        agami_shop_list_post_category();
											        }
											        ?>
                                                </div>
										        <?php
									        }
									        if( 1 == $agami_shop_feature_slider_display_title || 1 == $agami_shop_feature_slider_display_excerpt ){
										        ?>
                                                <div class="slider-details">
											        <?php
											        if( 1 == $agami_shop_feature_slider_display_title ){
												        ?>
                                                        <div class="slide-title">
                                                            <a href="<?php the_permalink()?>">
														        <?php the_title(); ?>
                                                            </a>
                                                        </div>
												        <?php
											        }
											        if( 1 == $agami_shop_feature_slider_display_excerpt ){
												        ?>
                                                        <div class="slide-desc">
													        <?php the_excerpt();?>
                                                        </div>
												        <?php
											        }
											        ?>
                                                </div>
										        <?php
									        }
									        $agami_shop_feature_button_text = $agami_shop_customizer_all_values['agami-shop-feature-button-text'];
									        if( !empty( $agami_shop_feature_button_text )){
										        ?>
                                                <div class="slider-buttons">
                                                    <a href="<?php the_permalink()?>" class="slider-button primary">
												        <?php
												        if( ( agami_shop_is_woocommerce_active() && 'product' == $agami_shop_feature_content_options ) || 'post' == $agami_shop_feature_content_options ){
													        echo esc_html( $agami_shop_feature_button_text );
												        }
												        ?>
                                                    </a>
                                                </div>
										        <?php
									        }
									        ?>
                                        </div>
                                    </div>
							        <?php
						        endwhile;
					        else:
						        agami_shop_default_featured();
					        endif;
					        wp_reset_postdata();
					        ?>
                        </div>
                    </div>
			        <?php
		        }
		        if( 'disable' != $agami_shop_feature_right_content_options ){
			        $agami_shop_fs_right_image_display_options = $agami_shop_customizer_all_values['agami-shop-feature-right-image-display-options'];
			        ?>
                    <div class="beside-slider <?php echo esc_attr( $agami_shop_fs_right_image_display_options ); ?>">
				        <?php
				        $agami_shop_feature_slider_right_display_arrow = $agami_shop_customizer_all_values['agami-shop-feature-right-display-arrow'];
				        $agami_shop_feature_slider_right_enable_autoplay = $agami_shop_customizer_all_values['agami-shop-feature-right-enable-autoplay'];

				        if( 1 == $agami_shop_feature_slider_right_display_arrow ){
					        echo "<span class='at-action-wrapper'>";
					        echo '<i class="prev fa fa-angle-left"></i><i class="next fa fa-angle-right"></i>';
					        echo "</span>";/*.at-action-wrapper*/
				        }
				        ?>
                        <div class="fs-right-slider"
                             data-autoplay="<?php echo esc_attr( $agami_shop_feature_slider_right_enable_autoplay);?>"
                             data-arrows="<?php echo esc_attr( $agami_shop_feature_slider_right_display_arrow );?>"
                        >
					        <?php
					        $agami_shop_feature_right_post_cat = $agami_shop_customizer_all_values['agami-shop-feature-right-post-cat'];
					        $agami_shop_feature_right_product_cat = $agami_shop_customizer_all_values['agami-shop-feature-right-product-cat'];
					        $agami_shop_feature_right_post_number = $agami_shop_customizer_all_values['agami-shop-feature-right-post-number'];
					        $agami_shop_feature_right_display_title = $agami_shop_customizer_all_values['agami-shop-feature-right-display-title'];
					        $agami_shop_feature_right_button_text = $agami_shop_customizer_all_values['agami-shop-feature-right-button-text'];

					        $sticky = get_option( 'sticky_posts' );

					        if( 'product' == $agami_shop_feature_right_content_options && agami_shop_is_woocommerce_active() ){
						        $query_args = array(
							        'posts_per_page' => $agami_shop_feature_right_post_number,
							        'post_status'    => 'publish',
							        'post_type'      => 'product',
							        'no_found_rows'  => 1,
							        'meta_query'     => array(),
							        'tax_query'      => array(
								        'relation' => 'AND',
							        )
						        );
						        if( 0 != $agami_shop_feature_right_product_cat ){
							        $query_args['tax_query'][] = array(
								        'taxonomy' => 'product_cat',
								        'field'    => 'term_id',
								        'terms'    => $agami_shop_feature_right_product_cat,
							        );
						        }
					        }
					        else{
						        $query_args = array(
							        'posts_per_page'      => $agami_shop_feature_right_post_number,
							        'no_found_rows'       => true,
							        'post_status'         => 'publish',
							        'ignore_sticky_posts' => true,
							        'post__not_in' => $sticky
						        );
						        if( 0 != $agami_shop_feature_right_post_cat ){
							        $query_args['cat'] = $agami_shop_feature_right_post_cat;
						        }
					        }

					        $slider_query = new WP_Query( $query_args );
					        while ( $slider_query->have_posts() ): $slider_query->the_post();
						        if (has_post_thumbnail()) {
							        $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
						        } else {
							        $image_url[0] = get_template_directory_uri() . '/assets/img/default-image.jpg';
						        }
						        $bg_image_style = '';
						        if( 'full-screen-bg' == $agami_shop_fs_right_image_display_options ){
							        $bg_image_style = 'background-image:url(' . esc_url( $image_url[0] ) . ');background-repeat:no-repeat;background-size:cover;background-position:center;';
						        }
						        ?>
                                <div class="no-media-query at-beside-slider-unit" style="<?php echo esc_attr( $bg_image_style ); ?>">
							        <?php
							        if( 'responsive-img' == $agami_shop_fs_right_image_display_options ){
								        echo '<img src="'.esc_url( $image_url[0] ).'"/>';
							        }
							        ?>
                                    <a class="at-overlay" href="<?php the_permalink()?>"></a>
                                    <div class="beside-slider-desc">
                                        <div class="beside-slider-content-wrapper">
									        <?php
									        if( 1 == $agami_shop_feature_right_display_title ){
										        ?>
                                                <div class="slider-details">
                                                    <div class="slide-title">
                                                        <a href="<?php the_permalink()?>">
													        <?php the_title(); ?>
                                                        </a>
                                                    </div>
                                                </div>
										        <?php
									        }
									        if( !empty( $agami_shop_feature_right_button_text ) && ( ( agami_shop_is_woocommerce_active() && 'product' == $agami_shop_feature_right_content_options ) || 'post' == $agami_shop_feature_right_content_options )){
										        ?>
                                                <div class="slider-buttons">
                                                    <a href="<?php the_permalink()?>" class="slider-button primary">
												        <?php
												        echo esc_html( $agami_shop_feature_right_button_text );
												        ?>
                                                    </a>
                                                </div>
										        <?php
									        }
									        ?>
                                        </div>
                                    </div>
                                </div>
						        <?php
					        endwhile;
					        wp_reset_postdata();
					        ?>
                        </div><!--.fs-right-slider-->
                    </div><!--beside-slider-->
			        <?php
		        }
		        ?>
            </div><!--slider-feature-wrap-->
        </div>
        <div class="clearfix"></div>
        <?php
    }
endif;
add_action( 'agami_shop_action_feature_slider', 'agami_shop_feature_slider', 0 );