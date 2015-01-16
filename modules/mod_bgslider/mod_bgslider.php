<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_bgslider
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';

$images = modBgSliderHelper::getList($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
$layout = trim($params->get('effect'));


require JModuleHelper::getLayoutPath('mod_bgslider', $layout);
