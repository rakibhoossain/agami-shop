<?php
/**
 * content and content wrapper end
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'agami_shop_after_content' ) ) :

    function agami_shop_after_content() {
      ?>
        </div><!-- #content -->
        </div><!-- content-wrapper-->
    <?php
    }
endif;
add_action( 'agami_shop_action_after_content', 'agami_shop_after_content', 10 );

/**
 * Footer content
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'agami_shop_footer' ) ) :

    function agami_shop_footer() {

        global $agami_shop_customizer_all_values;

        ?>
        <div class="clearfix"></div>
        <footer id="colophon" class="site-footer">
            <div class="footer-wrapper">
                <?php
                if( is_active_sidebar( 'full-width-top-footer' ) ) :
                    echo "<div class='wrapper full-width-top-footer'>";
	                dynamic_sidebar( 'full-width-top-footer' );
	                echo "</div>";
                endif;
                ?>
                <div class="top-bottom wrapper">
                    <?php
                    if(
                        is_active_sidebar('footer-top-col-one') ||
                        is_active_sidebar('footer-top-col-two') ||
                        is_active_sidebar('footer-top-col-three') ||
                        is_active_sidebar('footer-top-col-four')
                    )
                    {
                        ?>
                        <div id="footer-top">
                            <div class="footer-columns clearfix">
			                    <?php
			                    $footer_top_col = 'footer-sidebar acme-col-4';
			                    if (is_active_sidebar('footer-top-col-one')) : ?>
                                    <div class="footer-sidebar <?php echo esc_attr($footer_top_col); ?>">
					                    <?php dynamic_sidebar('footer-top-col-one'); ?>
                                    </div>
			                    <?php endif;
			                    if (is_active_sidebar('footer-top-col-two')) : ?>
                                    <div class="footer-sidebar <?php echo esc_attr($footer_top_col); ?>">
					                    <?php dynamic_sidebar('footer-top-col-two'); ?>
                                    </div>
			                    <?php endif;
			                    if (is_active_sidebar('footer-top-col-three')) : ?>
                                    <div class="footer-sidebar <?php echo esc_attr($footer_top_col); ?>">
					                    <?php dynamic_sidebar('footer-top-col-three'); ?>
                                    </div>
			                    <?php endif;
			                    if (is_active_sidebar('footer-top-col-four')) : ?>
                                    <div class="footer-sidebar <?php echo esc_attr($footer_top_col); ?>">
					                    <?php dynamic_sidebar('footer-top-col-four'); ?>
                                    </div>
			                    <?php endif; ?>
                            </div>
                        </div><!-- #foter-top -->
                        <?php
                    }
                    if(
                        is_active_sidebar('footer-bottom-col-one') ||
                        is_active_sidebar('footer-bottom-col-two')
                    )
                    {
                        ?>
                        <div id="footer-bottom">
                            <div class="footer-columns clearfix">
                                <?php
			                    $footer_bottom_col = 'footer-sidebar acme-col-2';
			                    if (is_active_sidebar('footer-bottom-col-one')) : ?>
                                    <div class="footer-sidebar <?php echo esc_attr($footer_bottom_col); ?>">
					                    <?php dynamic_sidebar('footer-bottom-col-one'); ?>
                                    </div>
			                    <?php endif;
			                    if (is_active_sidebar('footer-bottom-col-two')) : ?>
                                    <div class="footer-sidebar float-right <?php echo esc_attr($footer_bottom_col); ?>">
					                    <?php dynamic_sidebar('footer-bottom-col-two'); ?>
                                    </div>
			                    <?php
                                endif;
                                ?>
                            </div>
                        </div>
                        <?php
                    }
	                if( is_active_sidebar( 'full-width-bottom-footer' ) ) :
		                echo "<div class='wrapper full-width-bottom-footer'>";
		                dynamic_sidebar( 'full-width-bottom-footer' );
		                echo "</div>";
	                endif;
	                ?>
                    <div class="clearfix"></div>
                </div><!-- top-bottom-->
                <div class="footer-copyright">
                    <div class="wrapper">
	                    <?php
	                    if( is_active_sidebar( 'footer-bottom-left-area' ) ) :
                            ?>
                            <div class="site-info-left">
                                <?php
                                dynamic_sidebar( 'footer-bottom-left-area' );
                                ?>
                            </div>
                        <?php
	                    endif;
	                    ?>
                        <div class="site-info">
                            <span>
		                        <?php if( isset( $agami_shop_customizer_all_values['agami-shop-footer-copyright'] ) ): ?>
			                        <?php echo wp_kses_post( $agami_shop_customizer_all_values['agami-shop-footer-copyright'] ); ?>
		                        <?php endif; ?>
                            </span>
                            <?php
                            if( 1 == $agami_shop_customizer_all_values['agami-shop-enable-footer-power-text'] ){
	                            echo '<span>';
	                            printf( esc_html__( '%1$s by %2$s', 'agami-shop' ), 'Agami Shop', '<a href="http://www.agamithemes.com/" rel="designer">Agami Themes</a>' );
	                            echo '</span><!-- .site-info -->';
                            }
                            ?>
                        </div><!-- .site-info -->
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div><!-- footer-wrapper-->
        </footer><!-- #colophon -->
    <?php
    }
endif;
add_action( 'agami_shop_action_footer', 'agami_shop_footer', 10 );

/**
 * Page end
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'agami_shop_page_end' ) ) :

    function agami_shop_page_end() {
	    global $agami_shop_customizer_all_values;
	    $agami_shop_top_right_button_options = $agami_shop_customizer_all_values['agami-shop-top-right-button-options'];
	    $agami_shop_popup_widget_title = $agami_shop_customizer_all_values['agami-shop-popup-widget-title'];

	    if( 'widget' == $agami_shop_top_right_button_options ){
		    ?>
            <!-- Modal -->
            <div id="at-widget-modal" class="modal fade">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content" id="at-widget-modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
						    <?php
						    if( !empty( $agami_shop_popup_widget_title ) ){
							    ?>
                                <h4 class="modal-title"><?php echo esc_html( $agami_shop_popup_widget_title ); ?></h4>
							    <?php
						    }
						    ?>
                        </div>
                        <?php
                        if( is_active_sidebar( 'popup-widget-area' ) ) :
                            echo "<div class='modal-body'>";
	                        dynamic_sidebar( 'popup-widget-area' );
	                        echo "</div>";
                        endif;
                        ?>
                    </div><!--.modal-content-->
                </div>
            </div><!--#at-shortcode-bootstrap-modal-->
		    <?php
	    }
        ?>
        </div><!-- #page -->
    <?php
    }
endif;
add_action( 'agami_shop_action_after', 'agami_shop_page_end', 10 );