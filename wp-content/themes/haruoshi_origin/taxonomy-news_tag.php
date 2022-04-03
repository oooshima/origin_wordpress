<?php
/**
 * This is taxonomy-news_tag.php
 *
 * @package haruoshi-origin
 */

get_header(); ?>

<article class="container">
    <section class="news section-wrapper">
        <h1 class="section-title">News</h1>
        <?php
        $term_object = get_queried_object();
        $term_slug = $term_object->slug;
        $taxonomy_terms = get_terms('news_tag');
        if ($taxonomy_terms):?>
        <ul class="news__tag-list">
            <?php foreach( $taxonomy_terms as $term ):
                $classNameOfList = $term->slug === $term_slug ? "news__tag news__tag--select" : "news__tag"; ?>
            <li class="<?= $classNameOfList ?>">
                <a href="<?= get_term_link( $term ) ?>">#<?= $term->name ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif;
        $args = array(
            'post_type' => 'news',
            'taxonomy' => 'news_tag',
            'term' => $term_slug,
            'posts_per_page' => -1 // -1にすると全件表示
        );
        $custom_query = new WP_Query( $args );
        if ($custom_query->have_posts()):?>
        <ul class="news__article-list">
            <?php while ( $custom_query->have_posts() ) : $custom_query->the_post()?>
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
