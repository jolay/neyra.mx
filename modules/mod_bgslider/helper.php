<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;


/**
 * Helper for mod_articles_news
 *
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 */
abstract class modBgSliderHelper
{
	public static function getList(&$params)
	{
        $folder = $params->get('folder');
        $files = JFolder::files($folder, $filter = '.', '', '' , array('xml,txt,html,htm'));
        return $files;
	}
}
