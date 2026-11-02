<?php
/**
 * Theme template or template part.
 *
 * @package FastStudio_Red_Books
 */

get_header(); ?><section class="fsb-shell fsb-content"><p class="fsb-eyebrow"><?php esc_html_e( '404', 'faststudio-red-books' ); ?></p><h1><?php esc_html_e( '暂时找不到这个页面。', 'faststudio-red-books' ); ?></h1><p><?php esc_html_e( '可以搜索书目与手记，或返回出版社首页。', 'faststudio-red-books' ); ?></p><?php get_search_form(); ?><a class="fsb-back" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( '返回首页', 'faststudio-red-books' ); ?></a></section><?php get_footer(); ?>
