<?php
/**
 * This is archive-works.php
 *
 * @package haruoshi-origin
 */

get_header(); ?>

<article class="container">
	<section class="works">
		<h1 class="section-title">Works</h1>
		<?php if ( have_posts() ):?>
			<ul class="works__article-list">
				<?php while ( have_posts() ) : the_post(); ?>
					<li class="works__article">
						<div class="works__article-thumbnail">
							<?php the_post_thumbnail( array( 640, 416 ) ); ?>
						</div>
						<p class="works__article-title"><?php the_title(); ?></p>
						<p class="works__article-contents"><?php the_field( 'contents' ); ?></p>
					</li>
				<?php endwhile; ?>
			</ul>
		<?php endif; 
		wp_reset_postdata(); 
		?>
	</section>
</article>

<?php get_footer(); ?>
