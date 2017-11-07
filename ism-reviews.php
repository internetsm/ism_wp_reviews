<?php
/**
 * Plugin Name: Ism Reviews
 * Plugin URI: #
 * Description: Ism Reviews
 * Version: 1.0.0
 * Author: #
 * Author URI: #
 * License: MIT
 * Created by PhpStorm.
 * User: daniele
 * Date: 30/10/17
 * Time: 10.54
 */

require_once "includes/ism-post-type-register-function.php";
require_once "includes/ism-reviews-metabox-function.php";
require_once "includes/ism-filters-functions.php";
require_once "includes/ism-reviews-columns-functions.php";
require_once "includes/ism-shortcodes-functions.php";
require_once "includes/ism-visual-composer-functions.php";

if (!function_exists("ism_reviews_get_template")) {

    /**
     * Get template
     *
     * @param $slug
     * @param $args
     * @return string
     * @throws Exception
     */
    function ism_reviews_get_template($slug, $args = [])
    {
        $pluginData = get_plugin_data(__FILE__);

        $pluginSlug = $pluginData['Name'];
        $pluginSlug = str_replace(" ", "_", $pluginSlug);
        $pluginSlug = strtolower($pluginSlug);

        $templatePathSelected = null;
        $templatePaths = [
            __DIR__ . "/templates/{$slug}.php",
            get_stylesheet_directory() . "/{$pluginSlug}/{$slug}.php",
        ];
        foreach ($templatePaths as $templatePath) {
            if (file_exists($templatePath)) {
                $templatePathSelected = $templatePath;
            }
        }
        if (!$templatePathSelected) {
            throw new Exception("ism_reviews template not found");
        }
        ob_start();
        extract($args);
        include $templatePathSelected;
        return ob_get_clean();
    }
}