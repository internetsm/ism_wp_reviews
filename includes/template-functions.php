<?php

/**
 * @param $slug
 * @param array $args
 * @return string
 * @throws Exception
 */
function ism_reviews_get_template($slug, $args = [])
{
    $slug = preg_replace("/\.php$/", "", $slug);

    $templatePathSelected = null;
    $templatePaths = [
        ISMRE_TEMPLATE_DIR . DIRECTORY_SEPARATOR . "{$slug}.php",
        get_stylesheet_directory() . "/templates/ism_wp_reviews/{$slug}.php",
        get_stylesheet_directory() . "/templates/ism_reviews/{$slug}.php",
        get_stylesheet_directory() . "/ism_wp_reviews/{$slug}.php",
        get_stylesheet_directory() . "/ism_reviews/{$slug}.php",
    ];
    foreach ($templatePaths as $templatePath) {
        if (file_exists($templatePath)) {
            $templatePathSelected = $templatePath;
        }
    }
    if (!$templatePathSelected) {
        throw new \Exception("ism_reviews_get_template exception - Neither of these templates could be found: " . implode(", ", $templatePaths));
    }
    ob_start();
    extract($args);
    include $templatePathSelected;
    return ob_get_clean();
}