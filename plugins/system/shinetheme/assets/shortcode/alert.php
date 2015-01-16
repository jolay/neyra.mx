<?php 
defined('_JEXEC') or die;

add_shortcode('alert_desi','alertDesignShortcode');
function alertDesignShortcode($atts,$content=null){
	extract(shortcode_atts(array(
    	"type" => '',
    	"title"=>'',
    	"class" => ''
	), $atts));
	switch ($type) {
		case 'success':
			$type='alert-success';
			$ico ='icon-checkmark-circle';
			break;
		case 'error':
			$type='alert-error';
			$ico ='icon-x-altx-alt';
			break;
		case 'info':
			$type='alert-info';
			$ico ='icon-info-2';
			break;
		default:
			$type='';
			$ico ='icon-exclamation-sign';
			break;
	}
	$title = urldecode($title);
	$req = ShinethemePlugin::addTemplate('alert');
	if($req["check"]){
		require $req["src"];
	}
}