<?php 
defined('_JEXEC') or die;
?>
<?php if($class!="" || $id!=""){ ?>
	<div <?php echo 'id="'.(($id!="")?$id:"").'"'; ?> class="<?php echo $class; ?>">
<?php } ?>
<?php if(!$fullwidth && !$st->checkSidebar()){ ?>
	<div class="container">
<?php } ?>
<div class='row'>
	<?php foreach($column_new_array as $key => $item){ ?>
		<div class='<?php echo $item['col']; ?> <?php echo $item['class']; ?>'><?php echo do_shortcode($item['content']); ?></div>
	<?php } ?>
</div>
<?php if(!$fullwidth && !$st->checkSidebar()){ ?>
</div>
<?php } ?>
<?php if($class!="" || $id!=""){ ?>
</div>
<?php } ?>