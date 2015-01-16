<?php 
defined('_JEXEC') or die;
?>
<div class="portfolio-filters clearfix">
	<ul>
		<li><a href="#" class="active" data-filter="*">All</a></li>
		<?php 
		foreach($tags as $key=> $tag){
		?>  
		<li>
			<a href="#" data-filter=".<?php echo strtolower(str_replace(" ","_",$tag)); ?>"><?php echo $tag; ?></a>
		</li>  
		<?php } ?>
	</ul>
</div>
<div class="row portfolio-box">
 <?php 
	foreach($catItems as $key=> $item){
		// var_dump($item);
		$tag_name = array();
		foreach ($K2ModelItem->getItemTags($item->id) as $itm=>$tag_item) {
			$tName = str_replace(" ", "_", $tag_item->name);
			$tag_name[] = strtolower($tName);
		}
		$filter= implode(" ", $tag_name);
?>
	<div class="<?php echo $col['class']; ?> item <?php echo $filter; ?>">
		<div class="prtf-itm prtf-itm-<?php echo $col['item'].$col['sidebar']; ?>">
			<img src="<?php echo $st->getImageK2($item->id,'L') ?>" class="img-responsive" alt="" />
			<div class="mask">
				<div class="prt-lnk-wrppr clearfix">
                	<div class="pull-left popup"><a href="<?php echo $st->getImageK2($item->id,'XL') ?>" class="prettyPhoto"><i class="icon-search"></i></a></div>
                	<div class="pull-left extlink"><a href="<?php echo $st->getK2link($item->id,$item->alias,$item->catid,$item->categoryalias); ?>"><i class="icon-link"></i></a></div>
                </div>
        	</div>
		</div>
		<div class="portfolio-info-box">
			<p><a href="<?php echo $st->getK2link($item->id,$item->alias,$item->catid,$item->categoryalias); ?>"><?php echo $item->title ?></a></p>
			<div><?php echo $item->catname; ?></div>
		</div>
	</div>	
<?php } ?>
</div>



<script>
	/* Isotope */
var $container = jQuery('.portfolio-box');
var $filter = jQuery('.portfolio-filters');
jQuery('.portfolio-box .item:last-child .prtf-itm >img').load(function() {
	$container.isotope({
	    filter : '*',
	    layoutMode : 'sloppyMasonry',
	    animationOptions : {duration: 400}
	});
});
$filter.find('a').click(function() {
    var selector = jQuery(this).attr('data-filter');
    $filter.find('a').removeClass('active');
    jQuery(this).addClass('active');
    $container.isotope({ 
        filter: selector,
        animationOptions:{
        	animationDuration: 400,
        	queue: false
        }
    });
    return false;
});
/* Isotope */
</script>