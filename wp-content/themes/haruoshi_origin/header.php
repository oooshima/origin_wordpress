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
	<h1>My Work</h1>
	<nav>
		<ul class="global-nav">
			<li>About</li>
			<li>Works</li>
			<li>News</li>
			<li>Contact</li>
			<li><img src="<?php echo esc_url( get_stylesheet_directory_uri() ) . '/img/instagram-icon.png'; ?>" alt="instagram" width=20px></img></li>
		</ul>
	</nav>
</header>
<main class="main" role="main">
