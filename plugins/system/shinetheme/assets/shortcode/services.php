<?php
defined('_JEXEC') or die;
add_shortcode('services_desi', 'ServicesDesignShortcode');
function ServicesDesignShortcode($atts,$content=null){
    extract(shortcode_atts(array(
        "title"=>'',
        "description"=>'',
        "category"=>'',
        "itemcount"=>'',
        "template"=>''
    ), $atts));
    if(!$template){
        $template = 'services';
    }

    $st = new ShinethemePlugin();
    $items = $st->getk2Category($category,$itemcount);

    $req = ShinethemePlugin::addTemplate($template);
    if($req["check"]){
        require $req["src"];
    }
}
?>