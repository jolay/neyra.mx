<?php 
/*
	
*/

defined('_JEXEC') or die;
if($style=="none"){
	$st = "border:none;";
}else{
	$st= "border:1px solid #333;";
}

?>
<div class='st-divider <?php echo $class; ?>' <?php echo ($margin!='')?"style='padding:{$margin}px 0;{$st}'":"style='{$st}'"; ?> ></div>
