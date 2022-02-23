<?php
function enqueue_style()
{
    wp_enqueue_style('reset-style', get_stylesheet_directory_uri() . '/css/destyle.css');
    wp_enqueue_style('main-style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'enqueue_style');
