<?php
/**
 * Theme template or template part.
 *
 * @package FastStudio_Red_Books
 */

?>
<article <?php post_class( 'fsb-book' ); ?>>
<?php
if ( has_post_thumbnail() ) :
	?>
	<a class="fsb-cover" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); ?></a><?php endif; ?><p class="fsb-meta"><?php echo esc_html( get_the_date() ); ?></p><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><p><?php echo esc_html( get_the_excerpt() ); ?></p></article>
