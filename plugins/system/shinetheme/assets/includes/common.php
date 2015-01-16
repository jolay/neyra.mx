<?php
/**
 * @package Shortcodes for Joomla! 3
 * @author http://www.shinetheme.com
 * @copyright(C) 2013- shinetheme.com
 * @license PHP files are GNU/GPL
**/

defined('_JEXEC') or die('Restricted access');

$shortcode_tags = array();


function add_shortcode($tag, $func) {
	global $shortcode_tags;
	if(is_callable($func))
		$shortcode_tags[$tag] = $func;
}


function remove_shortcode($tag) {
	global $shortcode_tags;
	unset($shortcode_tags[$tag]);
}


function remove_all_shortcodes() {
	global $shortcode_tags;

	$shortcode_tags = array();
}
function config_shortcode($config){
	global $st_config;
	$st_config = $config;
}

function do_shortcode($content) {
	global $shortcode_tags;

	if(empty($shortcode_tags) || !is_array($shortcode_tags))
		return urldecode($content) ;

	$pattern = get_shortcode_regex();

	return urldecode(preg_replace_callback('/' . $pattern . '/s', 'do_shortcode_tag', $content));
}


function get_shortcode_regex() {
	global $shortcode_tags;
	$tagnames  = array_keys($shortcode_tags);
	$tagregexp = join('|', array_map('preg_quote', $tagnames));
	// WARNING! Do not change this regex without changing do_shortcode_tag() and strip_shortcodes()
	return '(.?)\[('.$tagregexp.')\b(.*?)(?:(\/))?\](?:(.+?)\[\/\2\])?(.?)';
}


function do_shortcode_tag($m) {
	global $shortcode_tags;

	// allow [[foo]] syntax for escaping a tag
	if($m[1] == '[' && $m[6] == ']') {
		return substr($m[0], 1, -1);
	}

	$tag = $m[2];
	$attr = shortcode_parse_atts($m[3]);

	if(isset($m[5])) {
		// enclosing tag - extra parameter
		return $m[1] . call_user_func($shortcode_tags[$tag], $attr, $m[5], $tag) . $m[6];
	}
	else {
		// self-closing tag
		return $m[1] . call_user_func($shortcode_tags[$tag], $attr, NULL,  $tag) . $m[6];
	}
}


function shortcode_parse_atts($text) {
	$atts    = array();
	$pattern = '/(\w+)\s*=\s*"([^"]*)"(?:\s|$)|(\w+)\s*=\s*\'([^\']*)\'(?:\s|$)|(\w+)\s*=\s*([^\s\'"]+)(?:\s|$)|"([^"]*)"(?:\s|$)|(\S+)(?:\s|$)/';
	$text    = preg_replace("/[\x{00a0}\x{200b}]+/u", " ", $text);
	if(preg_match_all($pattern, $text, $match, PREG_SET_ORDER)) {
		foreach($match as $m) {
			if(!empty($m[1]))
				$atts[strtolower($m[1])] = stripcslashes($m[2]);
			elseif(!empty($m[3]))
				$atts[strtolower($m[3])] = stripcslashes($m[4]);
			elseif(!empty($m[5]))
				$atts[strtolower($m[5])] = stripcslashes($m[6]);
			elseif(isset($m[7]) and strlen($m[7]))
				$atts[] = stripcslashes($m[7]);
			elseif(isset($m[8]))
				$atts[] = stripcslashes($m[8]);
		}
	}
	else {
		$atts = ltrim($text);
	}
	return $atts;
}


function shortcode_atts($pairs, $atts) {
	$atts =(array)$atts;
	$out  = array();
	foreach($pairs as $name => $default) {
		if(array_key_exists($name, $atts))
			$out[$name] = $atts[$name];
		else
			$out[$name] = $default;
	}
	return $out;
}


function strip_shortcodes($content) {
	global $shortcode_tags;

	if(empty($shortcode_tags) || !is_array($shortcode_tags))
		return $content;

	$pattern = get_shortcode_regex();

	return preg_replace('/' . $pattern . '/s', '$1$6', $content);
}


class ShinethemePlugin
{
	public $doc=null;
	private $version="";
	public function __construct(){
		$this->doc = JFactory::getDocument();
		$arr = explode('.',JVERSION);
		$this->version = $arr[0];
	}

	public static function includeShortcode(){
		jimport( 'joomla.filesystem.folder' );
		jimport( 'joomla.filesystem.file' );
		if(JRequest::getVar('option')=='com_stpagebuilder'){
			$src = JPATH_PLUGINS . "/system/shinetheme/assets/shortcode";
			$lists = JFolder::files($src);
			foreach($lists as $f){
				if(JFile::getExt($f)=='php'){
					require_once($src.'/'.$f);
				}
			}
		}else{
			require_once(JPATH_PLUGINS . "/system/shinetheme/assets/includes/allshortcodes.php");
		}
	}

	public static function addTemplate($file){
		jimport( 'joomla.filesystem.file' );
		$tpl 		= JFactory::getApplication()->getTemplate();
		$src 		= JPATH_BASE.'/templates/'.$tpl.'/html/st_template/'.$file.'.php';
		$srcbase 	= JPATH_PLUGINS . "/system/shinetheme/assets/st_template/".$file.'.php';
		if(JFile::exists($src)){
			return array("check"=>true,"src"=>$src);
		}else if(JFile::exists($srcbase)){
			return array("check"=>true,"src"=>$srcbase);
		}else{
			return array("check"=>false,"src"=>"");
		}
	}

	public function checkSidebar(){
		$app        = JFactory::getApplication();
		$template   = $app->getTemplate(true);
		$params     = $template->params;
		return $params->get('type');
	}

	public function getContentRecent($id=0,$limit='ALL'){
		$db = &JFactory::getDbo();
		$query=$db->getQuery(true);
		$where = array('a.state=1');
		if($id!=0){
			$where[]='catid='.$id;
		}
		$query 		->select('a.id,a.title,a.alias,a.catid,a.introtext,a.created,a.images,b.alias AS categoryalias')
					->from('#__content AS a')
					->join('INNER','#__categories AS b ON (a.catid = b.id)')
					->where($where)
					->order('created DESC');
		$db->setQuery($query,0,$limit);
		return $db->loadObjectList();
	}

	public function getContentById($id){
		$db = &JFactory::getDbo();
		$query=$db->getQuery(true);
		$where = array('a.state=1','a.id='.$id);
		$query 		->select('a.id,a.title,a.alias,a.catid,a.introtext,a.images,b.alias AS categoryalias')
					->from('#__content AS a')
					->join('INNER','#__categories AS b ON (a.catid = b.id)')
					->where($where);
		$db->setQuery($query);
		return $db->loadObject();
	}

	public function isImagesContent($array){
		$array = json_decode($array);
		if($array->image_intro==''){
			return false;
		}
		return true;
	}

	public function getImageContent($array){
		return json_decode($array)->image_intro;
	}

	public function getContentlink($item){
		require_once (JPATH_SITE.'/components/com_content/helpers/route.php');
		return JRoute::_(ContentHelperRoute::getArticleRoute($item->id.':'.$item->alias, $item->categoryalias));
	}


	public function getK2Recent($id=0,$limit="ALL"){
		$db = &JFactory::getDbo();
		$query=$db->getQuery(true);
		$where = array('a.published=1');
		if($id!=0){
			$where[]='catid='.$id;
		}
		$query 		->select('a.id,a.title,a.alias,a.catid,a.introtext,a.extra_fields,a.created,b.name AS catname,b.alias AS categoryalias')
					->from('#__k2_items AS a')
					->join('INNER', '#__k2_categories AS b ON (a.catid = b.id)')
					->where($where)
					->order('created DESC');
		$db->setQuery($query,0,$limit);

		return $db->loadObjectList();
	}

	public function getK2byId($id){
		$db = &JFactory::getDbo();
		$query=$db->getQuery(true);
		$where = array('a.published=1','a.id='.$id);
		$query 		->select('a.id,a.title,a.alias,a.catid,a.extra_fields,a.introtext,b.alias AS categoryalias')
					->from('#__k2_items AS a')
					->join('INNER','#__k2_categories AS b ON (a.catid = b.id)')
					->where($where);
		$db->setQuery($query);
		return $db->loadObject();

	}

	public function getImageK2($id,$size='XS'){
		return JURI::root().'media/k2/items/cache/'.md5("Image".$id).'_'.$size.'.jpg';
	}

	public function isImagesK2($id){
		jimport('joomla.filesystem.file') ;
		if(!JFile::exists(JPATH_SITE.'/media/k2/items/cache/'.md5("Image".$id).'_XS.jpg')){
			return false;
		}else{
			return true;
		}
	}

	public function getRoutePageBuilder($id){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('extension_id')->from('#__extensions')->where("element='com_stpagebuilder'");
		$db->setQuery($query);
		$extenid = $db->loadResult();

		$query= $db->getQuery(true);
		$query->select('id,params')->from('#__menu')->where("component_id=".$extenid." and published = 1");
		$db->setQuery($query);
		$items = $db->loadObjectList();
		$menuid = 0;
		foreach ($items as $key => $item) {
			if(json_decode($item->params)->designid == $id){
				$menuid=$item->id;
				break;
			}
		}
		if($menuid!=0){
			return JRoute::_('index.php?option=com_stpagebuilder&view=page&Itemid='.$menuid);
		}else{
			return JRoute::_('index.php?option=com_stpagebuilder&view=page&id='.$id);
		}
	}

	public function getK2link($id,$alias,$catid,$categoryalias){
		require_once (JPATH_SITE.'/components/com_k2/helpers/route.php');
		return urldecode(JRoute::_(K2HelperRoute::getItemRoute($id.':'.urlencode($alias), $catid.':'.urlencode($categoryalias))));
	}

	public function loadModule($position,$count=0,$style="none"){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select("*")->from("#__modules")->where('position=\''.$position.'\'');
		$db->setQuery($query);
		$result = $db->loadObjectList();
		if(count($result)==1){
			$title = $result[0]->title;
			$mod = $result[0]->module;
		}else{
			$title = $result[$count]->title;
			$mod = $result[$count]->module;
		}
		$module = JModuleHelper::getModule( $mod, $title );
		$attribs['style'] = $style;
		return JModuleHelper::renderModule( $module,$attribs);
	}

	public function loadModuleId($id){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select("*")->from("#__modules")->where('id=\''.$id.'\'');
		$db->setQuery($query);
		$result = $db->loadObject();
		$title = $result->title;
		$mod = $result->module;
		$module = JModuleHelper::getModule( $mod, $title );
		$module->content = JModuleHelper::renderModule( $module,array('style'=>'none'));
		return $module;
		//return JModuleHelper::renderModule( $module );
	}

    public function getk2Category($id=0,$limit="ALL"){
        $db = &JFactory::getDbo();
        $query=$db->getQuery(true);
        $where = array('a.published=1');
        if($id!=0){
            $where[]='catid='.$id;
        }
        $query 		->select('a.id,a.title,a.alias,a.extra_fields,a.introtext')
            ->from('#__k2_items AS a')
            ->join('INNER', '#__k2_categories AS b ON (a.catid = b.id)')
            ->where($where)
            ->order('created DESC');
        $db->setQuery($query,0,$limit);

        return $db->loadObjectList();
    }
}