<?php
/**
 * Theme template or template part.
 *
 * @package FastStudio_Red_Books
 */

get_header(); ?><section class="fsb-shell fsb-content fsb-content--wide"><header><p class="fsb-eyebrow"><?php esc_html_e( 'Journal', 'faststudio-red-books' ); ?></p><h1><?php echo esc_html( is_home() ? get_the_title( (int) get_option( 'page_for_posts' ) ) : __( 'Journal', 'faststudio-red-books' ) ); ?></h1></header>
<?php
if ( have_posts() ) :
	?>
	<div class="fsb-grid fsb-section">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
	<article <?php post_class( 'fsb-book' ); ?>>
		<?php
		if ( has_post_thumbnail() ) :
			?>
	<a class="fsb-cover" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); ?></a><?php endif; ?><p class="fsb-meta"><?php echo esc_html( get_the_date() ); ?></p><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><p><?php echo esc_html( get_the_excerpt() ); ?></p></article><?php endwhile; ?></div>
	<?php
	the_posts_pagination(); else :
		?>
	<p><?php esc_html_e( 'Nothing has been published here yet.', 'faststudio-red-books' ); ?></p><?php endif; ?></section><?php get_footer(); ?>
