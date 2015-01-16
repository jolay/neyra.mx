<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$app = JFactory::getApplication();
$templateparams = $app->getTemplate(true)->params;


$type = $templateparams->get('style');
$menu_inner_alias_current = '';

$menu = $app->getMenu();
if ($menu->getActive() != $menu->getDefault()) {
    $item = $menu->getItem($menu->getActive()->id);
    $menu_inner_alias_current = $item->alias;
}

$class_menu = '';

switch ($menu_inner_alias_current) {
    case 'home-01':
        $type = 'home01';
        break;
    case 'home-02':
        $type = 'home02';
        break;
    case 'home-03':
        $type = 'home03';
        break;
    case 'home-04':
        $type = 'home04';
        break;
    case 'home-05':
        $type = 'home05';
        $class_menu = 'visible-xs visible-sm visible-md';
        break;
    case 'home-06':
        $type = 'home06';
        break;
    case 'home-07':
        $type = 'home07';
        break;
    case 'home-08':
        $type = 'home08';
        break;
    case 'home-09':
        $type = 'home09';
        break;
    case 'home-10':
        $type = 'home10';
        break;
    case 'home-11':
        $type = 'home11';
        break;
    case 'home-12':
        $type = 'home02';
        break;
}



// Note. It is important to remove spaces between elements.
?>
<?php // The menu class is deprecated. Use nav instead. ?>


<nav class="menu <?php echo $class_menu; ?>" id="sm">
    <div class="sm-wrap">
        <h1 class="sm-logo">
            <?php if($templateparams->get('logoFile')){ ?>
                <img src="<?php echo JURI::root().$templateparams->get('logoFile'); ?>" alt="" title="" />
            <?php } else{ ?>
                <?php if($templateparams->get('logoname')){ ?>
                    <?php echo $templateparams->get('logoname'); ?>
                <?php } ?>
            <?php } ?>

        </h1>
        <i class="icon-remove menu-close"></i>

        <?php foreach ($list as $i => &$item) : ?>

            <?php if($item->type !="component"){ ?>
                <a class="scroll" href="<?php echo $item->flink; ?>"><?php echo $item->title; ?></a>
            <?php } else {?>
                <a  href="<?php echo $item->flink; ?>"><?php echo $item->title; ?></a>
            <?php }?>
        <?php endforeach; ?>
		<a  href="<?php echo 'http://demo.shinetheme.com/redirect.php?theme=Dignity'; ?>"><?php echo 'View All Version'; ?></a>
    </div>
    <!-- Navigation Trigger Button -->
    <div id="sm-trigger"></div>
</nav>

