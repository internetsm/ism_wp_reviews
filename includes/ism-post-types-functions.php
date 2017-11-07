<?php
/**
 * Created by PhpStorm.
 * User: michele
 * Date: 19/10/17
 * Time: 15.38
 */

add_action('init', 'ism_offers_custom_post_type_declaration');

/**
 * Register a offer post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function ism_offers_custom_post_type_declaration()
{
    $labels = array(
        'name'               => "Offerte",
        'singular_name'      => "Offerta",
        'menu_name'          => "Offerte",
        'name_admin_bar'     => "Offerta",
        'add_new'            => "Aggiungi",
        'add_new_item'       => "Aggiungi",
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
        'description'        => __('Description.', 'your-plugin-textdomain'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'offer'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
    );
    register_post_type('ism_offer', $args);
}