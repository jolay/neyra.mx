<?php 
defined('_JEXEC') or die;

?>
<div class="st-flickr <?php echo $class; ?>" id="st-flickr-<?php echo $idrandom; ?>">
	<ul></ul>
</div>
<?php
	$doc = JFactory::getDocument();
	$js="jQuery(document).ready(function(){
      		jQuery('#st-flickr-{$idrandom} ul').jflickrfeed({ 
				limit: $limit,
				qstrings: {
				  id: '$id'
				},
				useTemplate:false,
				itemCallback:function(item){
					jQuery(this).append('<li><a rel=\"example_group\" class=\"stgallery\" href=\"'+item.image_b+'\"><img src=\"'+item.image_s+'\" alt=\"{{title}}\" style=\"width:{$width}px;height:{$height}px\" /></a></li>');
				}
            });
     	});";
	$doc->addScriptDeclaration($js);
?>