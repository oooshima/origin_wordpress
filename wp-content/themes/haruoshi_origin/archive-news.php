<?php
/**
 * This is archive-news.php
 *
 * @package haruoshi-origin
 */

get_header(); ?>

<article class="container">
    <section class="news section-wrapper">
        <h1 class="section-title">News</h1>
        <?php
        $args = array(
            'orderby' => 'name',
            'order' => 'ASC'
        );
        $taxonomy_terms = get_terms('news_tag');
        if ($taxonomy_terms):?>
        <ul class="news__tag-list">
            <?php foreach( $taxonomy_terms as $term ):?>
            <li class="news__tag">
                <a href="<?= get_term_link( $term ) ?>">#<?= $term->name ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif;?>
        <?php if ( have_posts() ):?>
        <ul class="news__article-list">
            <?php while ( have_posts() ) : the_post(); ?>
            <li class="news__article">
                <time><?php the_time( 'Y.m.d' )?></time>
                <p class="news__article-title"><?php the_title(); ?></p>
            </li>
            <?php endwhile; ?>
        </ul>
        <?php endif;?>
    </section>
</article>

<?php get_footer(); ?>
