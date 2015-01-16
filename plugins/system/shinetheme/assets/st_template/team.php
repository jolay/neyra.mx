<!-- page-section : starts -->
<section id="team" class="team page-section add-top add-bottom">

    <!-- inner-section : starts -->
    <section class="inner-section">

        <!-- container : starts -->
        <section class="container">

            <div class="row">
                <article class="col-md-12 text-center">
                    <?php if($title){ ?>
                        <h1 class="main-heading main-heading-alt"><?php echo $title; ?></h1>
                    <?php } ?>
                    <div class="liner"><span></span></div>
                    <?php if($description) { ?>
                    <p class="promo-text dark-text"><?php echo $description; ?></p>
                    <?php } ?>
                </article>
            </div>

            <div class="row">
                <article class="col-md-12 liner-division-light">
                </article>
            </div>


        </section>
        <!-- container : ends -->

        <!-- container : starts -->
        <section class="container hide-on-mobile-only">
            <div class="row">
                <?php
                foreach ($items as $key => $value) {
                $extrafield_image = json_decode($value->extra_fields);
                ?>
                    <?php if($extrafield_image['0']->value){ ?>
                        <article class="col-md-3 text-center">
                            <img alt="" title="" class="img-responsive animated" data-fx="bounceInDown" src="<?php echo JURI::root().$extrafield_image['0']->value; ?>"/>
                        </article>
                    <?php } ?>
                <?php
                }
                ?>
            </div>
        </section>
        <!-- container : ends -->


    </section>
    <!-- inner-section : ends -->



    <!-- inner-section : starts -->
    <section class="inner-section team-info-wrap">

        <!-- container : starts -->
        <section class="container">
            <div class="row">
                <?php
                foreach ($items as $key => $value) {
                    $extrafield = json_decode($value->extra_fields);
                ?>
                    <article class="col-md-3 text-center">
                        <div class="team-info animated" data-fx="bounceInUp">
                            <?php if($extrafield['0']->value){ ?>
                            <img alt="" title="" class="img-responsive animated show-on-mobile-only" data-fx="bounceInDown" src="<?php echo JURI::root().$extrafield['0']->value; ?>"/>
                            <?php } ?>
                            <?php if($value->title){ ?>
                            <h3><?php echo $value->title; ?></h3>
                            <?php } ?>

                            <div class="liner-small"><span></span></div>
                            <?php if($extrafield['1']->value){ ?>
                            <h5><span><?php echo $extrafield['1']->value; ?></span></h5>
                            <?php } ?>
                            <?php if($value->introtext){ ?>
                            <p><?php echo $value->introtext; ?></p>
                            <?php } ?>
                            <ul class="team-social clearfix">
                                <?php if($extrafield['2']->value == ''){ $extrafield['2']->value ='#';} ?>
                                <?php if($extrafield['3']->value == ''){ $extrafield['3']->value ='#';} ?>
                                <?php
                                    $app = JFactory::getApplication();
                                    $templateDir = JURI::base() . 'templates/' . $app->getTemplate();
                                ?>
                                <li><a href="<?php echo $extrafield['2']->value; ?>"><img alt="" title="" src="<?php echo $templateDir; ?>/images/social/01.png"/></a></li>
                                <li><a href="<?php echo $extrafield['3']->value; ?>"><img alt="" title="" src="<?php echo $templateDir; ?>/images/social/02.png"/></a></li>
                            </ul>
                        </div>
                    </article>

                <?php } ?>

            </div>
        </section>
        <!-- container : ends -->


    </section>
    <!-- inner-section : ends -->

</section>
<!-- page-section : ends -->