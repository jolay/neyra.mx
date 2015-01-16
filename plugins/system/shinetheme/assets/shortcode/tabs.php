<?php 
defined('_JEXEC') or die;

$tab_new_array = array();
add_shortcode('tabs_desi', 'tabsDesignShortcode');
function tabsDesignShortcode($atts, $content = null)
{
 	global $tab_new_array;
    $tab_new_array = array();
    extract(shortcode_atts(array(
		"position"		=> 'style1',
		"class"			=> ''
	), $atts));

    do_shortcode($content);
    $id = rand();
    $num = count($tab_new_array);

    $req = ShinethemePlugin::addTemplate('tabs');
	if($req["check"]){
		require $req["src"];
	}
}

add_shortcode('tabst_item_desi', 'tabstItemDesignShortcode');
function tabstItemDesignShortcode($atts, $content = null)
{
    extract(shortcode_atts(array(
        "title" => '',
        "class" => ''
    ), $atts));
    global $tab_new_array;
    $tab_new_array[] = array("title" => $title , "content" => $content);
}

?>