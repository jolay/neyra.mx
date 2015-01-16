<?php 
defined('_JEXEC') or die;

?>
<div class="st-module module<?php echo $moduleclass; ?>" id="Mod<?php echo $module->id; ?>">
	<div class="module-inner">
		<?php if ($showtitle != 0) : ?>
			<h3 class="module-title">
				<span><?php echo $module->title; ?></span>
			</h3>
		<?php endif; ?>
		<div class="module-ct">
			<?php echo $module->content; ?>
		</div>
	</div>
</div>