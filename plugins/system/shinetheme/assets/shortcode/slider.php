<?php 
defined('_JEXEC') or die;
add_shortcode('slider_desi','sliderDesignShortcode');
function sliderDesignShortcode($atts, $content=null){
	extract(shortcode_atts(array(
		"type"=>"1",
		"typeslider"=>'1',
		"interval"=>'2000',
		"auto"=>'true',
		),$atts));

	global $st_config;
    $id = rand();
    global $ig_new_array;

    $ig_new_array = array();
    do_shortcode($content);
    $req = ShinethemePlugin::addTemplate('slider');
	if($req["check"]){
		require $req["src"];
	}
}
?>