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
		<?php foreach ( $posts_array as $post ) : setup_postdata( $post ); ?>
			<div class="news__article">
				<p><?php the_time( 'Y.m.d' )?></p>
				<a class="news__article__title" href="<?php the_permalink() ?>"><?php the_title(); ?></a><br/>
			</div>
		<?php endforeach; endif; wp_reset_postdata(); ?>
	</section>
</article>

<?php get_footer(); ?>
