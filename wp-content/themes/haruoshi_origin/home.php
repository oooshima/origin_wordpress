<?php
/**
 * This is home.php
 *
 * @package haruoshi-origin
 */

get_header(); ?>

<section class="top-banner section-wrapper">
    <img class="top-banner__img" src="<?= esc_url( get_stylesheet_directory_uri() . '/img/bird.jpg' ); ?>"
        alt="top-banner">
</section>
<article class="container">
    <section class="works section-wrapper">
        <h1 class="section-title">Works</h1>
        <?php
		$works_query = new WP_Query( 
			array( 
				'post_type' => 'works',
				'posts_per_page' => 6,
				'order' => 'ASC',
				'orderby' => 'date'
			) 
		);
		if ( $works_query->have_posts() ):
		?>
        <ul class="works__article-list">
            <?php while ( $works_query->have_posts() ) : $works_query->the_post(); ?>
            <li class="works__article">
                <a href="<?php the_permalink() ?>">
                    <?php if ( has_post_thumbnail() ): ?>
                    <img class="works__article-thumbnail" src="<?= the_post_thumbnail_url(); ?>" alt="thumbnail">
                    <?php else: ?>
                    <img class="works__article-thumbnail"
                        src="<?= esc_url( get_stylesheet_directory_uri() . '/img/dummy.jpg' ); ?>"
                        alt="dummy-thumbnail">
                    <?php endif; ?>
                </a>
            </li>
            <?php endwhile; ?>
        </ul>
        <?php endif;
		wp_reset_postdata(); ?>
        <a class="seemore-link" href="<?= get_post_type_archive_link( 'works' ); ?>">See More</a>
    </section>
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
                <p class="news__article-title"><?php the_title(); ?></p>
            </li>
            <?php endwhile; ?>
        </ul>
        <?php endif;
		wp_reset_postdata(); ?>
        <a class="seemore-link" href="<?= get_post_type_archive_link( 'news' ); ?>">See More</a>
    </section>
</article>

<?php get_footer(); ?>
