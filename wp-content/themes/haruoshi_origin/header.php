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
	<?php wp_head(); ?>
</head>

<body>
<header class="site-header">
	<h1 class="site-header__logo">My Work</h1>
	<nav>
		<ul class="global-nav">
			<li class="global-nav__item">About</li>
			<li class="global-nav__item">Works</li>
			<li class="global-nav__item">News</li>
			<li class="global-nav__item">Contact</li>
			<li class="global-nav__item">
				<a href="<?php echo esc_url( 'https://www.instagram.com/' ); ?>">
					<img class="global-nav__image" src="<?php echo esc_url( get_stylesheet_directory_uri() ) . '/img/instagram-icon.png'; ?>" alt="instagram" height="20"/>
				</a>
			</li>
		</ul>
	</nav>
</header>
<main class="main" role="main">
