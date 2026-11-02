<?php
/**
 * Theme template or template part.
 *
 * @package FastStudio_Red_Books
 */

get_header(); ?><section class="fsb-shell fsb-content fsb-content--wide"><p class="fsb-eyebrow"><?php esc_html_e( '出版书目', 'faststudio-red-books' ); ?></p><h1><?php echo esc_html( get_the_archive_title() ); ?></h1>
<?php
if ( have_posts() ) :
	?>
	<div class="fsb-grid fsb-section">
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/book-card' );
endwhile;
	?>
</div><nav class="fsb-pagination" aria-label="<?php esc_attr_e( '书目分页', 'faststudio-red-books' ); ?>"><?php the_posts_pagination(); ?></nav>
	<?php
else :
	?>
	<p class="fsb-empty"><?php esc_html_e( '暂无已出版的书籍。', 'faststudio-red-books' ); ?></p><?php endif; ?></section><?php get_footer(); ?>
