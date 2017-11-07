<?php
/**
 * Created by PhpStorm.
 * User: michele
 * Date: 23/10/17
 * Time: 12.16
 */

foreach ($offers as $offer){

    ?>

    <div class="offer">
        <img class="offer-image" src="<?php echo $offer['image']; ?>"/>
        <h2 class="offer-title"><?php echo $offer['title']; ?></h2>
        <div class="offer-content"><?php echo substr($offer['description'], 0, 100); ?></div>
    </div>

    <?php

}