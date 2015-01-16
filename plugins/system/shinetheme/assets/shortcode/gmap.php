<?php 
defined('_JEXEC') or die;
add_shortcode('gmap_desi','geomapDesignShortcode');
function geomapDesignShortcode($atts, $content=null){
 	extract(shortcode_atts(array(
		"class" => '', 
		"latitude"=>'21.038204',   // vi do
		"longitude"=>'105.851011',   // kinh do
		"zoom"=>'14',
		"maptype"=>'ROADMAP',
		"pancontrol"=>"true",
		"zoomcontrol"=>"true",
		"maptypecontrol"=>"true",
		"streetcontrol"=>"true",
		"location"=>"",
		"height"=>400,
		"scrollwheel"=>"false"

	),$atts));
    $st = new ShinethemePlugin();
    $req = ShinethemePlugin::addTemplate('gmap');
	if($req["check"]){
		require $req["src"];
	}
}
?>