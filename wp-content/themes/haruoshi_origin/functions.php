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
	wp_enqueue_style(
		'common',
		get_stylesheet_directory_uri() . '/dist/css/common.css',
		array(),
		filemtime( get_stylesheet_directory() . '/dist/css/common.css' ),
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

	if ( is_home() ) :
		wp_enqueue_style(
			'home',
			get_stylesheet_directory_uri() . '/dist/css/home.css',
			array(),
			filemtime( get_stylesheet_directory() . '/dist/css/home.css' ),
		);
	endif;
}

add_action( 'wp_enqueue_scripts', 'enqueue_style' );
