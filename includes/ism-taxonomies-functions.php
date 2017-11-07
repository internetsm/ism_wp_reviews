<?php
/**
 * Created by PhpStorm.
 * User: michele
 * Date: 25/10/17
 * Time: 11.00
 */

add_action("init", "ism_offers_taxonomies");

function ism_offers_taxonomies(){

//    register_taxonomy( 'tipology', 'ism_offer');
    register_taxonomy(
        'ism_offers_category',
        'ism_offer',
        array(
            'label' => "Categoria",
            'rewrite' => array( 'slug' => __("category", "ism_offers") ),
            'hierarchical' => true,
        )
    );

}