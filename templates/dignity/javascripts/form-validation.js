$(document).ready(function($) {

	// hide messages 
	$(".error").hide();
	$(".success").hide();
	
	$('#contactForm input').click(function(e) {
        $(".error").fadeOut();
    });
	
	// on submit...
	$("#contactForm #submit").click(function() {
		$(".error").hide();
		
		//required:
		
		//name
		var name = $("input#name").val();
		if(name == ""){
			//$("#error").fadeIn().text("Name required.");
			$('#fname').fadeIn('slow');
			$("input#name").focus();
			return false;
		}
		
		//email (check if entered anything)
		var email = $("input#email").val();
		//email (check if entered anything)
		if(email == ""){
			//$("#error").fadeIn().text("Email required");
			$('#fmail').fadeIn('slow');
			$("input#email").focus();
			return false;
		}
		
		//email (check if email entered is valid)

		if (email !== "") {  // If something was entered
			if (!isValidEmailAddress(email)) {
				$('#fmail').fadeIn('slow'); //error message
				$("input#email").focus();   //focus on email field
				return false;  
			}
		} 

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
};

		
		
		
		// comments
		var comments = $("#msg").val();
		
		if(comments == ""){
			//$("#error").fadeIn().text("Email required");
			$('#fmsg').fadeIn('slow');
			$("input#msg").focus();
			return false;
		}

        // Ajax form

            var data={
                name:jQuery('#contactForm #name').val(),
                email:jQuery('#contactForm #email').val(),
                message:jQuery('#contactForm #msg').val(),
                subject:"<?php echo $subject; ?>",
                thanks:"<?php echo $thanks; ?>"
            };

            $.ajax({
                type:'POST',
                url:'index.php?option=com_stpagebuilder&task=page.contact&tmpl=component',
                data:data,
                beforeSend:function(){
                    jQuery('#contactForm').find("input, select, button, textarea").prop("disabled",true);
                },
                success:function(reponse){
                    reponse = jQuery.parseJSON(reponse);
                    if(reponse.check==0){
                        $('.contact-success-message').removeClass('alert alert-error alert-success').addClass('alert alert-error').html(reponse.message);
                    }else{
                        $('.contact-success-message').removeClass('alert alert-error alert-success').addClass('alert alert-success').html(reponse.message);
                    }
                    window.setTimeout(function(){
                        $('.contact-success-message').removeClass('alert alert-error alert-success').html("");
                    },4000);
                }
            }).done(function(){
                    $('#contactForm').find("input[type='text'], select, button, textarea").prop("disabled",false).val("");
                });

        // End Ajax form

	});  
		
		
	// on success...
	 function success(){
	 	$("#success").fadeIn();
	 	$("#contactForm").fadeOut();
	 }
	
    return false;
});

