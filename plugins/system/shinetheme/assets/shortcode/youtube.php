<?php 
defined('_JEXEC') or die;
add_shortcode('youtube_desi', 'youtubeDesignShortcode');
function youtubeDesignShortcode($atts, $content = null)
{
	extract(shortcode_atts(array(
		"height" => '300',
		"width"  => '400',
		"class"  => ''
	), $atts));

	preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $content, $id);
	$req = ShinethemePlugin::addTemplate('youtube');
	if($req["check"]){
		require $req["src"];
	}
}

