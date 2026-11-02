<?php
/**
 * Theme template or template part.
 *
 * @package FastStudio_Red_Books
 */

?>
</main><footer class="fsb-footer"><div class="fsb-shell fsb-footer__inner"><div><strong><?php echo esc_html( get_bloginfo( 'name' ) ); ?></strong>
<?php
if ( is_active_sidebar( 'faststudio-books-footer' ) ) {
	dynamic_sidebar( 'faststudio-books-footer' ); }
?>
</div><nav aria-label="<?php esc_attr_e( '页脚导航', 'faststudio-red-books' ); ?>">
<?php
wp_nav_menu(
	array(
		'theme_location' => 'footer',
		'container'      => false,
		'fallback_cb'    => false,
	)
);
?>
</nav></div></footer><?php wp_footer(); ?></body></html>
