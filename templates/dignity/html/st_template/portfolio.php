<!-- page-section : starts -->


<!-- inner-section : starts -->
<section class="inner-section">

    <!-- container : starts -->
    <section class="container">

        <div class="row">
            <article class="col-md-12 text-center">
                <h1 class="main-heading main-heading-alt"><?php echo $title; ?></h1>
                <div class="liner"><span></span></div>
                <p class="promo-text dark-text"><?php echo $description; ?></p>
            </article>
        </div>

        <div class="row">
            <article class="col-md-12 liner-division">
            </article>
        </div>

    </section>
    <!-- container : ends -->
</section>
<!-- inner-section : ends -->

<!-- inner-section : starts -->
<section class="inner-section">

    <!-- Container element for a single portfolio item. Do not remove! -->
    <div id="item_container" class="clearfix"></div>

    <!-- Filter -->
    <div id="filter" class="clearfix">
        <div id="filter_wrapper">
            <ul id="portfolioFilter">
                <li class="filter" data-filter="all">All</li>
                <?php foreach($tags as $key=> $tag){ ?>
                    <li class="filter" data-filter="<?php echo strtolower(str_replace(" ","_",$tag)); ?>"><?php echo $tag; ?></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <!-- End: Filter -->


    <section id="portfolio-wrap">

        <!-- Thumbnails -->
        <div id="portfolio_thumbs">

            <ul id="grid" class="sortablePortfolio clearfix">

                <?php
                    foreach($catItems as $key=> $item){

                    $tag_name = array();
                    foreach ($K2ModelItem->getItemTags($item->id) as $itm=>$tag_item) {
                        $tName = str_replace(" ", "_", $tag_item->name);
                        $tag_name[] = strtolower($tName);
                    }
                    $filter= implode(" ", $tag_name);

                    $extrafield = json_decode($item->extra_fields);

                ?>

                    <!-- 1st thumb -->
                    <li class="mix <?php echo $filter; ?> animated" data-fx="flipInX">
                        <!-- Thumbnail -->
                        <img src="<?php echo $st->getImageK2($item->id,'S') ?>" alt="" title="" />
                        <!-- Info -->
                        <?php if(trim($extrafield['0']->value)){ ?>
                        <a href="<?php echo trim($extrafield['0']->value); ?>"  data-gal="prettyPhoto[gallery]">
                        <?php } else{ ?>
                            <a href="<?php echo 'index.php?option=com_k2&view=item&id='.$item->id.'&tmpl=component'; ?>" class="more_info">
                        <?php } ?>
                            <div class="item_info">
                                <h3><span><?php echo $item->title; ?></span></h3>
                                <p><span><?php echo $tag_item->name; ?></span></p>
                            </div>
                        </a>
                    </li>
                <?php } ?>

            </ul>

        </div>
        <!-- End: Thumbnails -->


    </section>
    <!-- End: Portfolio Wrap -->


</section>
<!-- inner-section : ends-->





<!-- page-section : ends -->