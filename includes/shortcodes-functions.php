<?php
/**
 * Created by PhpStorm.
 * User: michele
 * Date: 23/10/17
 * Time: 10.23
 */

add_shortcode('ism_reviews', 'ism_shortcode_reviews');

function ism_shortcode_reviews($atts, $content = "")
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
        'carousel_columns'        => 1,
        'carousel_columns_tablet' => 1,
        'carousel_columns_mobile' => 1,
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
        'post_type'      => 'ism_reviews',
    ];

    if (!is_null($atts['category'])) {

        $taxQuery = [
            'relation' => $atts['category_relation'],
        ];

        if (!is_array($atts['category'])) {
            $atts['category'] = [
                $atts['category'],
            ];
        }

        foreach ($atts['category'] as $categoryValue) {
            $taxQuery[] = [
                'taxonomy' => 'ism_offers_category',
                'field'    => is_int($categoryValue) ? 'id' : 'slug',
                'terms'    => [
                    $categoryValue,
                ],
                'operator' => 'IN',
            ];
        }
        $queryArguments['tax_query'] = $taxQuery;
    }

    $query = new Wp_Query($queryArguments);

    $posts = $query->get_posts();

    $reviews = [];

    foreach ($posts as $post) {

        $date = get_post_meta($post->ID, 'ism_reviews_date', true);

        $author = get_post_meta($post->ID, 'ism_reviews_author', true);

        $country = get_post_meta($post->ID, 'ism_reviews_country', true);

        $stars = get_post_meta($post->ID, 'ism_reviews_stars', true);

        $review = [
            'id'          => $post->ID,
            'title'       => $post->post_title,
            'description' => $post->post_content,
            'date'        => $date,
            'author'      => $author,
            'country'     => $country,
            'stars'       => $stars,
            'url'         => get_permalink($post->ID),
        ];

        $reviews[] = $review;
    }

    if (!$atts['is_carousel']) {
        return ism_reviews_get_template('listing/reviews', [
            'reviews' => $reviews,
        ]);
    } else {
        return ism_reviews_get_template('carousel/reviews', [
            'reviews'  => $reviews,
            'carousel' => [
                'autoplay'       => $atts['carousel_autoplay'],
                'columns'        => $atts['carousel_columns'],
                'columns_tablet' => $atts['carousel_columns_tablet'],
                'columns_mobile' => $atts['carousel_columns_mobile'],
                'scroll_columns' => $atts['carousel_scroll_columns'],
                'dots'           => $atts['carousel_dots'],
                'arrows'         => $atts['carousel_arrows'],
                'infinite'       => $atts['carousel_infinite'],
            ],
        ]);
    }
}