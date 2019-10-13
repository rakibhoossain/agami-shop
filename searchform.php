<?php
/**
 * Custom Searchform
 *
 * @package Agami Themes
 * @subpackage Agami Shop
 */
?>
<div class="search-block">
    <form action="<?php echo esc_url( home_url() );?>" class="searchform" id="searchform" method="get" role="search">
        <div>
            <label for="menu-search" class="screen-reader-text"></label>
            <?php
            global $agami_shop_customizer_all_values;
            $placeholder_text = '';
            if ( isset( $agami_shop_customizer_all_values['agami-shop-search-placeholder']) ):
                $placeholder_text = ' placeholder="' . esc_attr( $agami_shop_customizer_all_values['agami-shop-search-placeholder'] ). '" ';
            endif; ?>
            <input type="text" <?php echo  $placeholder_text ;?> id="menu-search" name="s" value="<?php echo get_search_query();?>">
            <button class="fa fa-search" type="submit" id="searchsubmit"></button>
        </div>
    </form>
</div>