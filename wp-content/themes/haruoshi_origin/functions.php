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
 * ページネーション
 */
function pagination($pages = 1, $range = 1)
{
	$pages = (int)$pages; //float型で渡ってくるので明示的にint型 へ
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;

	// 1ページしかない時
	if ($pages === 1) {
		return;
	}

	if(1 != $pages) { //全ページが１でない場合はページネーションを表示する
		// 最初と最後のページにいるときは前後3ページを表示
		$range = ($paged == 1 || $paged == $pages) ? 2 : 1;
		
		echo '<ul class="pagination">';
		if($paged > 1) {
			echo '<li class="pagination__pre"><a href="'.get_pagenum_link($paged - 1).'"><span class="pagination__arrow pagination__arrow--left"></span></a></li>';
		}
		if($paged > 2 && $pages > 3) {
			echo '<li><a href="'.get_pagenum_link(1).'"><span class="pagination__page-numbers">1</span></a></li>';
		}
		if($paged > 3 && $pages > 4) {
			echo '<li><span class="pagination__dot-line">...</span></li>';
		}
		for ($i=1; $i <= $pages; $i++) {
			if($i <= $paged + $range && $i >= $paged - $range){ // $paged ± $range 以内であればページ番号を出力
				if ($paged == $i) {
					echo '<li><span class="pagination__page-numbers pagination__page-numbers--active">'.$i.'</span></li>';
				} else {
					echo '<li><a href="'.get_pagenum_link($i).'"><span class="pagination__page-numbers">'.$i.'</span></a></li>';
				}
			}
		}
	}
	
	if($paged < $pages-2 && $pages > 4) {
		echo '<li><span class="pagination__dot-line">...</span></li>';
	}
	if($paged < $pages-1 && $pages > 3) {
		echo '<li><a href="'.get_pagenum_link($pages).'"><span class="pagination__page-numbers">'.$pages.'</span></a></li>';
	}
	if ($paged < $pages) {
		echo '<li class="pagination__next"><a href="'.get_pagenum_link($paged + 1).'"><span class="pagination__arrow pagination__arrow--right"></span></a></li>';
	}
	echo '</ul>';
}

add_action('pre_get_posts', 'change_posts_per_page');

/**
 * 表示する投稿数
 */
function change_posts_per_page($query)
{
	if (is_admin() || !$query->is_main_query()) {
		return;
	}
	if (is_post_type_archive('works')) {
		$query->set('posts_per_page', 6);
	}
	return;
}
