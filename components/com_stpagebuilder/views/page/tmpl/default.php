<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_stpagebuilder
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$pageid = JRequest::getVar('id','');
// echo $pageid;
// die();
$db = JFactory::getDbo();
$query = $db->getQuery(true);
if($pageid==""){
	$menu = JFactory::getApplication()->getMenu();
	$item = $menu->getItem($menu->getActive()->id);
	$query->select('*')->from('#__stpagebuilder')->where('id='.$item->params->get('designid'));
}else{
	$query->select('*')->from('#__stpagebuilder')->where('id='.$pageid);
}	
$db->setQuery($query);
$data = $db->loadObject();
$config = json_decode($data->config);

// check sidebar
$checksidebar = JFactory::getApplication()->getTemplate(true)->params->get('type');



?>

<?php if($config->id!="") echo "<section id='{$config->id}'>"; ?>
<?php if($config->class!="") echo "<div class='{$config->class}'>"; ?>
<?php if($config->fullwidth!="1" && !$checksidebar) echo '<div class="container">'; ?>
<?php echo do_shortcode($data->code); ?>
<?php if(!$config->fullwidth && !$checksidebar) echo '</div>'; ?>
<?php if($config->class!="") echo "</div>"; ?>
<?php if($config->id!="") echo "</section>"; ?>

