<?php 
defined('_JEXEC') or die;
?>
<!-- thumb-carousel : starts -->
<div id="thumb-carousel" class="owl-carousel">
    <?php
    foreach($ig_new_array as $item){
        //var_dump($item);
    ?>
    <div class="item animated" data-fx="bounceInDown">
        <a class="image-lightbox-link" href="<?php echo trim($item['content']); ?>">
            <img alt="" title="" class="img-responsive" src="<?php echo trim($item['content']); ?>"/>
            <div class="thumb-title"><h5><span><?php echo $item['title']; ?></span></h5></div>
        </a>
    </div>
    <?php } ?>
</div>
<!-- thumb-carousel : ends -->