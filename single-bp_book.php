<?php
/**
 * Theme template or template part.
 *
 * @package FastStudio_Red_Books
 */

get_header();
while ( have_posts() ) :
	the_post(); ?>
<article <?php post_class( 'fsb-shell fsb-content fsb-detail' ); ?>><a class="fsb-back" href="<?php echo esc_url( get_post_type_archive_link( 'bp_book' ) ); ?>"><?php esc_html_e( '返回全部书籍', 'faststudio-red-books' ); ?></a><div class="fsb-detail__grid"><div class="fsb-detail__cover"><div class="fsb-cover fsb-cover--detail"><?php faststudio_books_cover( get_the_ID(), true ); ?></div></div><header class="fsb-detail__copy">
	<?php
	$series = faststudio_books_terms( get_the_ID(), 'bp_series' ); if ( $series ) :
		?>
	<p class="fsb-eyebrow"><?php echo esc_html( $series ); ?></p><?php endif; ?><h1><?php the_title(); ?></h1>
	<?php
	$authors = faststudio_books_terms( get_the_ID(), 'bp_author' ); if ( $authors ) :
		?>
	<p class="fsb-author"><?php echo esc_html( $authors ); ?></p><?php endif; ?>
	<?php
	if ( has_excerpt() ) :
		?>
	<p class="fsb-summary"><?php echo esc_html( get_the_excerpt() ); ?></p><?php endif; ?>
	<?php
	$facts = array();
	foreach ( array(
		'translator' => __( '译者', 'faststudio-red-books' ),
		'date'       => __( '出版日期', 'faststudio-red-books' ),
		'format'     => __( '装帧 / 版本', 'faststudio-red-books' ),
		'pages'      => __( '页数', 'faststudio-red-books' ),
		'isbn'       => 'ISBN',
	) as $key => $label ) {
		$value = get_post_meta( get_the_ID(), '_bpc_' . $key, true );
		if ( $value ) {
			$facts[ $label ] = $value; }
	} if ( $facts ) :
		?>
	<dl class="fsb-facts">
		<?php
		foreach ( $facts as $label => $value ) :
			?>
	<div><dt><?php echo esc_html( $label ); ?></dt><dd><?php echo esc_html( $value ); ?></dd></div><?php endforeach; ?></dl><?php endif; ?></header></div>
	<?php
	if ( trim( get_the_content() ) ) :
		?>
		<section class="fsb-description" aria-labelledby="fsb-book-description"><h2 id="fsb-book-description"><?php esc_html_e( '关于这本书', 'faststudio-red-books' ); ?></h2><div class="fsb-reading fsb-entry">
		<?php
		the_content();
		wp_link_pages();
		?>
</div></section><?php endif; ?>
	<?php
	$subjects = get_the_term_list( get_the_ID(), 'bp_subject', '<p class="fsb-meta">', ' / ', '</p>' );
	if ( $subjects && ! is_wp_error( $subjects ) ) {
		echo wp_kses_post( $subjects ); }
	?>
	</article><?php endwhile;
get_footer(); ?>
