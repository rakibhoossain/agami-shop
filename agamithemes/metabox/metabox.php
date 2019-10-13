<?php
/**
 * Agami Shop sidebar layout options
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('agami_shop_sidebar_layout_options') ) :
    function agami_shop_sidebar_layout_options() {
        $agami_shop_sidebar_layout_options = array(
	        'default-sidebar' => array(
		        'value'     => 'default-sidebar',
		        'thumbnail' => get_template_directory_uri() . '/agamithemes/images/default-sidebar.png'
	        ),
	        'left-sidebar' => array(
		        'value'     => 'left-sidebar',
		        'thumbnail' => get_template_directory_uri() . '/agamithemes/images/left-sidebar.png'
	        ),
	        'right-sidebar' => array(
		        'value' => 'right-sidebar',
		        'thumbnail' => get_template_directory_uri() . '/agamithemes/images/right-sidebar.png'
	        ),
	        'both-sidebar' => array(
		        'value'     => 'both-sidebar',
		        'thumbnail' => get_template_directory_uri() . '/agamithemes/images/both-sidebar.png'
	        ),
	        'middle-col' => array(
		        'value'     => 'middle-col',
		        'thumbnail' => get_template_directory_uri() . '/agamithemes/images/middle-col.png'
	        ),
	        'no-sidebar' => array(
		        'value'     => 'no-sidebar',
		        'thumbnail' => get_template_directory_uri() . '/agamithemes/images/no-sidebar.png'
	        )
        );
        return apply_filters( 'agami_shop_sidebar_layout_options', $agami_shop_sidebar_layout_options );
    }
endif;

/**
 * Custom Metabox
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return void
 *
 */
if( !function_exists( 'agami_shop_add_metabox' )):
    function agami_shop_add_metabox() {
        add_meta_box(
            'agami_shop_sidebar_layout', // $id
            esc_html__( 'Sidebar Layout', 'agami-shop' ), // $title
            'agami_shop_sidebar_layout_callback', // $callback
            'post', // $page
            'normal', // $context
            'high'
        ); // $priority

        add_meta_box(
            'agami_shop_sidebar_layout', // $id
            esc_html__( 'Sidebar Layout', 'agami-shop' ), // $title
            'agami_shop_sidebar_layout_callback', // $callback
            'page', // $page
            'normal', // $context
            'high'
        ); // $priority

	    add_meta_box(
		    'agami_shop_sidebar_layout', // $id
		    esc_html__( 'Sidebar Layout', 'agami-shop' ), // $title
		    'agami_shop_sidebar_layout_callback', // $callback
		    'product', // $page
		    'normal', // $context
		    'high'
	    ); // $priority
    }
endif;
add_action('add_meta_boxes', 'agami_shop_add_metabox');

/**
 * Callback function for metabox
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('agami_shop_sidebar_layout_callback') ) :
    function agami_shop_sidebar_layout_callback(){
        global $post;
        $agami_shop_sidebar_layout_options = agami_shop_sidebar_layout_options();
        $agami_shop_sidebar_layout = 'default-sidebar';
        $agami_shop_sidebar_meta_layout = get_post_meta( $post->ID, 'agami_shop_sidebar_layout', true );
        if( !agami_shop_is_null_or_empty($agami_shop_sidebar_meta_layout) ){
            $agami_shop_sidebar_layout = $agami_shop_sidebar_meta_layout;
        }
        wp_nonce_field( basename( __FILE__ ), 'agami_shop_sidebar_layout_nonce' );
        ?>
        <table class="form-table page-meta-box">
            <tr>
                <td colspan="4"><h4><?php esc_html_e( 'Choose Sidebar Template', 'agami-shop' ); ?></h4></td>
            </tr>
            <tr>
                <td>
                    <?php
                    foreach ( $agami_shop_sidebar_layout_options as $field ) {
                        ?>
                        <div class="hide-radio radio-image-wrapper">
                            <input id="<?php echo esc_attr( $field['value'] ); ?>" type="radio" name="agami_shop_sidebar_layout" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $agami_shop_sidebar_layout ); ?> />
                            <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                                <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" />
                            </label>
                        </div>
                    <?php } // end foreach
                    ?>
                    <div class="clear"></div>
                </td>
            </tr>
            <tr>
                <td><em class="f13"><?php esc_html_e( 'You can set up the sidebar content', 'agami-shop' ); ?> <a href="<?php echo esc_url( admin_url('/widgets.php') ); ?>"><?php esc_html_e( 'here', 'agami-shop' ); ?></a></em></td>
            </tr>
        </table>
        <?php
    }
endif;

/**
 * save the custom metabox data
 * @hooked to save_post hook
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('agami_shop_save_sidebar_layout') ) :
    function agami_shop_save_sidebar_layout( $post_id ) {

        // Verify the nonce before proceeding.
        if ( !isset( $_POST[ 'agami_shop_sidebar_layout_nonce' ] ) || !wp_verify_nonce( $_POST[ 'agami_shop_sidebar_layout_nonce' ], basename( __FILE__ ) ) )
            return;

        // Stop WP from clearing custom fields on autosave
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)
            return;

        if ('page' == $_POST['post_type']) {
            if (!current_user_can( 'edit_page', $post_id ) )
                return $post_id;
        } elseif (!current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }

        //Execute this saving function
        if(isset($_POST['agami_shop_sidebar_layout'])){
            $old = get_post_meta( $post_id, 'agami_shop_sidebar_layout', true);
            $new = sanitize_text_field($_POST['agami_shop_sidebar_layout']);
            if ($new && $new != $old) {
                update_post_meta($post_id, 'agami_shop_sidebar_layout', $new);
            } elseif ('' == $new && $old) {
                delete_post_meta($post_id,'agami_shop_sidebar_layout', $old);
            }
        }
    }
endif;
add_action('save_post', 'agami_shop_save_sidebar_layout');