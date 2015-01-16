<?php 
defined('_JEXEC') or die;
/*
	$content :    
	$class :
	$title :...
	$ico :
*/
?>
<div class="alert <?php echo $type; ?>">
	<button type="button" class="close" data-dismiss="alert">
		<i class="icon-remove-sign"></i>
	</button>
	<i class="alert-ico <?php echo $ico; ?>"></i>
	<?php if($title!=''){ ?>
		<h4><?php echo $title; ?></h4>
	<?php } ?>
	<?php echo do_shortcode($content); ?>
</div>
