<?php
/**
 * Theme template or template part.
 *
 * @package FastStudio_Red_Books
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>><head><meta charset="<?php bloginfo( 'charset' ); ?>"><meta name="viewport" content="width=device-width, initial-scale=1"><?php wp_head(); ?></head><body <?php body_class(); ?>>
<?php wp_body_open(); ?><a class="fsb-skip" href="#main-content"><?php esc_html_e( '跳转到正文', 'faststudio-red-books' ); ?></a>
<header class="fsb-header"><div class="fsb-shell fsb-header__inner">
<?php
if ( has_custom_logo() ) :
	?>
	<div class="fsb-brand"><?php the_custom_logo(); ?></div>
	<?php
else :
	?>
	<a class="fsb-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a><?php endif; ?><nav class="fsb-nav" aria-label="<?php esc_attr_e( '主导航', 'faststudio-red-books' ); ?>">
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'container'      => false,
			'fallback_cb'    => false,
		)
	);
	?>
</nav></div></header><main id="main-content" class="fsb-main">
