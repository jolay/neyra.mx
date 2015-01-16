<?php
defined('_JEXEC') or die;
add_shortcode('demo_desi', 'demoDesignShortcode');
function demoDesignShortcode($atts,$content=null){
    extract(shortcode_atts(array(
        "categoryid"=>0,
        "limit"=>""
    ), $atts));

    $result = $categoryid;
    $req = ShinethemePlugin::addTemplate('demo');
    if($req["check"]){
        require $req["src"];
    }
}
?>