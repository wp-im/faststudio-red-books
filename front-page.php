<?php
/**
 * Theme template or template part.
 *
 * @package FastStudio_Red_Books
 */

get_header(); ?>
<section class="fsb-intro"><div class="fsb-shell fsb-intro__inner"><div><p class="fsb-eyebrow"><?php echo esc_html( faststudio_books_mod( 'eyebrow', __( '独立微型出版工作室', 'faststudio-red-books' ) ) ); ?></p><h1><?php echo esc_html( faststudio_books_mod( 'headline', __( '为值得慢读的书而做。', 'faststudio-red-books' ) ) ); ?></h1></div><p class="fsb-intro__copy"><?php echo esc_html( faststudio_books_mod( 'intro', __( '出版文学、人文与日常，让值得留下的书，与读者相遇。', 'faststudio-red-books' ) ) ); ?></p></div></section>
<section class="fsb-shell fsb-section" aria-labelledby="fsb-catalog-title"><div class="fsb-section__head"><h2 id="fsb-catalog-title"><?php echo esc_html( faststudio_books_mod( 'catalog_label', __( '新近出版', 'faststudio-red-books' ) ) ); ?></h2>
<?php
if ( post_type_exists( 'bp_book' ) ) :
	?>
	<a href="<?php echo esc_url( get_post_type_archive_link( 'bp_book' ) ); ?>"><?php esc_html_e( '查看全部书籍', 'faststudio-red-books' ); ?></a><?php endif; ?></div>
<?php
if ( post_type_exists( 'bp_book' ) ) :
	$books = faststudio_books_catalog_query();
	?>
	<div class="fsb-grid">
	<?php
	if ( $books->have_posts() ) :
		while ( $books->have_posts() ) :
			$books->the_post();
			get_template_part( 'template-parts/book-card' );
		endwhile;
		wp_reset_postdata(); else :
			?>
	<p class="fsb-empty"><?php esc_html_e( '已出版的书籍会显示在这里。', 'faststudio-red-books' ); ?></p><?php endif; ?></div>
	<?php
else :
	?>
	<p class="fsb-empty"><?php esc_html_e( '启用书目内容插件后，这里会显示书籍。', 'faststudio-red-books' ); ?></p><?php endif; ?>
</section>
<?php
if ( is_active_sidebar( 'faststudio-books-publisher-note' ) ) :
	?>
	<div class="fsb-shell fsb-section"><?php dynamic_sidebar( 'faststudio-books-publisher-note' ); ?></div><?php endif; ?>
<section class="fsb-shell fsb-section"><div class="fsb-reading"><p class="fsb-eyebrow"><?php esc_html_e( '关于出版社', 'faststudio-red-books' ); ?></p><h2><?php echo esc_html( faststudio_books_mod( 'about_label', __( '认真做书，也认真对待读者。', 'faststudio-red-books' ) ) ); ?></h2><p><?php echo esc_html( faststudio_books_mod( 'about_copy', __( '从编辑、设计到出版，我们为每一本书保留它自己的声音。', 'faststudio-red-books' ) ) ); ?></p></div>
<?php
if ( is_active_sidebar( 'faststudio-books-about' ) ) :
	?>
	<div><?php dynamic_sidebar( 'faststudio-books-about' ); ?></div><?php endif; ?></section>
<?php
if ( is_active_sidebar( 'faststudio-books-after-catalog' ) ) :
	?>
	<div class="fsb-shell fsb-section"><?php dynamic_sidebar( 'faststudio-books-after-catalog' ); ?></div><?php endif; ?>
<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post(); if ( trim( get_the_content() ) ) :
			?>
	<section class="fsb-shell fsb-section fsb-entry"><?php the_content(); ?></section>
			<?php
endif;
endwhile;
endif;
?>
<?php get_footer(); ?>
