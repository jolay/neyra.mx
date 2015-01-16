<?php 
defined('_JEXEC') or die;

?>
<ul id="footer-gallery" class="clearfix">
	<?php foreach($ig_new_array as $key=>$item){ ?>
	<li>
		<a class="prettyPhoto" href="<?php echo trim(do_shortcode($item['content'])); ?>">
			<img src="<?php echo trim(do_shortcode($item['content'])); ?>" alt="">
		</a>
	</li>
	<?php } ?>
</ul>