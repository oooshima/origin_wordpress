<?php
/**
 * This is function.php
 *
 * @package haruoshi-origin
 */

/**
 * Styleの読み込み
 */
function enqueue_style() {
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('global-styles');
	wp_dequeue_style('twentytwentytwo-style');
	wp_dequeue_style('twentytwentytwo-style-inline');

	wp_enqueue_style(
		'style',
		get_stylesheet_directory_uri() . '/dist/css/style.css',
		array(),
		filemtime( get_stylesheet_directory() . '/dist/css/style.css' ),
	);
	wp_enqueue_style(
		'header',
		get_stylesheet_directory_uri() . '/dist/css/header.css',
		array(),
		filemtime( get_stylesheet_directory() . '/dist/css/header.css' ),
	);
	wp_enqueue_style(
		'footer',
		get_stylesheet_directory_uri() . '/dist/css/footer.css',
		array(),
		filemtime( get_stylesheet_directory() . '/dist/css/footer.css' ),
	);

	if ( is_home() || is_post_type_archive( 'news' ) ) :
		wp_enqueue_style(
			'home',
			get_stylesheet_directory_uri() . '/dist/css/home.css',
			array(),
			filemtime( get_stylesheet_directory() . '/dist/css/home.css' ),
		);
		wp_enqueue_style(
			'news',
			get_stylesheet_directory_uri() . '/dist/css/news.css',
			array(),
			filemtime( get_stylesheet_directory() . '/dist/css/news.css' ),
		);
	endif;

	// if ( get_post_type() === 'news' ) :
	// 	wp_enqueue_style(
	// 		'single-news',
	// 		get_stylesheet_directory_uri() . '/dist/css/news.css',
	// 		array(),
	// 		filemtime( get_stylesheet_directory() . '/dist/css/news.css' ),
	// 	);
	// endif;
}

add_action( 'wp_enqueue_scripts', 'enqueue_style', 11 );

/**
 * カスタム投稿タイプの定義
 */
function codex_custom_init() {
	$args = array(
		'public' => true,
		'label'  => 'News',
		'has_archive' => true
	);
	register_post_type('news', $args);
}

add_action( 'init', 'codex_custom_init' );
