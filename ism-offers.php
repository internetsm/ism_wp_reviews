<?php
/*
Plugin Name: Ism Offers
Plugin URI: #
Description: Ism Offers
Version: 1.0.0
Author: #
Author URI: #
License: MIT
*/

// https://code.jquery.com/ui/1.12.1/jquery-ui.min.js

require_once "includes/ism-filters-functions.php";
require_once "includes/ism-post-types-functions.php";
require_once "includes/ism-taxonomies-functions.php";
require_once "includes/ism-shortcodes-functions.php";
require_once "includes/ism-enqueue-functions.php";
require_once "includes/ism-hooks.php";
require_once "includes/ism-post-metaboxes-functions.php";
require_once "includes/ism-offers-loop-functions.php";
require_once "includes/ism-columns-functions.php";
require_once "includes/ism-visual-composer-functions.php";

if (!function_exists("ism_get_template")) {

    /**
     * Get template
     *
     * @param $slug
     * @param $args
     * @return string
     * @throws Exception
     */
    function ism_get_template($slug, $args = [])
    {
        $templatePathSelected = null;
        $templatePaths = [
            __DIR__ . "/templates/{$slug}.php",
            get_stylesheet_directory() . "/ism_offers/{$slug}.php",
        ];
        foreach ($templatePaths as $templatePath) {
            if (file_exists($templatePath)) {
                $templatePathSelected = $templatePath;
            }
        }
        if (!$templatePathSelected) {
            throw new Exception("ism_offers template not found");
        }
        ob_start();
        extract($args);
        include $templatePathSelected;
        return ob_get_clean();
    }
}