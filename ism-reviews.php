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

define("ISMRE_ROOT_DIR", __DIR__);
define("ISMRE_ROOT_FILE", __FILE__);
define("ISMRE_ROOT_URL", plugin_dir_url(ISMRE_ROOT_FILE));
define("ISMRE_TEMPLATE_DIR", ISMRE_ROOT_DIR . DIRECTORY_SEPARATOR . "templates");
define("ISMRE_ASSETS_URL", ISMRE_ROOT_URL . "/" . "assets");

require_once "includes/template-functions.php";
require_once "includes/post-type-functions.php";
require_once "includes/metabox-functions.php";
require_once "includes/filters-functions.php";
require_once "includes/columns-functions.php";
require_once "includes/shortcodes-functions.php";
require_once "includes/visual-composer-functions.php";