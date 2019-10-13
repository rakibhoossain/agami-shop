<?php
/**
 * Display Basic Info
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('agami_shop_basic_info') ) :

	function agami_shop_basic_info( ) {
		global $agami_shop_customizer_all_values;
		$agami_shop_basic_info_data = array();

		$agami_shop_first_info_icon = $agami_shop_customizer_all_values['agami-shop-first-info-icon'] ;
		$agami_shop_first_info_title = $agami_shop_customizer_all_values['agami-shop-first-info-title'];
		$agami_shop_first_info_link = $agami_shop_customizer_all_values['agami-shop-first-info-link'];
		$agami_shop_basic_info_data[] = array(
			"icon" => $agami_shop_first_info_icon,
			"title" => $agami_shop_first_info_title,
			"link" => $agami_shop_first_info_link
		);

		$agami_shop_second_info_icon = $agami_shop_customizer_all_values['agami-shop-second-info-icon'] ;
		$agami_shop_second_info_title = $agami_shop_customizer_all_values['agami-shop-second-info-title'];
		$agami_shop_second_info_link = $agami_shop_customizer_all_values['agami-shop-second-info-link'];
		$agami_shop_basic_info_data[] = array(
			"icon" => $agami_shop_second_info_icon,
			"title" => $agami_shop_second_info_title,
			"link" => $agami_shop_second_info_link
		);

		$agami_shop_third_info_icon = $agami_shop_customizer_all_values['agami-shop-third-info-icon'] ;
		$agami_shop_third_info_title = $agami_shop_customizer_all_values['agami-shop-third-info-title'];
		$agami_shop_third_info_link = $agami_shop_customizer_all_values['agami-shop-third-info-link'];
		$agami_shop_basic_info_data[] = array(
			"icon" => $agami_shop_third_info_icon,
			"title" => $agami_shop_third_info_title,
			"link" => $agami_shop_third_info_link
		);

		$agami_shop_forth_info_icon = $agami_shop_customizer_all_values['agami-shop-forth-info-icon'] ;
		$agami_shop_forth_info_title = $agami_shop_customizer_all_values['agami-shop-forth-info-title'];
		$agami_shop_forth_info_link = $agami_shop_customizer_all_values['agami-shop-forth-info-link'];
		$agami_shop_basic_info_data[] = array(
			"icon" => $agami_shop_forth_info_icon,
			"title" => $agami_shop_forth_info_title,
			"link" => $agami_shop_forth_info_link
		);

		$column = count( $agami_shop_basic_info_data );
		if( $column == 1 ){
			$col= "col-md-12";
		}
        elseif( $column == 2 ){
			$col= "col-md-6";
		}
        elseif( $column == 3 ){
			$col= "col-md-4";
		}
		else{
			$col= "col-md-3";
		}
		$i = 0;
		$number = $agami_shop_customizer_all_values['agami-shop-header-bi-number'];

		echo "<div class='icon-box'>";
		foreach ( $agami_shop_basic_info_data as $base_basic_info_data) {
			if( $i >= $number ){
				break;
			}
			?>
            <div class="icon-box <?php echo esc_attr( $col );?>">
				<?php
				if( !empty( $base_basic_info_data['icon'])){
					?>
                    <div class="icon">
                        <i class="fa <?php echo esc_attr( $base_basic_info_data['icon'] );?>"></i>
                    </div>
					<?php
				}
				if( !empty( $base_basic_info_data['title'] ) ){
					?>
                    <div class="icon-details">
						<?php
						if( !empty( $base_basic_info_data['title']) ){
							if( !empty( $base_basic_info_data['link'])){
								echo '<a href="'.esc_url( $base_basic_info_data['link'] ).'">'.'<span class="icon-text">'.esc_html( $base_basic_info_data['title'] ).'</span>'.'</a>';
                            }
                            else{
	                            echo '<span class="icon-text">'.esc_html( $base_basic_info_data['title'] ).'</span>';
                            }
						}
						?>
                    </div>
					<?php
				}
				?>
            </div>
			<?php
			$i++;
		}
		echo "</div>";
	}
endif;
add_action( 'agami_shop_action_basic_info', 'agami_shop_basic_info', 10, 2 );

/**
 * Display Social Links
 *
 * @since Agami Shop 1.0.0
 *
 * @param null
 * @return void
 *
 */

if ( !function_exists('agami_shop_social_links') ) :

	function agami_shop_social_links( ) {

		global $agami_shop_customizer_all_values;
		$agami_shop_social_data = json_decode( $agami_shop_customizer_all_values['agami-shop-social-data'] );
		if( is_array( $agami_shop_social_data )){
			foreach ( $agami_shop_social_data as $social_data ){
				$icon = $social_data->icon;
				$link = $social_data->link;
				$checkbox = $social_data->checkbox;
				echo '<div class="icon-box">';
				echo '<a href="'.esc_url( $link ).'" target="'.($checkbox == 1? '_blank':'').'">';
				echo '<i class="fa '.esc_attr( $icon ).'"></i>';
				echo '</a>';
				echo '</div>';
			}
		}
	}
endif;
add_action( 'agami_shop_action_social_links', 'agami_shop_social_links', 10 );

if ( !function_exists('agami_shop_top_menu') ) :

	function agami_shop_top_menu( ) {
		echo "<div class='at-first-level-nav at-display-inline-block'>";
		wp_nav_menu(
			array(
				'theme_location' => 'top-menu',
				'container' => false,
				'depth' => 1
			)
		);
		echo "</div>";
	}
endif;
add_action( 'agami_shop_action_top_menu', 'agami_shop_top_menu', 10 );