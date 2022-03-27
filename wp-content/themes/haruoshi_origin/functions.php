<?php

/**
 * This is function.php
 *
 * @package haruoshi-origin
 */

/**
 * Styleの読み込み
 */
function enqueue_style()
{
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('global-styles');
	wp_dequeue_style('twentytwentytwo-style');
	wp_dequeue_style('twentytwentytwo-style-inline');

	wp_enqueue_style(
		'style',
		get_stylesheet_directory_uri() . '/dist/css/style.css',
		array(),
		filemtime(get_stylesheet_directory() . '/dist/css/style.css')
	);
	wp_enqueue_style(
		'header',
		get_stylesheet_directory_uri() . '/dist/css/header.css',
		array(),
		filemtime(get_stylesheet_directory() . '/dist/css/header.css')
	);
	wp_enqueue_style(
		'footer',
		get_stylesheet_directory_uri() . '/dist/css/footer.css',
		array(),
		filemtime(get_stylesheet_directory() . '/dist/css/footer.css')
	);

	if (is_home()) :
		wp_enqueue_style(
			'home',
			get_stylesheet_directory_uri() . '/dist/css/home.css',
			array(),
			filemtime(get_stylesheet_directory() . '/dist/css/home.css')
		);
	endif;
	if (is_home() || is_post_type_archive('news')) :
		wp_enqueue_style(
			'news',
			get_stylesheet_directory_uri() . '/dist/css/archive-news.css',
			array(),
			filemtime(get_stylesheet_directory() . '/dist/css/archive-news.css')
		);
	endif;
	if (is_home() || is_post_type_archive('works')) :
		wp_enqueue_style(
			'archive-works',
			get_stylesheet_directory_uri() . '/dist/css/archive-works.css',
			array(),
			filemtime(get_stylesheet_directory() . '/dist/css/archive-works.css')
		);
	endif;
	if (is_singular('works')) :
		wp_enqueue_style(
			'single-works',
			get_stylesheet_directory_uri() . '/dist/css/single-works.css',
			array(),
			filemtime(get_stylesheet_directory() . '/dist/css/single-works.css')
		);
	endif;
	if (is_page('about')) :
		wp_enqueue_style(
			'my-about', // aboutにするとデフォルトのものが読み込まれてしまうため
			get_stylesheet_directory_uri() . '/dist/css/page-about.css',
			array(),
			filemtime(get_stylesheet_directory() . '/dist/css/page-about.css')
		);
	endif;
}

add_action('wp_enqueue_scripts', 'enqueue_style', 11);

/**
 * カスタム投稿タイプの定義
 */
function codex_custom_init()
{
	register_post_type(
		'news',
		array(
			'public' => true,
			'label' => 'News',
			'has_archive' => true
		)
	);
	register_post_type(
		'works',
		array(
			'public' => true,
			'label' => 'Works',
			'has_archive' => true,
			'supports' => array('title', 'editor', 'thumbnail')
		)
	);
}

add_action('init', 'codex_custom_init');

add_theme_support('post-thumbnails');

if( function_exists('acf_add_local_field_group') ):
acf_add_local_field_group(array(
	'key' => 'group_62261c6bd16b5',
	'title' => 'Works',
	'fields' => array(
		array(
			'key' => 'field_62404882234c7',
			'label' => 'artist',
			'name' => 'artist_name',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'works',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
));

endif;
