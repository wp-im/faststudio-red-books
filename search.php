<?php
/**
 * Theme template or template part.
 *
 * @package FastStudio_Red_Books
 */

get_header(); ?><section class="fsb-shell fsb-content fsb-content--wide"><p class="fsb-eyebrow"><?php esc_html_e( 'Search', 'faststudio-red-books' ); ?></p><h1>
<?php
/* translators: %s: the search query. */
printf( esc_html__( 'Results for: %s', 'faststudio-red-books' ), esc_html( get_search_query() ) );
?>
</h1><?php get_search_form(); ?>
<?php
if ( have_posts() ) :
	?>
	<div class="fsb-grid fsb-section">
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'bp_book' === get_post_type() ? 'template-parts/book-card' : 'template-parts/search-result' );
endwhile;
	?>
</div>
	<?php
	the_posts_pagination(); else :
		?>
	<p><?php esc_html_e( 'No results found. Try another search.', 'faststudio-red-books' ); ?></p><?php endif; ?></section><?php get_footer(); ?>
