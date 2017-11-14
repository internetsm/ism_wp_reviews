<?php
/**
 * Created by PhpStorm.
 * User: michele
 * Date: 25/10/17
 * Time: 11.43
 */

add_filter('manage_ism_reviews_posts_columns', 'ism_reviews_columns');

function ism_reviews_columns($columns)
{

    // name="ism_reviews_price"
    // name="ism_reviews_price_type"
    // name="ism_reviews_price_type"
    // name="ism_reviews_treatment">
    // name="ism_reviews_date_arrival"
    // name="ism_reviews_date_departure"

    $new_columns = array(
        'ism_reviews_author'          => "Autore",
        'ism_reviews_country'     => "Paese",
        'ism_reviews_date'      => "Data",
    );
    unset($columns['author']);
    unset($columns['comments']);
    unset($columns['categories']);
    unset($columns['tags']);
    return array_merge($columns, $new_columns);
}

add_action('manage_ism_reviews_posts_custom_column', 'ism_reviews_manage_columns', 10, 2);

function ism_reviews_manage_columns($column, $post_id)
{


    $data = [
        'ism_reviews_author'     => get_post_meta($post_id, 'ism_reviews_author', true),
        'ism_reviews_country'      => get_post_meta($post_id, 'ism_reviews_country', true),
        'ism_reviews_date'   => apply_filters("ism_reviews_print_date", get_post_meta($post_id, 'ism_reviews_date', true))
    ];

    echo $data[$column];

}