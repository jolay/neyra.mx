<?php 
defined('_JEXEC') or die;

add_shortcode('portfolio_desi', 'PortfolioDesignShortcode');
function PortfolioDesignShortcode($atts,$content=null){
 	extract(shortcode_atts(array(
 		"id"=>"0",
 		"title"=>"",
        "description"=>""
	), $atts));
	require_once JPATH_BASE.'/components/com_k2/models/item.php';

 	$st = new ShinethemePlugin();
	$catItems = $st->getK2Recent($id);

	$K2ModelItem = new K2ModelItem;
	foreach ($catItems as $catItem) {
		$catTags[] = $K2ModelItem->getItemTags($catItem->id);
	}
	foreach ($catTags as $catTag) {
		foreach ($catTag as $tag) {
			$allTags[] = $tag->name;
		}
	}
	$tags = array_unique($allTags);
	$col = array();
	$col['item']=$column;
	switch ($column) {
		case '2':
			$col['class']="col-lg-6 col-sm-6";
			break;
		case '3':
			$col['class']="col-lg-4 col-sm-4";
			break;
		case '4':
			$col['class']="col-lg-3 col-sm-3";
			break;
		case '5':
			$col['item']='m';
			$col['class']="col-lg-3 col-sm-3";
			break;
	}

	if($st->checkSidebar()){
		$col['sidebar']='s';
	}else{
		$col['sidebar']='';
	}

    $req = ShinethemePlugin::addTemplate('portfolio');
	if($req["check"]){
		require $req["src"];
	}
}
?>