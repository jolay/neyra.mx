<?php
defined('_JEXEC') or die;
add_shortcode('vimeo_desi', 'vimeoDesignShortcode');
function vimeoDesignShortcode($atts, $content = null)
{
	extract(shortcode_atts(array(
		"height" => '300',
		"width"  => '400',
		"class"  => ''
	), $atts));
	preg_match('/http:\/\/vimeo.com\/(\d+)$/', $content, $id);
	$req = ShinethemePlugin::addTemplate('vimeo');
	if($req["check"]){
		require $req["src"];
	}
}

