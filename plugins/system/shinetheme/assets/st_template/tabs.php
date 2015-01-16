<?php 
defined('_JEXEC') or die;

?>

<?php if($position=="style2"){ ?>
<div class="row margint30">
	<ul class="tabbed-area col-lg-3 col-sm-3 tab-style1">
	<?php foreach($tab_new_array as $key=>$item){ ?>
		<li <?php echo ($key==0)?"class='active'":""; ?>>
			<a href="#st_tabst<?php echo $id.$key; ?>"><?php echo $item['title']; ?></a>
		</li>
	<?php } ?>
	</ul>
	<div class="col-lg-9 col-sm-9 tab-content animated-area">
	<?php foreach($tab_new_array as $key => $item){ ?>
		<div class="row tab-pane fade in <?php echo ($key==0)?"in active":""; ?>" id="st_tabst<?php echo $id.$key; ?>">
			<?php echo do_shortcode($item['content']); ?>
		</div>
	<?php } ?>
	</div>
</div>
<?php }else if($position=="style1"){ ?>
<ul class="tabbed-area tab-style2 clearfix">
	<?php foreach($tab_new_array as $key=>$item){ ?>
		<li <?php echo ($key==0)?"class='active'":""; ?>>
			<a href="#st_tabst<?php echo $id.$key; ?>"><?php echo $item['title']; ?></a>
		</li>
	<?php } ?>
</ul>
<div class="tab-content animated-area tab-style2">
	<?php foreach($tab_new_array as $key => $item){ ?>
		<div class="row tab-pane fade in <?php echo ($key==0)?"in active":""; ?>" id="st_tabst<?php echo $id.$key; ?>">
			<?php echo do_shortcode($item['content']); ?>
		</div>
	<?php } ?>
</div>
<?php }else if($position=='accordion'){ 
	$id = rand();
?>
<div class="accordion" id="accordion<?php echo $id; ?>">
	<?php foreach($tab_new_array as $key=>$item){ ?>
	<div class="panel panel-boxme">
		<div class="panel-style1 <?php echo ($key==0)?"active":""; ?>">
			<h4>
				<span class="plus-box"><?php echo ($key==0)?"-":"+"; ?></span> 
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?php echo $id; ?>" href="#collapse-<?php echo $id.'-'.$key; ?>">
					<?php echo $item['title']; ?>
				</a>
			</h4>
		</div>
		<div id="collapse-<?php echo $id.'-'.$key; ?>" class="collapse collapse-boxme <?php echo ($key==0)?"in":""; ?>">
			<div class="padt20"> 
				<?php echo do_shortcode($item['content']); ?>
			</div>
		</div>
	</div>
	<?php } ?>
</div>
<?php } ?>
