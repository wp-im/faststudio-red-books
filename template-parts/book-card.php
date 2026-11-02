<?php
/**
 * Theme template or template part.
 *
 * @package FastStudio_Red_Books
 */

?>
<article <?php post_class( 'fsb-book' ); ?>><a class="fsb-cover" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( get_the_title() ); ?>"><?php faststudio_books_cover( get_the_ID() ); ?></a><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
<?php
$author = faststudio_books_terms( get_the_ID(), 'bp_author' ); if ( $author ) :
	?>
	<p class="fsb-book__byline"><?php echo esc_html( $author ); ?></p><?php endif; ?>
	<?php
	$date = get_post_meta( get_the_ID(), '_bpc_date', true ); if ( $date ) :
		?>
	<p class="fsb-book__meta"><?php echo esc_html( $date ); ?></p><?php endif; ?></article>
