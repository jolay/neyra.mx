<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Getting params from template
$params = JFactory::getApplication()->getTemplate(true)->params;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->getCfg('sitename');

$url = $this->baseurl.'/templates/' .$this->template.'/';
//JHtml::_('bootstrap.framework');

// Logo
if($this->params->get('logoFile','')==''){
    $linkimage = $url.'images/logo.png';
}else{
    $linkimage = JURI::root(true).'/'.$params->get('logoFile');
}


$type = $this->params->get('style');
$menu_inner_alias_current = '';
$color = str_replace("#", "", $this->params->get('color','ffd600'));


$menu = $app->getMenu();
if ($menu->getActive() != $menu->getDefault()) {
    $item = $menu->getItem($menu->getActive()->id);
    $menu_inner_alias_current = $item->alias;
    $pageparam_sfx = $menu->getActive()->params->get('pageclass_sfx');
}

switch ($menu_inner_alias_current) {
    case 'home-01':
        $type = 'home01';
        if($color == 'ffd600'){
            $color = 'ffd600';
        }
        break;
    case 'home-02':
        $type = 'home02';
        if($color == 'ffd600'){
            $color = 'ee3b16';
        }
        break;
    case 'home-03':
        $type = 'home03';
        if($color == 'ffd600'){
            $color = 'ffd600';
        }
        break;
    case 'home-04':
        $type = 'home04';
        if($color == 'ffd600'){
            $color = '1ebc85';
        }
        break;
    case 'home-05':
        $type = 'home05';
        if($color == 'ffd600'){
            $color = '4682b4';
        }
        break;
    case 'home-06':
        $type = 'home06';
        if($color == 'ffd600'){
            $color = 'ffd600';
        }
        break;
    case 'home-07':
        $type = 'home07';
        if($color == 'ffd600'){
            $color = 'ffd600';
        }
        break;
    case 'home-08':
        $type = 'home08';
        if($color == 'ffd600'){
            $color = '1ebc85';
        }
        break;
    case 'home-09':
        $type = 'home09';
        if($color == 'ffd600'){
            $color = 'ffd600';
        }
        break;
    case 'home-10':
        $type = 'home10';
        if($color == 'ffd600'){
            $color = 'ffd600';
        }
        break;
    case 'home-11':
        $type = 'home11';
        if($color == 'ffd600'){
            $color = 'ffd600';
        }
        break;
    case 'home-12':
        $type = 'home12';
        if($color == 'ffd600'){
            $color = 'ffd600';
        }
        break;
}



// Add CSS

    $doc->addStyleSheet($url.'bootstrap/css/bootstrap.css');
    $doc->addStyleSheet($url.'bootstrap/css/bootstrap-theme.css');
    $doc->addStyleSheet($url.'fonts/fonts.css');
    $doc->addStyleSheet($url.'stylesheets/pace.preloader.css');
    $doc->addStyleSheet($url.'stylesheets/slidingmenu.css');
    $doc->addStyleSheet($url.'stylesheets/simpletextrotator.css');
    $doc->addStyleSheet($url.'stylesheets/animated-buttons.css');
    $doc->addStyleSheet($url.'stylesheets/owl.carousel.css');
    $doc->addStyleSheet($url.'stylesheets/owl.theme.css');
    $doc->addStyleSheet($url.'stylesheets/prettyPhoto.css');
    $doc->addStyleSheet($url.'stylesheets/magnific-popup.css');
    $doc->addStyleSheet($url.'stylesheets/jquery.tweet.css');
    $doc->addStyleSheet($url.'stylesheets/animate.css');
    $doc->addStyleSheet($url.'stylesheets/effects.css');

    if($pageparam_sfx != 'single'){
        $doc->addStyleSheet($url.'stylesheets/'.$type.'.css');
    }else if ($pageparam_sfx == 'single'){
        $doc->addStyleSheet($url.'stylesheets/home07.css');
    }





    $doc->addStyleSheet($url.'stylesheets/main.css');
    $doc->addStyleSheet($url.'stylesheets/main-responsive.css');
    $doc->addStyleSheet($url.'stylesheets/main-retina.css');
    $doc->addStyleSheet($url.'stylesheets/custom.css');


// Add JS
    $doc->addScript($url.'bootstrap/js/jquery.js');
    $doc->addScript($url.'javascripts/jquery.easing.1.3.js');
    $doc->addScript($url.'bootstrap/js/bootstrap.js');
    $doc->addScript($url.'javascripts/pace.min.js');
    $doc->addScript($url.'javascripts/retina.js');
    $doc->addScript($url.'javascripts/classie.js');
    $doc->addScript($url.'javascripts/slidingmenu.js');
    $doc->addScript($url.'javascripts/jquery.simple-text-rotator.js');
    $doc->addScript($url.'javascripts/waypoints.min.js');
    $doc->addScript($url.'javascripts/jquery.touchSwipe.js');
    $doc->addScript($url.'javascripts/jquery.sudoSlider.designova.js');
    $doc->addScript($url.'javascripts/owl.carousel.js');
    $doc->addScript($url.'javascripts/jquery.mixitup.js');
    $doc->addScript($url.'javascripts/flexslider.js');
    $doc->addScript($url.'javascripts/prettyPhoto.js');
    $doc->addScript($url.'javascripts/jquery.magnific-popup.js');

    $doc->addScript($url.'javascripts/jquery.stellar.js');
    $doc->addScript($url.'javascripts/smooth-scroll.js');
    $doc->addScript($url.'javascripts/jquery.appear.js');

    if($type != 'home11'){
    $doc->addScript($url.'javascripts/mb.bgndGallery.js');
    }
    $doc->addScript($url.'javascripts/simple-text-rotator-init.js');
    $doc->addScript($url.'javascripts/sudoslider-touch-init.js');
    $doc->addScript($url.'javascripts/portfolio.js');
    $doc->addScript($url.'javascripts/form-validation.js');
    $doc->addScript($url.'javascripts/animate-init.js');

    if($type == 'home11'){
        $doc->addScript($url.'javascripts/okvideo.js');
        $doc->addScript($url.'javascripts/device.min.js');
    }
    if($type == 'home10'){
        $doc->addScript($url.'javascripts/jquery.mb.YTPlayer.js');
        $doc->addScript($url.'javascripts/device.min.js');
    }

    if($type == 'home09'){
        $doc->addScript($url.'javascripts/jquery.mb.flickr.js');
    }
    if($type == 'home05'){
        $doc->addScript($url.'javascripts/standard-nav-init.js');
    }


    //elseif ($type == 'home02') {
//        $doc->addScript($url.'javascripts/bgslider-fade-init.js');
//    } elseif ($type == 'home04') {
//        $doc->addScript($url.'javascripts/bgslider-slide-right-init.js');
//    }


    $doc->addScript($url.'javascripts/main.js');
    $doc->addScript($url.'less/less-1.5.0.min.js');
    $doc->addScript(STPLUGIN.'js/jquery.validate.js');

    // Modernizr Library
    $doc->addScript($url.'javascripts/modernizr.custom.js');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />


    <link rel="stylesheet/less" type="text/css" href="<?php echo $url; ?>less/color.php?color=<?php echo  $color; ?>">

    <jdoc:include type="head" />
	
    <!-- Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo $url; ?>bootstrap/js/html5shiv.js"></script>
    <script src="<?php echo $url; ?>bootstrap/js/respond.min.js"></script>
    <![endif]-->

    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $url; ?>images/touchicons/apple-touch-icon-57-precomposed" />
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $url; ?>assets/touchicons/apple-touch-icon-114-precomposed" />
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $url; ?>assets/touchicons/apple-touch-icon-72-precomposed" />
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $url; ?>assets/touchicons/apple-touch-icon-144-precomposed" />
    <link rel="">
</head>

<body>


<!-- Sliding Navigation : starts -->
<jdoc:include type="modules" name="background" style="none" />
<jdoc:include type="modules" name="st-menu" style="none" />


<!-- Sliding Navigation : ends -->

<section id="mastwrap" class="sliding">
    <!-- masthead : starts -->
    <header id="masthead" class="clearfix <?php if($type == 'home01'){ echo 'trans-header'; } ?>">
        <h1 class="logo   <?php if($type == 'home05'){ echo 'standard-spacing';} ?>">

            <?php if($this->params->get('logoFile')){ ?>
                <img src="<?php echo JURI::root().$this->params->get('logoFile'); ?>" alt="" title="" />
            <?php } else{ ?>
                <?php if($this->params->get('logoname')){ ?>
                    <?php echo $this->params->get('logoname'); ?>
                <?php } ?>
            <?php } ?>
        </h1>

        <?php
            if($type == 'home05'){
        ?>
                <jdoc:include type="modules" name="st-menu-2" style="none" />
        <?php
            }
        ?>

    </header>
    <!-- masthead : ends -->

    <jdoc:include type="message" />
    <jdoc:include type="component" />
    <?php if($this->countModules('debug')){ ?>
        <jdoc:include type="modules" name="debug" style="none" />
    <?php } ?>
</section>

</body>
</html>
