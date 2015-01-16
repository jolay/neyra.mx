<?php 
/**
 * @author ShineTheme - www.shinetheme.com
 * @date: Aug 2013.
 *
 * @copyright  Copyright (C) 2013 shinetheme.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');
?>

<h4 class="margint30">Contact Us</h4>

<form id="contact-<?php echo $id; ?>" method="post" action="index.php?option=com_stpagebuilder&task=page.contact&tmpl=component">
	<div class="message"></div>
	<div class="contact-input-area margint20">
		<div class="form-group clearfix">
			<div class="pull-left inpt-name">Name *</div>
			<div class="pull-left"><input class="nameform" type="text" name="name"></div>
		</div>
		<div class="form-group clearfix">
			<div class="pull-left inpt-name">E-Mail *</div>
			<div class="pull-left"><input class="emailform" type="text" name="email"></div>
		</div>
		<div class="form-group clearfix">
			<div class="pull-left inpt-name">Web Site</div>
			<div class="pull-left"><input class="websiteform" type="text" name="phone"></div>
		</div>
		<div class="form-group contactmsg margint20">
			<div>Message *</div>
			<div class="margint10"><textarea class="messageform" name="message"></textarea> </div>
		</div>
		<div class="pull-right margint10">
			<input class="form-button" type="submit" value="Send">
		</div>
	</div>
	<input type="hidden" class="subjectform" name="subject" value="<?php echo $subject; ?>" />
</form>

<script>
	jQuery(document).ready(function() {
		jQuery('#contact-<?php echo $id; ?>').validate({
			rules: {
				name:"required",
				email:{
					required:true,
					email:true
				},
				message:"required"
			},
			messages: {
				name:"Please enter your name",
				email:{
					required:"Please enter your email",
					email:"Please enter a valid email address"
				},
				message:"Please enter messages"
			},
			submitHandler:function(form){
				var data={
					name:jQuery('#contact-<?php echo $id; ?> .nameform').val(),
					email:jQuery('#contact-<?php echo $id; ?> .emailform').val(),
					website:jQuery('#contact-<?php echo $id; ?> .websiteform').val(),
					message:jQuery('#contact-<?php echo $id; ?> .messageform').val(),
					subject:"<?php echo $subject; ?>",
					thanks:"<?php echo $thanks; ?>"
				};
				jQuery.ajax({
					type:'POST',
					url:'index.php?option=com_stpagebuilder&task=page.contact&tmpl=component',
					data:data,
					beforeSend:function(){
						jQuery('#contact-<?php echo $id; ?>').find("input, select, button, textarea").prop("disabled",true);
					},
					success:function(reponse){
						reponse = jQuery.parseJSON(reponse);
						if(reponse.check==0){
							jQuery('#contact-<?php echo $id; ?> .message').removeClass('alert alert-error alert-success').addClass('alert alert-error').html(reponse.message);
						}else{
							jQuery('#contact-<?php echo $id; ?> .message').removeClass('alert alert-error alert-success').addClass('alert alert-success').html(reponse.message);
						}
						window.setTimeout(function(){
							jQuery('#contact-<?php echo $id; ?> .message').removeClass('alert alert-error alert-success').html("");
						},4000);
					}
				}).done(function(){
					jQuery('#contact-<?php echo $id; ?>').find("input[type='text'], select, button, textarea").prop("disabled",false).val("");
				});
			}
		});
	});
</script>