<?php
/**
 * Theme template or template part.
 *
 * @package FastStudio_Red_Books
 */

get_header();
while ( have_posts() ) :
	the_post(); ?><article <?php post_class( 'fsb-shell fsb-content' ); ?>><p class="fsb-meta"><?php echo esc_html( get_the_date() ); ?></p><h1><?php the_title(); ?></h1>
	<?php
	if ( has_post_thumbnail() ) {
		the_post_thumbnail( 'large', array( 'loading' => 'eager' ) ); }
	?>
<div class="fsb-reading fsb-entry">
	<?php
	the_content();
	wp_link_pages();
	?>
</div>
	<?php
	if ( comments_open() || get_comments_number() ) {
		comments_template(); }
	?>
</article><?php endwhile;
get_footer(); ?>
