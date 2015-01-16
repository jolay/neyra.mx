<?php 
defined('_JEXEC') or die;
add_shortcode('html_desi', 'htmlDesignShortcode');
function htmlDesignShortcode($atts,$content=null){
 	extract(shortcode_atts(array(
	), $atts));
    $req = ShinethemePlugin::addTemplate('html');
	if($req["check"]){
		require $req["src"];
	}
}
?>