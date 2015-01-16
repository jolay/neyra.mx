<?php
defined('_JEXEC') or die;
add_shortcode('moduleid_desi', 'moduleidDesignShortcode');
function moduleidDesignShortcode($atts,$content=null){
    extract(shortcode_atts(array(
        "id" => '0',
        "showtitle"=>0,
        "moduleclass"=>""
    ), $atts));
    if($id==0 || $id=='') return false;
    $st = new ShinethemePlugin();
    $module =  $st->loadModuleId($id);
    $params = json_decode($module->params);
    $req = ShinethemePlugin::addTemplate('module');
    if($req["check"]){
        require $req["src"];
    }
}
?>