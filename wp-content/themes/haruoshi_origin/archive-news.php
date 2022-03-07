<?php
/**
 * This is archive-news.php
 *
 * @package haruoshi-origin
 */

get_header(); ?>

<article class="container">
	<section class="news">
		<h1 class="content-title">News</h1>
		<?php if ( have_posts() ):?>
			<ul class="news__article-list">
			<?php while ( have_posts() ) : the_post(); ?>
				<li class="news__article">
					<time><?php the_time( 'Y.m.d' )?></time>
					<p class="news__article-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></p>
				</li>
			<?php 
			endwhile; ?>
			</ul>
		<?php endif; 
		wp_reset_postdata(); 
		?>
	</section>
</article>

<?php get_footer(); ?>
