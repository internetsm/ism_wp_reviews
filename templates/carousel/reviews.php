<?php
/**
 * Created by PhpStorm.
 * User: michele
 * Date: 23/10/17
 * Time: 12.16
 */

?>

<ul class="slick-carousel" data-columns="<?php echo $carousel['columns']; ?>" data-scroll-columns="<?php echo $carousel['scroll_columns']; ?>" data-autoplay="<?php echo $carousel['autoplay']; ?>" data-arrows="<?php echo $carousel['arrows']; ?>" data-dots="<?php echo $carousel['dots']; ?>">
<?php foreach ($reviews as $review){
    ?>
    <li class="review columns-<?php echo $carousel['columns']; ?>">
        <img class="review-image" src="<?php echo $review['image']; ?>"/>
        <h2 class="review-title"><?php echo $review['title']; ?></h2>
        <div class="review-content"><?php echo substr($review['description'], 0, 100); ?></div>
        <button></button>
    </li>
    <?php
} ?>

</ul>
