<?php
/**
 * This is single-news.php
 *
 * @package haruoshi-origin
 */

get_header(); ?>

<article class="container">
	<h1 class="container__title"><?php the_title(); ?></h1>
	<p class="container__date"><?php the_time( 'Y/m/d' ); ?></p>
	<p class="container__contents"><?php the_field( 'contents' ); ?></p>
</article>
<u><a class="back-link" href="xxx">一覧に戻る</a></u>

<?php get_footer(); ?>
