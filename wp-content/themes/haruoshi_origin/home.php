<?php
/**
 * This is home.php
 *
 * @package haruoshi-origin
 */

get_header(); ?>

<article class="container">
	<section class="news">
		<h1 class="content-title">News</h1>
		<?php
			$posts_array = get_posts( array( 'post_type' => 'news' ) );
			if (!empty($posts_array)):
		?>
		<ul class="news__article-list">
		<?php foreach ( $posts_array as $post ) : setup_postdata( $post ); ?>
			<li class="news__article">
				<time><?php the_time( 'Y.m.d' )?></time>
				<p class="news__article-title" href="<?php the_permalink() ?>"><?php the_title(); ?></p>
			</li>
		<?php endforeach; endif; wp_reset_postdata(); ?>
		</ul>
	</section>
</article>

<?php get_footer(); ?>
