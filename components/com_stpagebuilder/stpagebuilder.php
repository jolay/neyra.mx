<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_users
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		1.5
 */

defined('_JEXEC') or die;


require_once JPATH_PLUGINS . "/system/shinetheme/assets/includes/allshortcodes.php";

$controller = JControllerLegacy::getInstance('Stpagebuilder');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();