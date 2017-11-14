<?php
/**
 * Created by PhpStorm.
 * User: michele
 * Date: 23/10/17
 * Time: 12.16
 */

foreach ($reviews as $review){

    ?>

    <div class="review">
        <?php
        $stars = $review['stars'];
        $starsStamp = "";
        for($i = 0s; $i < $stars; $i++){
            $starsStamp .= "<span class=\"vc_icon_element-icon fa fa-star\">";
        }
        ?>
        <h2 class="review-title"><?php echo $review['title']; ?></h2>
        <div class="review-content"><?php echo $starsStamp; ?></div>
        <div class="review-content"><?php echo $review['description']; ?></div>
        <div class="review-author"><?php echo $review['author']; ?></div>
        <div class="review-location"><?php echo $review['country']; ?></div>
    </div>

    <?php

}