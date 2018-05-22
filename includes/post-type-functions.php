<?php
/**
 * Created by PhpStorm.
 * User: daniele
 * Date: 30/10/17
 * Time: 11.15
 */
add_action('init', 'ism_reviews_custom_post_type_declaration');

/**
 * Register a offer post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function ism_reviews_custom_post_type_declaration()
{
    $labels = array(
        'name'               => "Recensioni",
        'singular_name'      => "Recensione",
        'menu_name'          => "Recensioni",
        'name_admin_bar'     => "Recensione",
        'add_new'            => "Aggiungi recensione",
        'add_new_item'       => "Aggiungi recensione",
        'new_item'           => "Nuova",
        'edit_item'          => "Modifica",
        'view_item'          => "Visualizza",
        'all_items'          => "Tutte",
        'search_items'       => "Cerca",
        'parent_item_colon'  => "Genitori",
        'not_found'          => "Non trovato",
        'not_found_in_trash' => "Non trovato in bidone",
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __('Description.', 'ism-recensioni'),
        'menu_icon'          => 'dashicons-format-status',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => __('reviews', 'ism-recensioni')),
        'capability_type'    => 'post',
        'has_archive'        => apply_filters('ism_reviews_has_archive', true),
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
    );
    register_post_type('ism_reviews', $args);
}