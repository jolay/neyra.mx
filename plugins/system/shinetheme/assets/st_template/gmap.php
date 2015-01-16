<?php 
defined('_JEXEC') or die;
?>
<div id="map_canvas" class="map rounded <?php echo $class; ?>" style="width:100%;height:<?php echo $height; ?>px;"></div>
<?php  
	$js = 	"jQuery(document).ready(function($) {
				var stmapdefault = '{$latitude},{$longitude}';
				var marker = {position:stmapdefault}
				jQuery('#map_canvas').gmap({
					'zoom': $zoom ,
					'center': stmapdefault,
					'mapTypeId':google.maps.MapTypeId.{$maptype}  ,
					'callback': function() {
						var self = this;
						self.addMarker(marker).click(function(){
							self.openInfoWindow({'content': '{$location}'}, this);
						});
					},
					panControl: $pancontrol,
					zoomControl: $zoomcontrol,
					mapTypeControl: $maptypecontrol,
					streetViewControl: $streetcontrol,
					scrollwheel:$scrollwheel
				});		
			});
			jQuery(window).resize(function(){
				var stct = new google.maps.LatLng('{$latitude}','{$longitude}');
				jQuery('#map_canvas').gmap('option', 'center', stct);
			});
		";
	$st->doc->addScriptDeclaration($js);
?>

