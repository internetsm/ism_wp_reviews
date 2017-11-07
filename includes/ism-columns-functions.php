<?php
/**
 * Created by PhpStorm.
 * User: michele
 * Date: 25/10/17
 * Time: 11.43
 */

add_filter('manage_ism_offer_posts_columns', 'ism_offers_columns');

function ism_offers_columns($columns)
{

    // name="ism_offers_price"
    // name="ism_offers_price_type"
    // name="ism_offers_price_type"
    // name="ism_offers_treatment">
    // name="ism_offers_date_arrival"
    // name="ism_offers_date_departure"

    $new_columns = array(
        'ism_offers_price'          => "Prezzo",
        'ism_offers_price_type'     => "Tipologia prezzo",
        'ism_offers_treatment'      => "Trattamento",
        'ism_offers_date_arrival'   => "Data arrivo",
        'ism_offers_date_departure' => "Data partenza",
        'ism_offers_categories'     => "Categorie",
        'ism_offers_thumbnail'      => "Immagine",
    );
    unset($columns['author']);
    unset($columns['comments']);
    unset($columns['categories']);
    unset($columns['tags']);
    return array_merge($columns, $new_columns);
}

add_action('manage_ism_offer_posts_custom_column', 'ism_offers_manage_columns', 10, 2);

function ism_offers_manage_columns($column, $post_id)
{

    $translations = [
        "price_night"       => "Prezzo per notte",
        "price_flat"        => "Prezzo forfettario",
        "all_inclusive"     => "All Inclusive",
        "fullboard"         => "Pensione completa",
        "halfboard"         => "Mezza pensione",
        "bed_and_breakfast" => "Bed & Breakfast",
    ];

    $dateDeparture = get_post_meta($post_id, 'ism_offers_date_departure', true);
    $valid = ($dateDeparture >= strtotime("now"));
    $color = ($valid ? "green" : "red");

    $categories = array_map(function ($term){
        return $term->name;
    }, wp_get_post_terms($post_id, 'ism_offers_category'));

    $data = [
        'ism_offers_price'          => sprintf("%s €", get_post_meta($post_id, 'ism_offers_price', true)),
        'ism_offers_price_type'     => $translations[get_post_meta($post_id, 'ism_offers_price_type', true)],
        'ism_offers_treatment'      => $translations[get_post_meta($post_id, 'ism_offers_treatment', true)],
        'ism_offers_date_arrival'   => apply_filters("ism_offers_print_date", get_post_meta($post_id, 'ism_offers_date_arrival', true)),
        'ism_offers_date_departure' => sprintf("<span style='color: %s;'>%s</span>",
            $color,
            apply_filters("ism_offers_print_date", $dateDeparture)
        ),
        'ism_offers_categories'     => implode(", ", $categories),
        'ism_offers_thumbnail'      => sprintf("<img src='%s'/>", get_the_post_thumbnail_url($post_id, 'thumbnail')),
    ];

    echo $data[$column];

}