<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Agami Themes
 * @subpackage Agami Shop
 */
global $agami_shop_customizer_all_values;
$agami_shop_blog_no_image = '';
$agami_shop_single_image_layout = $agami_shop_customizer_all_values['agami-shop-single-img-size'];
if( !has_post_thumbnail() || 'disable' == $agami_shop_single_image_layout) {
	$agami_shop_blog_no_image = 'blog-no-image';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $agami_shop_blog_no_image ); ?>>
	<!--post thumbnal options-->
	<?php if( has_post_thumbnail( ) && 'disable' != $agami_shop_single_image_layout ) {
		?>
		<div class="post-thumb">
			<?php
			the_post_thumbnail( $agami_shop_single_image_layout );
            ?>
		</div><!-- .post-thumb-->
	<?php
	}
	?>
	<div class="post-content">
		<header class="entry-header">
			<?php
			agami_shop_list_post_category();
			the_title( '<h1 class="entry-title">', '</h1>' );
			?>
			<div class="entry-meta">
				<?php
                if ( 'post' === get_post_type() ) :
                    agami_shop_posted_on();
				endif;
				agami_shop_entry_footer( 1 );
				?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->
		<div class="entry-content clearfix">
			<?php
            the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'agami-shop' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->