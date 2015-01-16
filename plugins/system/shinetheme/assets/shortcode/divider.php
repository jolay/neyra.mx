<?php 
defined('_JEXEC') or die;

add_shortcode("divider_desi", "dividerDesignShortcode");
function dividerDesignShortcode($atts,$content=null){
	extract(shortcode_atts(array(
        "class" => '',
        "style" => '',
        "margin"=> ''
    ), $atts));
    $req = ShinethemePlugin::addTemplate('divider');
	if($req["check"]){
		require $req["src"];
	}
    
}