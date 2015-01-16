<?php

//$templateparams = $app->getTemplate(true)->params;


//$type = $templateparams->get('style');
$app = JFactory::getApplication();
$menu = $app->getMenu();
$item = $menu->getItem($menu->getActive()->id);
$menu_inner_alias_current = $item->alias;

switch ($menu_inner_alias_current) {
    case 'home-01':
        $class_arrow = 'services-icon-wrap-yellow';
        break;
    case 'home-02':
        $class_arrow = 'services-icon-wrap-red';
        break;
    case 'home-03':
        $class_arrow = 'services-icon-wrap-yellow';
        break;
    case 'home-04':
        $class_arrow = 'services-icon-wrap-green';
        break;
    case 'home-05':
        $class_arrow = 'services-icon-wrap-blue';
        break;
    case 'home-06':
        $class_arrow = 'services-icon-wrap-yellow';
        break;
    case 'home-07':
        $class_arrow = 'services-icon-wrap-yellow';
        break;
    case 'home-08':
        $class_arrow = 'services-icon-wrap-green';
        break;
    case 'home-09':
        $class_arrow = 'services-icon-wrap-yellow';
        break;
    case 'home-10':
        $class_arrow = 'services-icon-wrap-yellow';
        break;
    case 'home-11':
        $class_arrow = 'services-icon-wrap-yellow';
        break;
    case 'home-12':
        $class_arrow = 'services-icon-wrap-yellow';
        break;
}


?>


<!-- page-section : starts -->
<section id="services" class="services page-section" data-stellar-background-ratio="1.7">

    <!-- inner-section : starts -->
    <section class="inner-section add-top">

        <!-- container : starts -->
        <section class="container">
            <div class="row">
                <article class="col-md-12 text-center animated" data-fx="flipInX">
                    <h1 class="main-heading"><?php echo $title; ?></h1>
                    <div class="liner"><span></span></div>
                    <p class="promo-text white-text"><?php echo $description; ?></p>
                </article>
            </div>

            <div class="row">
                <article class="col-md-12 liner-division-light">
                </article>
            </div>

            <div class="row services-icon-wrap  <?php echo $class_arrow; ?>">
                <?php
                foreach ($items as $key => $value) {
                    $extrafield_image = json_decode($value->extra_fields);
                ?>
                    <article id="service-<?php echo $key+1 ?>" class="service-icon <?php echo ($key==0)?"current":""; ?> col-md-3 text-center animated" data-fx="slideInLeft">
                        <a class="customLink" data-sudo-rel="<?php echo $key+1 ?>">
                            <img alt="" title="" src="<?php echo JURI::root().$extrafield_image['2']->value; ?>"/></a>
                        <h5><?php echo $value->title; ?></h5>
                    </article>
                <?php
                }
                ?>
            </div>
        </section>
        <!-- container : ends -->

    </section>
    <!-- inner-section : ends -->

    <!-- inner-section : starts -->
    <section class="inner-section services-expansion">

        <!-- container : starts -->
        <section class="container">
            <ul id="service-slider" >
                <?php
                foreach ($items as $key => $value) {
                    $extrafield = json_decode($value->extra_fields);
                ?>
                <li  class="service-details default" data-service-active-hover="service-<?php echo $key+1;?>">
                    <article class="text-center">
                        <h3 class="sub-heading"><?php echo $value->title; ?></h3>
                        <h5 class="small-heading"><span><?php echo $extrafield['0']->value; ?></span></h5>
                        <p class="black-text"><?php echo $value->introtext; ?></p>
                        <nav class="cl-effect-10 btn-dignity-animated">
                            <a href="<?php echo $extrafield['1']->value; ?>" data-hover="Request quote"><span>Have a project?</span></a>
                        </nav>
                    </article>
                </li>
                <?php
                }
                ?>
            </ul>

        </section>
        <!-- container : ends -->

    </section>
    <!-- inner-section : ends -->

</section>
<!-- page-section : ends -->