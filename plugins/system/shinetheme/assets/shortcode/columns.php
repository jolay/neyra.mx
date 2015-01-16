<?php 
defined('_JEXEC') or die;
// Columns
$column_new_array = array();
add_shortcode('columns_desi', 'columnsDesignShortcode');
function columnsDesignShortcode($atts, $content = null){
    extract(shortcode_atts(array(
        "id" => '',
        "class"=>'',
        "fullwidth"=>'1'
    ), $atts));
    $st = new ShinethemePlugin();
	global $column_new_array;
    $column_new_array = array();
    extract(shortcode_atts(array(
    	"class" => ''
    	), $atts));
    do_shortcode($content);

   $req = ShinethemePlugin::addTemplate('columns');
	if($req["check"]){
		require $req["src"];
	}
}

add_shortcode('column_item_desi', 'columnItemDesignShortcode');
function columnItemDesignShortcode($atts, $content = null)
{
    extract(shortcode_atts(array(
        "col" => '12',
        "col_md"=>'0',
        "col_sm"=>'0',
        "col_xs"=>'0',
        "class"=>''
    ), $atts));
    global $column_new_array;
    $col_class = "col-lg-".$col;
    if($col_md!="0"){
        $col_class.=" col-md-".$col_md;
    }
     if($col_sm!="0"){
        $col_class.=" col-sm-".$col_sm;
    }
     if($col_xs!="0"){
        $col_class.=" col-xs-".$col_xs;
    }
    $column_new_array[] = array("col" => $col_class ,"content" => $content,'class'=>$class);
}

