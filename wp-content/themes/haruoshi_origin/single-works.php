<?php
/**
 * This is single-works.php
 *
 * @package haruoshi-origin
 */

get_header(); ?>

<article class="container">
	<h1 class="container__title"><?php the_title(); ?></h1>
	<p class="container__date"><?php the_time( 'Y/m/d' ); ?></p>
	<?php if ( has_post_thumbnail() ): ?>
		<img class="container__thumbnail" src="<?= the_post_thumbnail_url(); ?>" alt="thumbnail">
	<?php endif; ?>
	<p class="container__contents"><?php the_field( 'contents' ); ?></p>
</article>
<u><a class="back-link" href="<?= get_post_type_archive_link( 'works' ); ?>">一覧に戻る</a></u>

<?php get_footer(); ?>