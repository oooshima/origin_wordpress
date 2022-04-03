<?php
/**
 * This is archive-works.php
 *
 * @package haruoshi-origin
 */

get_header(); ?>

<article class="container">
    <section class="works section-wrapper">
        <h1 class="section-title">Works</h1>
        <?php
        $works_query = new WP_Query( 
            array( 
                'post_type' => 'works',
                'posts_per_page' => 6,
                'order' => 'ASC',
                'orderby' => 'date',
                'paged' => get_query_var('paged')
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
        <?php the_posts_pagination(array(
            'prev_text' => '<',
            'next_text' => '>'
        )); 
        wp_reset_postdata();?>
        <?php endif;?>
    </section>
</article>

<?php get_footer(); ?>
