////////////////////////////////////////////////////////////////////////////////////
// Custom Contact Functions For: Krisp | HTML/CSS Portfolio template
////////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////////////////////////////////////////////////////// 
// variables start
var $ = jQuery.noConflict(); 
// variables end
////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////////////////////////// 
// main function starts
$(function() {
		   
		   
			// hide any error messages starts
  			$('.error').hide();
			// hide any error messages starts
			
			
			// hide the success message starts
  			$('.contactSuccessMessage').hide();
			// hide the success message ends
			
			// contact button function starts
  			$(".contactButton").click(function() {
		    
			
			// hide any error messages starts
            $('.error').hide();
			// hide any error messages ends
		    
			
			// name validation starts
	        var name = $("input#contactName").val();
		        if (name == "") {
                $("span#nameError").fadeIn(500);
                $("input#contactName").focus();
                return false;
            }
			// name validation ends
			
			
			// email validation starts
	        var email = $("input#contactEmail").val();
	            if (email == "") {
                $("span#emailError").fadeIn(500);
                $("input#contactEmail").focus();
                return false;
            }
	
	        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	            if(!emailReg.test(email)) {
	            $("span#emailError2").fadeIn(500);
                $("input#contactEmail").focus();
                return false;
	        }
			// email validation ends
			
	        
			// message validation starts
	        var msg = $("textarea#contactMessage").val();
	            if (msg == "") {
	            $("span#messageError").fadeIn(500);
	            $("textarea#contactMessage").focus();
	            return false;
            }
			// message validation ends
		
		
		    // get the data ready for php starts
		    var dataString = 'name='+ name + '&email=' + email + '&msg=' + msg;
		    // get the data ready for php ends
		
		
		    // send the data to php starts
	        $.ajax({
               type: "POST",
               url: "php/mail.php",
               data: dataString,
               success: function() {
                   $("#contactForm").hide();
	               $(".contactSuccessMessage").fadeIn(1500);
               }
            });
			// send the data to ends
			
			
            return false;
	        });
			// contact button function ends
});
// main function ends
////////////////////////////////////////////////////////////////////////////////////
