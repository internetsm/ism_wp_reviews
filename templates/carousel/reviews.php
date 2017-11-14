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
        $stars = $review['stars'];
        $starsStamp = "";
        for($i = 0; $i < $stars; $i++){
            $starsStamp .= '<span class="white vc_icon_element-icon fa fa-star">';
        }
    ?>
    <li class="review columns-<?php echo $carousel['columns']; ?>">
        <h2 class="review-title"><?php echo $review['title']; ?></h2>
        <div class="review-stars"><?php echo $starsStamp; ?></div>
        <div class="review-content"><?php echo substr($review['description'], 0, 100); ?></div>
        <div class="review-author"><?php echo $review['author']; ?></div>
        <button></button>
    </li>
    <?php
} ?>

</ul>
