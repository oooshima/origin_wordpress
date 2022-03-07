<?php
/**
 * This is home.php
 *
 * @package haruoshi-origin
 */

get_header(); ?>

<article class="container">
	<section class="news section-wrapper">
		<h1 class="section-title">News</h1>
		<?php
			$news_query = new WP_Query( 
				array( 
					'post_type' => 'news' ,
					'posts_per_page' => 3,
					'order' => 'ASC',
					'orderby' => 'date'
					) 
			);
			if ( $news_query->have_posts() ):
		?>
		<ul class="news__article-list">
		<?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
			<li class="news__article">
				<time><?php the_time( 'Y.m.d' )?></time>
				<p class="news__article-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></p>
			</li>
		<?php endwhile; endif; wp_reset_postdata(); ?>
		</ul>
		<p class="seemore-link"><a href="<?php echo esc_url(home_url( '/' ))?>news">See More</a></p>
	</section>
</article>

<?php get_footer(); ?>
