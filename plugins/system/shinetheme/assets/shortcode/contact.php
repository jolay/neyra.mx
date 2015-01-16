<?php 
/**
 * @author ShineTheme - www.shinetheme.com
 * @date: Aug 2013.
 *
 * @copyright  Copyright (C) 2013 shinetheme.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

add_shortcode('contact_desi', 'ContactDesignShortcode');
function ContactDesignShortcode($atts,$content=null){
 	extract(shortcode_atts(array(
    	"captcha"=>false,
        "email"=>"",
        "subject"=>"Contact Form",
        "thanks"=>"Thank You!"
    	), $atts));
    $req = ShinethemePlugin::addTemplate('contact');
    $id=rand();
	if($req["check"]){
		require $req["src"];
	}
}
?>