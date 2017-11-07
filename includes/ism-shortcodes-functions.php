<?php
/**
 * Created by PhpStorm.
 * User: michele
 * Date: 23/10/17
 * Time: 10.23
 */

add_shortcode('ism_offers', 'ism_shortcode_offers');

function ism_shortcode_offers($atts, $content = "")
{
    if (!is_array($atts)) {
        $atts = [];
    }

    $defaultAtts = [
        'offset'                  => 0,
        'limit'                   => -1,
        'order_by'                => 'meta_value',
        'order'                   => 'DESC',
        'is_carousel'             => false,
        'thumbnail_size'          => 'medium',
        'has_button'              => true,
        'category'                => null,
        'category_relation'       => 'AND',
        'carousel_columns'        => 3,
        'carousel_scroll_columns' => 1,
        'carousel_autoplay'       => true,
        'carousel_dots'           => true,
        'carousel_arrows'         => true,
        'carousel_infinite'       => true,
    ];

    $atts = array_merge($defaultAtts, $atts);

    $queryArguments = [
        'posts_per_page' => $atts['limit'],
//        'orderby'        => $atts['order_by'],
//        'order'          => $atts['order'],
        'offset'         => $atts['offset'],
        'post_type'      => 'ism_offer',
        'meta_query'     => array(
            array(
                'key'     => 'ism_offers_date_departure',
                'value'   => strtotime("now"),
                'compare' => '>=',
                'type'    => 'NUMERIC'
            )
        ),
    ];

    if (!is_null($atts['category'])) {

        $taxQuery = [
            'relation' => $atts['category_relation'],
        ];

        if (!is_array($atts['category'])) {
            $atts['category'] = [
                $atts['category']
            ];
        }

        foreach ($atts['category'] as $categoryValue) {
            $taxQuery[] = [
                'taxonomy' => 'ism_offers_category',
                'field'    => is_int($categoryValue) ? 'id' : 'slug',
                'terms'    => [
                    $categoryValue
                ],
                'operator' => 'IN'
            ];
        }
        $queryArguments['tax_query'] = $taxQuery;
    }

    $query = new Wp_Query($queryArguments);

    $posts = $query->get_posts();

    $offers = [];

    foreach ($posts as $post) {

        $price = get_post_meta($post->ID, 'ism_offers_price', true);

        $priceType = get_post_meta($post->ID, 'ism_offers_price_type', true);

        $treatment = get_post_meta($post->ID, 'ism_offers_treatment', true);

        $arrivalDate = get_post_meta($post->ID, 'ism_offers_date_arrival', true);

        $departureDate = get_post_meta($post->ID, 'ism_offers_date_departure', true);

        $image = get_the_post_thumbnail_url($post->ID, $atts['thumbnail_size']);

        $offer = [
            'title'          => $post->post_title,
            'description'    => $post->post_content,
            'price'          => $price,
            'price_type'     => $priceType,
            'treatment'      => $treatment,
            'arrival_date'   => $arrivalDate,
            'departure_date' => $departureDate,
            'image'          => $image,
        ];

        $offers[] = $offer;
    }

    if (!$atts['is_carousel']) {
        return ism_get_template('listing/offers', [
            'offers' => $offers
        ]);
    } else {
        return ism_get_template('carousel/offers', [
            'offers'   => $offers,
            'carousel' => [
                'autoplay'       => $atts['carousel_autoplay'],
                'columns'        => $atts['carousel_columns'],
                'scroll_columns' => $atts['carousel_scroll_columns'],
                'dots'           => $atts['carousel_dots'],
                'arrows'         => $atts['carousel_arrows'],
                'infinite'       => $atts['carousel_infinite'],
            ]
        ]);
    }
}