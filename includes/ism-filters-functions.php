<?php
/**
 * Created by PhpStorm.
 * User: michele
 * Date: 23/10/17
 * Time: 12.57
 */

add_filter('ism_reviews_save_metabox_value', function ($value, $field){

    switch ($field){
        case "ism_reviews_date":
            $date = DateTime::createFromFormat("d-m-Y", $value);
            if (!empty($date)) {
                return $date->getTimestamp();
            }
            break;
    }
    return $value;
}, 10, 2);

add_filter('ism_reviews_print_date', function ($value){
    if(!empty($value)) {
        $value = date("d-m-Y", $value);
    }
    return $value;
}, 10, 1);

add_filter('ism_reviews_convert_readable', function ($value){
    if(!empty($value)) {
        $value = str_replace('_', ' ', $value);
    }
    return $value;
}, 10, 1);