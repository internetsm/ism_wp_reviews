<?php
/**
 * Created by PhpStorm.
 * User: daniele
 * Date: 30/10/17
 * Time: 11.39
 */

function ism_reviews_metabox_save()
{
    // name="ism_offers_price"
    // name="ism_offers_price_type"
    // name="ism_offers_price_type"
    // name="ism_offers_treatment">
    // name="ism_offers_date_arrival"
    // name="ism_offers_date_arrival"
    global $post;
    $fields = [
        "ism_reviews_author",
        "ism_reviews_country",
        "ism_reviews_date"
    ];

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            $data = apply_filters("ism_reviews_save_metabox_value", $_POST[$field], $field);
            update_post_meta($post->ID, $field, $data);
        }
    }
}

add_action('save_post', 'ism_reviews_metabox_save');

/**
 *
 *
 */
function ism_reviews_metabox()
{
    add_meta_box('ism_reviews_metabox', 'Campi Tripadvisor', 'ism_reviews_metabox_template', 'ism_reviews', 'side', 'default');
}

add_action('add_meta_boxes', 'ism_reviews_metabox');

/**
 *
 */
function ism_reviews_metabox_template()
{
    global $post;

    $ism_reviews_author = get_post_meta($post->ID, 'ism_reviews_author', true);
    $ism_reviews_country = get_post_meta($post->ID, 'ism_reviews_country', true);
    $ism_reviews_date = get_post_meta($post->ID, 'ism_reviews_date', true);
    $ism_reviews_date = apply_filters("ism_reviews_print_date", $ism_reviews_date);

    echo ism_reviews_get_template("metabox/metabox", [
        'ism_reviews_data' => [
            'author' => $ism_reviews_author,
            'country' => $ism_reviews_country,
            'date' => $ism_reviews_date,
        ]
    ]);
}


