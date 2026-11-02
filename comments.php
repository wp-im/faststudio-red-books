<?php
/**
 * Theme template or template part.
 *
 * @package FastStudio_Red_Books
 */

if ( post_password_required() ) {
	return; } ?><section id="comments" class="fsb-entry"><h2><?php esc_html_e( '留言讨论', 'faststudio-red-books' ); ?></h2>
	<?php
	if ( have_comments() ) :
		?>
	<ol>
		<?php
		wp_list_comments(
			array(
				'style'      => 'ol',
				'short_ping' => true,
			)
		);
		?>
	</ol>
		<?php
		the_comments_navigation();
endif;
	?>
<?php
if ( comments_open() ) {
	comment_form(); }
?>
</section>
