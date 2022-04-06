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
	if (is_home() || is_post_type_archive('news') || is_tax('news_tag')) :
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
	if (is_page('contact')) :
		wp_enqueue_style(
			'contact',
			get_stylesheet_directory_uri() . '/dist/css/page-contact.css',
			array(),
			filemtime(get_stylesheet_directory() . '/dist/css/page-contact.css')
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

/**
 * タクソノミーの定義
 */
function taxonomy_writer() {
  $name = __('タグ', 'my-theme');

  $labels = [
      'name' => $name,
      'manu_name' => $name,
      'singular_name' => $name,
      'not_found' => $name . 'は見つかりませんでした',
      'search_items' => $name . 'を検索',
      'popular_items' => $name . 'の人気の項目',
      'all_items' => $name . '一覧',
      'parent_item' => null,
      'parent_item_colon' => null,
      'edit_item'=> $name . 'を編集',
      'update_item' => $name . 'をアップデート',
      'add_new_item' => $name . 'を新規追加' ,
      'new_item_name' => '新しい' . $name . 'の名前',
      'separate_items_with_commas' => '項目をコンマで区切ってください',
      'add_or_remove_items' => '項目の追加または削除',
      'choose_from_most_used' => 'よく使われている項目から選択',
  ];

  $args = [
	  'labels' => $labels,
	  'show_admin_column' => true,
	  'show_in_rest' => true, //Gutenbergの中で表示するために必須
  ];

  register_taxonomy('news_tag','news', $args);
}

add_action( 'init', 'taxonomy_writer' );

add_theme_support('post-thumbnails');

if( function_exists('acf_add_local_field_group') ):
acf_add_local_field_group(array(
	'key' => 'works',
	'title' => 'Works',
	'fields' => array(
		array(
			'key' => 'works_artist',
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

/**
 * ページネーションのスクリーンリーダー用テキストを表示しない
 */
function no_screen_reader_text($template){
    $template = '
        <nav class="navigation %1$s" role="navigation">
            <div class="nav-links">%3$s</div>
        </nav>';

        return $template;
    }
add_action( 'navigation_markup_template', 'no_screen_reader_text' );

/**
 * Contact Form 7のCSSをcontactページ以外で動作させない
 */
function my_contact_enqueue_scripts(){
	wp_deregister_script('contact-form-7');
	wp_deregister_style('contact-form-7');
	if (is_page('contact')) {
		if (function_exists( 'wpcf7_enqueue_scripts')) {
        	wpcf7_enqueue_scripts();
		}
	if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
		wpcf7_enqueue_styles();
	}
}
}
add_action( 'wp_enqueue_scripts', 'my_contact_enqueue_scripts');
