<?php
/**
 * This is header.php
 *
 * @package haruoshi-origin
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ORIGIN</title>
    <meta name="description" content="haruoshiの練習サイト">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <?php wp_head(); ?>
</head>

<body>
    <header class="site-header">
        <div class="site-header__contents">
            <h1 class="site-header__logo">
                <a href="<?= home_url(); ?>">My Work</a>
            </h1>
            <nav>
                <ul class="global-nav">
                    <li class="global-nav__item">
                        <a href="<?= home_url('/about/'); ?>">About</a>
                    </li>
                    <li class="global-nav__item">
                        <a href="<?= get_post_type_archive_link( 'works' ); ?>">Works</a>
                    </li>
                    <li class="global-nav__item">
                        <a href="<?= get_post_type_archive_link( 'news' ); ?>">News</a>
                    </li>
                    <li class="global-nav__item">Contact</li>
                    <li class="global-nav__item">
                        <a href="<?= esc_url( 'https://www.instagram.com/' ); ?>">
                            <img class="global-nav__image"
                                src="<?php echo esc_url( get_stylesheet_directory_uri() ) . '/img/instagram-icon.png'; ?>"
                                alt="instagram" height="20" />
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="main" role="main">
