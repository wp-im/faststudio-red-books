<?php
/**
 * Theme template or template part.
 *
 * @package FastStudio_Red_Books
 */

get_header(); ?><section class="fsb-shell fsb-content fsb-content--wide"><p class="fsb-eyebrow"><?php esc_html_e( '主题', 'faststudio-red-books' ); ?></p><h1><?php echo esc_html( single_term_title( '', false ) ); ?></h1>
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
</div>
	<?php
	the_posts_pagination();
endif;
?>
</section><?php get_footer(); ?>
