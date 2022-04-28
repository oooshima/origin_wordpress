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
        $taxonomy_terms = get_terms('news_tag');
        if ($taxonomy_terms):
            $term_object = get_queried_object();
            $term_slug = $term_object->slug; ?>
        <ul class="news__tag-list">
            <?php foreach( $taxonomy_terms as $term ):
                $classNameOfList = $term->slug === $term_slug ? "news__tag news__tag--selected" : "news__tag"; ?>
            <li class="<?= $classNameOfList ?>">
                <a
                    href="<?= get_post_type_archive_link("news") . "?" . http_build_query(["news_tag" => $term->slug]); ?>">
                    #<?= $term->name ?>
                </a>
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
