<?php
/**
 * FastStudio Red Books setup and publisher presentation.
 *
 * @package FastStudio_Red_Books
 */

defined( 'ABSPATH' ) || exit;

/** Configure theme supports and navigation locations. */
function faststudio_books_setup() {
	load_theme_textdomain( 'faststudio-red-books', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 96,
			'width'       => 280,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form', 'style', 'script' ) );
	register_nav_menus(
		array(
			'primary' => __( '主导航', 'faststudio-red-books' ),
			'footer'  => __( '页脚导航', 'faststudio-red-books' ),
		)
	);
}
add_action( 'after_setup_theme', 'faststudio_books_setup' );

/** Return semantic palette defaults.
 *
 * @return array<string, string>
 */
function faststudio_books_colors() {
	return array(
		'accent'       => '#d92525',
		'paper'        => '#fff6ee',
		'ink'          => '#201d1a',
		'muted'        => '#625c56',
		'surface'      => '#fffdfa',
		'line'         => '#d8ccc2',
		'on_accent'    => '#ffffff',
		'footer'       => '#201d1a',
		'footer_text'  => '#fffdfa',
		'footer_muted' => '#c8beb7',
		'focus'        => '#005fcc',
	);
}

/** Register publisher copy and color controls.
 *
 * @param WP_Customize_Manager $customize WordPress Customizer manager.
 */
function faststudio_books_customizer( $customize ) {
	$customize->add_section(
		'faststudio_books_home',
		array(
			'title'    => __( 'FastStudio Red Books：出版社内容', 'faststudio-red-books' ),
			'priority' => 35,
		)
	);
	$fields = array(
		'eyebrow'       => array( __( '出版社标识', 'faststudio-red-books' ), __( '独立微型出版工作室', 'faststudio-red-books' ) ),
		'headline'      => array( __( '首页主标题', 'faststudio-red-books' ), __( '为值得慢读的书而做。', 'faststudio-red-books' ) ),
		'intro'         => array( __( '出版社介绍', 'faststudio-red-books' ), __( '出版文学、人文与日常，让值得留下的书，与读者相遇。', 'faststudio-red-books' ) ),
		'catalog_label' => array( __( '书目区标题', 'faststudio-red-books' ), __( '新近出版', 'faststudio-red-books' ) ),
		'about_label'   => array( __( '关于区标题', 'faststudio-red-books' ), __( '认真做书，也认真对待读者。', 'faststudio-red-books' ) ),
		'about_copy'    => array( __( '出版理念', 'faststudio-red-books' ), __( '从编辑、设计到出版，我们为每一本书保留它自己的声音。', 'faststudio-red-books' ) ),
	);
	foreach ( $fields as $key => $field ) {
		$textarea = in_array( $key, array( 'intro', 'about_copy' ), true );
		$customize->add_setting(
			'faststudio_books_' . $key,
			array(
				'default'           => $field[1],
				'sanitize_callback' => $textarea ? 'sanitize_textarea_field' : 'sanitize_text_field',
			)
		);
		$customize->add_control(
			'faststudio_books_' . $key,
			array(
				'label'   => $field[0],
				'section' => 'faststudio_books_home',
				'type'    => $textarea ? 'textarea' : 'text',
			)
		);
	}
	$customize->add_section(
		'faststudio_books_palette',
		array(
			'title'       => __( 'FastStudio Red Books：配色', 'faststudio-red-books' ),
			'priority'    => 36,
			'description' => __( '所有主题配色都可以修改。更改后请重新检查文字与背景的对比度。', 'faststudio-red-books' ),
		)
	);
	$labels = array(
		'accent'       => __( '红色强调色', 'faststudio-red-books' ),
		'paper'        => __( '暖白页面底色', 'faststudio-red-books' ),
		'ink'          => __( '主要文字', 'faststudio-red-books' ),
		'muted'        => __( '次要文字', 'faststudio-red-books' ),
		'surface'      => __( '书封背景', 'faststudio-red-books' ),
		'line'         => __( '分隔线与边框', 'faststudio-red-books' ),
		'on_accent'    => __( '强调色背景文字', 'faststudio-red-books' ),
		'footer'       => __( '页脚底色', 'faststudio-red-books' ),
		'footer_text'  => __( '页脚文字', 'faststudio-red-books' ),
		'footer_muted' => __( '页脚次要文字', 'faststudio-red-books' ),
		'focus'        => __( '键盘焦点提示', 'faststudio-red-books' ),
	);
	foreach ( faststudio_books_colors() as $key => $default ) {
		$customize->add_setting(
			'faststudio_books_color_' . $key,
			array(
				'default'           => $default,
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$customize->add_control(
			new WP_Customize_Color_Control(
				$customize,
				'faststudio_books_color_' . $key,
				array(
					'label'   => $labels[ $key ],
					'section' => 'faststudio_books_palette',
				)
			)
		);
	}
}
add_action( 'customize_register', 'faststudio_books_customizer' );

/** Register publisher homepage, sidebar, and footer widgets. */
function faststudio_books_widgets() {
	foreach ( array(
		'faststudio-books-publisher-note' => __( '出版社首页：编辑说明', 'faststudio-red-books' ),
		'faststudio-books-about'          => __( '出版社首页：关于', 'faststudio-red-books' ),
		'faststudio-books-after-catalog'  => __( '出版社首页：书目之后', 'faststudio-red-books' ),
		'faststudio-books-sidebar'        => __( '书籍与手记：侧栏', 'faststudio-red-books' ),
		'faststudio-books-footer'         => __( '页脚：出版社信息', 'faststudio-red-books' ),
	) as $id => $name ) {
		register_sidebar(
			array(
				'id'            => $id,
				'name'          => $name,
				'before_widget' => '<section id="%1$s" class="widget fsb-widget-area %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="fsb-eyebrow">',
				'after_title'   => '</h2>',
			)
		);
	}
}
add_action( 'widgets_init', 'faststudio_books_widgets' );

/** Enqueue stylesheet and sanitized palette variables. */
function faststudio_books_assets() {
	$theme = wp_get_theme();
	wp_enqueue_style( 'faststudio-red-books-style', get_stylesheet_uri(), array(), $theme->get( 'Version' ) );
	$vars = '';
	foreach ( faststudio_books_colors() as $key => $default ) {
		$value   = sanitize_hex_color( get_theme_mod( 'faststudio_books_color_' . $key, $default ) );
		$css_key = array(
			'paper'        => 'paper',
			'ink'          => 'ink',
			'muted'        => 'muted',
			'surface'      => 'surface',
			'line'         => 'line',
			'on_accent'    => 'on-accent',
			'footer_text'  => 'footer-text',
			'footer_muted' => 'footer-muted',
		);
		$vars   .= '--fsb-' . ( isset( $css_key[ $key ] ) ? $css_key[ $key ] : $key ) . ':' . ( $value ? $value : $default ) . ';';
	}
	wp_add_inline_style( 'faststudio-red-books-style', ':root{' . $vars . '}' );
}
add_action( 'wp_enqueue_scripts', 'faststudio_books_assets' );

/** Get a theme setting with a fallback.
 *
 * @param string $key Setting name without theme prefix.
 * @param mixed  $fallback Default value.
 * @return mixed
 */
function faststudio_books_mod( $key, $fallback = '' ) {
	return get_theme_mod( 'faststudio_books_' . $key, $fallback );
}

/** Query a bounded set of published catalog entries.
 *
 * @param int $limit Maximum number of books.
 * @return WP_Query
 */
function faststudio_books_catalog_query( $limit = 8 ) {
	return new WP_Query(
		array(
			'post_type'           => 'bp_book',
			'post_status'         => 'publish',
			'posts_per_page'      => min( 12, max( 1, absint( $limit ) ) ),
			'no_found_rows'       => true,
			'ignore_sticky_posts' => true,
			/* phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_query -- A bounded catalog query supports date-sorted books, including undated records. */
			'meta_query'          => array(
				'relation'    => 'OR',
				'publication' => array(
					'key'     => '_bpc_date',
					'compare' => 'EXISTS',
				),
				'missing'     => array(
					'key'     => '_bpc_date',
					'compare' => 'NOT EXISTS',
				),
			),
			'orderby'             => array(
				'publication' => 'DESC',
				'title'       => 'ASC',
			),
		)
	);
}

/** Output an uncropped book cover with responsive image attributes.
 *
 * @param int  $post_id Book post ID.
 * @param bool $detail Whether the cover is the primary detail image.
 */
function faststudio_books_cover( $post_id, $detail = false ) {
	if ( has_post_thumbnail( $post_id ) ) {
		echo get_the_post_thumbnail(
			$post_id,
			'large',
			array(
				'alt'     => $detail ? get_the_title( $post_id ) : '',
				'loading' => $detail ? 'eager' : 'lazy',
				'sizes'   => $detail ? '(max-width: 640px) 58vw, 320px' : '(max-width: 640px) 45vw, (max-width: 900px) 30vw, 260px',
			)
		); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- WordPress image API escapes attributes.
	} else {
		echo '<span class="fsb-cover__empty">' . esc_html( get_the_title( $post_id ) ) . '</span>';
	}
}

/** Get term names associated with a book.
 *
 * @param int    $post_id Book post ID.
 * @param string $taxonomy Catalog taxonomy name.
 * @return string
 */
function faststudio_books_terms( $post_id, $taxonomy ) {
	$terms = get_the_terms( $post_id, $taxonomy );
	return $terms && ! is_wp_error( $terms ) ? implode( ' / ', wp_list_pluck( $terms, 'name' ) ) : '';
}
