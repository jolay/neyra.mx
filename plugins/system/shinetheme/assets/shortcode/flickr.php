<?php 
defined('_JEXEC') or die;
add_shortcode('flickr_desi', 'flickrDesignShortcode');
function flickrDesignShortcode($atts,$content=null){
 	extract(shortcode_atts(array(
		"class" => '',
		"id"=>'100707032@N06',
		"limit"=>'10',
		"width"=>'auto',
		"height"=>'auto' 
	),$atts));
	if(trim($limit)==''){
		$limit=10;
	}
	$idrandom = rand();

    $req = ShinethemePlugin::addTemplate('flickr');
	if($req["check"]){
		require $req["src"];
	}
}
?>