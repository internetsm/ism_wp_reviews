<?php
/**
 * Created by PhpStorm.
 * User: daniele
 * Date: 30/10/17
 * Time: 12.06
 */
?>
<div>
    <div>
        <label><strong>Autore</strong></label>
    </div>
    <div>
        <input value="<?php echo $ism_reviews_data['author']; ?>" type="text" name="ism_reviews_author"/>
    </div>
</div>

<br/>

<div>
    <div>
        <label><strong>Località</strong></label>
    </div>
    <div>
            <input value="<?php echo $ism_reviews_data['country']; ?>" type="text" name="ism_reviews_country"/>
    </div>
</div>
<br/>

<div>
    <div>
        <label><strong>Data</strong></label>
    </div>
    <div>
        <input value="<?php echo $ism_reviews_data['date']; ?>" class="datepicker" id="datepicker-arrival"
               type="text"
               name="ism_reviews_date"/>
    </div>
</div>
<br/>

<div>
    <div>
        <label><strong>Stelle</strong></label>
    </div>
    <div>
        <input value="<?php echo $ism_reviews_data['stars']; ?>" class="stars" id="stars"
               type="text"
               name="ism_reviews_stars"/>
    </div>
</div>
<br/>