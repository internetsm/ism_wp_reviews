<?php

add_action('vc_before_init', 'ism_offers_vc_shortcode');

function ism_offers_vc_shortcode($shortcodes)
{
//        -'offset'                  => 0,
//        -'limit'                   => -1,
//        'order_by'                => 'meta_value',
//        'order'                   => 'DESC',
//        -'is_carousel'             => false,
//        -'thumbnail_size'          => 'medium',
//        -'category'                => null,
//        -'category_relation'       => 'AND',
//        -'carousel_columns'        => 3,
//        -'carousel_scroll_columns' => 1,
//        -'carousel_autoplay'       => true,
//        -'carousel_dots'           => true,
//        -'carousel_arrows'         => true,


    vc_map([
        'name'        => "Lista offerte",
        'base'        => 'ism_offers',
        'category'    => "InternetSm",
        'description' => "Lista delle offerte",
        'params'      => [
            [
                'type'        => 'textfield',
                'heading'     => 'Offset',
                'param_name'  => 'offset',
                'value'       => 0,
                'description' => 'Numero di offerte da skippare'
            ],
            [
                'type'        => 'textfield',
                'heading'     => 'Numero massimo risultati',
                'param_name'  => 'limit',
                'value'       => -1,
                'description' => 'Numero massimo di risultati (-1 per "nessun limite")'
            ],
            [
                'type'        => 'textfield',
                'heading'     => 'Dimensione thumbnail immagine',
                'param_name'  => 'thumbnail_size',
                'value'       => 'thumbnail',
                'description' => 'Dimensione thumbnail (thumbnail, medium, large, full, ecc.)'
            ],
            [
                'type'        => 'textfield',
                'heading'     => 'Categoria/e',
                'param_name'  => 'category',
                'value'       => '',
                'description' => ''
            ],
            [
                'type'        => 'dropdown',
                'heading'     => 'Categoria relation query',
                'param_name'  => 'category_relation',
                'value'       => [
                    'AND', 'OR'
                ],
                'description' => ''
            ],
            [
                'type'        => 'checkbox',
                'heading'     => 'Carosello',
                'param_name'  => 'is_carousel',
                'value'       => 1,
                'description' => 'Carosello o listing normale'
            ],
            [
                'type'        => 'dropdown',
                'heading'     => 'Numero colonne carosello',
                'param_name'  => 'carousel_columns',
                'value'       => [
                    1, 2, 3, 4
                ],
                'description' => '',
                'dependency' => [
                    'element' => 'is_carousel',
                    'not_empty' => true,
                ]
            ],
            [
                'type'        => 'dropdown',
                'heading'     => 'Scroll colonne carosello',
                'param_name'  => 'carousel_scroll_columns',
                'value'       => [
                    1, 2, 3, 4
                ],
                'description' => '',
                'dependency' => [
                    'element' => 'is_carousel',
                    'not_empty' => true,
                ]
            ],
            [
                'type'        => 'checkbox',
                'heading'     => 'Autoplay carosello',
                'param_name'  => 'carousel_autoplay',
                'description' => '',
                'value'       => 1,
                'dependency' => [
                    'element' => 'is_carousel',
                    'not_empty' => true,
                ]
            ],
            [
                'type'        => 'checkbox',
                'heading'     => 'Pallini carosello',
                'param_name'  => 'carousel_dots',
                'description' => '',
                'value'       => 1,
                'dependency' => [
                    'element' => 'is_carousel',
                    'not_empty' => true,
                ]
            ],
            [
                'type'        => 'checkbox',
                'heading'     => 'Freccie carosello',
                'param_name'  => 'carousel_arrows',
                'description' => '',
                'value'       => 1,
                'dependency' => [
                    'element' => 'is_carousel',
                    'not_empty' => true,
                ]
            ],
        ]
    ]);
    return $shortcodes;
}
