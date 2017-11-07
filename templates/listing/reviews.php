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
        <img class="review-image" src="<?php echo $review['image']; ?>"/>
        <h2 class="review-title"><?php echo $review['title']; ?></h2>
        <div class="review-content"><?php echo substr($review['description'], 0, 100); ?></div>
    </div>

    <?php

}