<?php
/**
 * Theme template or template part.
 *
 * @package FastStudio_Red_Books
 */

get_header();
while ( have_posts() ) :
	the_post(); ?><article <?php post_class( 'fsb-shell fsb-content' ); ?>><h1><?php the_title(); ?></h1><div class="fsb-entry">
	<?php
	the_content();
	wp_link_pages();
	?>
</div>
	<?php
	if ( is_active_sidebar( 'faststudio-books-sidebar' ) ) :
		?>
	<aside class="fsb-section" aria-label="<?php esc_attr_e( '补充信息', 'faststudio-red-books' ); ?>"><?php dynamic_sidebar( 'faststudio-books-sidebar' ); ?></aside><?php endif; ?></article><?php endwhile;
get_footer(); ?>
