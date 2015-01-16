<?php 
defined('_JEXEC') or die;
$ig_new_array = array();
add_shortcode("gallery_desi", "galleryDesignShortcode");
function galleryDesignShortcode($atts,$content=null){
	extract(shortcode_atts(array(
        "class" => '',
        "style"=>'img-polaroid'
    ), $atts));
	global $st_config;
    $id = rand();
    global $ig_new_array;
    $ig_new_array = array();
    do_shortcode($content);
    $req = ShinethemePlugin::addTemplate('gallery');
	if($req["check"]){
		require $req["src"];
	}
    
}

// Item Gallery
add_shortcode('item_gallery_desi', 'itemGalleryDesignShortcode');
function itemGalleryDesignShortcode($atts,$content=null){
	extract(shortcode_atts(array(
        "title" => '',
        "desc" =>''
    ), $atts));
    global $ig_new_array;
    $ig_new_array[] = array("title" => $title , "content" => $content,"desc"=>$desc);
}