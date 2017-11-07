<?php


add_action('admin_enqueue_scripts', 'ism_offers_admin_scripts');

function ism_offers_admin_scripts()
{
    wp_enqueue_script('ism_jqueryui', plugin_dir_url(__DIR__) . "assets/vendor/jquery-ui/jquery-ui.min.js");

    wp_enqueue_style('ism_jqueryui_theme', plugin_dir_url(__DIR__) . "assets/vendor/jquery-ui/themes/flick/theme.css");

    wp_enqueue_style('ism_jqueryui_css', plugin_dir_url(__DIR__) . "assets/vendor/jquery-ui/themes/flick/jquery-ui.min.css");

    wp_enqueue_script('ism_offers_js', plugin_dir_url(__DIR__) . "assets/js/ism_offers.js");
}

add_action('wp_enqueue_scripts', 'ism_offers_scripts');

function ism_offers_scripts()
{
    wp_enqueue_style('ism_slick_css', plugin_dir_url(__DIR__) . "assets/vendor/slick-carousel/slick/slick.css");

    wp_enqueue_style('ism_offers_css', plugin_dir_url(__DIR__) . "assets/css/ism_offers.css");

    wp_enqueue_style('ism_slick_theme_css', plugin_dir_url(__DIR__) . "assets/vendor/slick-carousel/slick/slick-theme.css");

    wp_enqueue_script('ism_slick_js', plugin_dir_url(__DIR__) . "assets/vendor/slick-carousel/slick/slick.min.js");

    wp_enqueue_script('ism_app', plugin_dir_url(__DIR__) . "assets/js/ism_offers.js");
}