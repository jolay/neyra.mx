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
    $doc->addStyleSheet($url.'stylesheets/home01.css');
    $doc->addStyleSheet($url.'stylesheets/main.css');
    $doc->addStyleSheet($url.'stylesheets/main-responsive.css');
    $doc->addStyleSheet($url.'stylesheets/main-retina.css');


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
    $doc->addScript($url.'javascripts/jquery.tweet.js');
    $doc->addScript($url.'javascripts/jquery.stellar.js');
    $doc->addScript($url.'javascripts/smooth-scroll.js');
    $doc->addScript($url.'javascripts/jquery.appear.js');
    $doc->addScript($url.'javascripts/mb.bgndGallery.js');
    $doc->addScript($url.'javascripts/simple-text-rotator-init.js');
    $doc->addScript($url.'javascripts/sudoslider-touch-init.js');
    $doc->addScript($url.'javascripts/portfolio.js');
    $doc->addScript($url.'javascripts/form-validation.js');
    $doc->addScript($url.'javascripts/animate-init.js');
    $doc->addScript($url.'javascripts/bgslider-zoom-init.js');
    $doc->addScript($url.'javascripts/main.js');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <jdoc:include type="head" />
	
    <!-- Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo $url; ?>bootstrap/js/html5shiv.js"></script>
    <script src="<?php echo $url; ?>bootstrap/js/respond.min.js"></script>
    <![endif]-->

    <!-- Modernizr Library-->
    <script src="javascripts/modernizr.custom.js"></script>

    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $url; ?>images/touchicons/apple-touch-icon-57-precomposed" />
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $url; ?>assets/touchicons/apple-touch-icon-114-precomposed" />
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $url; ?>assets/touchicons/apple-touch-icon-72-precomposed" />
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $url; ?>assets/touchicons/apple-touch-icon-144-precomposed" />

</head>

<body class="<?php echo $this->params->get('class',''); ?>">

    <jdoc:include type="modules" name="home" style="none" />

    <?php if($this->countModules('debug')){ ?>
        <jdoc:include type="modules" name="debug" style="none" />
    <?php } ?>

</body>
</html>
