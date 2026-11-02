<?php
/**
 * Theme template or template part.
 *
 * @package FastStudio_Red_Books
 */

get_header(); ?><section class="fsb-shell fsb-content fsb-content--wide"><p class="fsb-eyebrow"><?php esc_html_e( '浏览', 'faststudio-red-books' ); ?></p><h1><?php echo esc_html( get_the_archive_title() ); ?></h1>
<?php
$description = get_the_archive_description(); if ( $description ) :
	?>
	<div class="fsb-reading"><?php echo wp_kses_post( $description ); ?></div><?php endif; ?>
	<?php
	if ( have_posts() ) :
		?>
	<div class="fsb-grid fsb-section">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
	<article <?php post_class( 'fsb-book' ); ?>><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><p><?php echo esc_html( get_the_excerpt() ); ?></p></article><?php endwhile; ?></div>
		<?php
		the_posts_pagination();
endif;
	?>
</section><?php get_footer(); ?>
