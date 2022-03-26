<?php
/**
 * This is archive-works.php
 *
 * @package haruoshi-origin
 */

get_header(); ?>

<article class="container">
    <section class="works section-wrapper section-wrapper-sp">
        <h1 class="section-title">Works</h1>
        <?php if ( have_posts() ):?>
        <ul class="works__article-list">
            <?php while ( have_posts() ) : the_post(); ?>
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
        <?php endif;?>
    </section>
</article>

<?php get_footer(); ?>
