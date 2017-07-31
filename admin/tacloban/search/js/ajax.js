$(document).ready(function() {
  $('#edit_formuser').submit(function(e) {
      $('#loadingmessage').show();  // show the loading message.

    e.preventDefault();
    $.ajax({
       type: "POST",
       url: 'php/edituserquery.php',
       data: $(this).serialize(),
       success: function(data)
	{
          if (data === 'done') {
		  
            $("#result").html("<div id='success-alert' class='alert alert-success alert-dismissable'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <b>Success !</b> </div></div>");
				
				$('#edit_formuser')[0].reset();
				 $('#loadingmessage').hide(); 
				  $("#success-alert").alert();
                $("#success-alert").fadeTo(1500, 500).slideUp(500, function(){
                $("#success-alert").slideUp(500);
				
                });  
          }  else if (data == 'duplicate'){
			  
			$("#result").html("<div id='warning-alert' class='alert alert-warning alert-dismissable'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <b>That username already exist ! </b></div></div>");
			
			document.getElementById("USER_LASTNAME").value = "";
			document.getElementById("USER_FIRSTNAME").value = "";
			document.getElementById("USER_MIDDLENAME").value = "";
			document.getElementById("USER_FIRSTNAME").focus();
			$('#loadingmessage').hide(); 
			 $("#warning-alert").alert();
                $("#warning-alert").fadeTo(1500, 500).slideUp(500, function(){
                $("#warning-alert").slideUp(500);
                });  
		}
		else if (data == 'not'){
			  
			$("#result").html("<div id='warning-alert' class='alert alert-warning alert-dismissable'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <b>Incorrect Old Password! </b></div></div>");

			document.getElementById("USER_PASSWORD").value = "";
			document.getElementById("USER_PASSWORD").focus();
			$('#loadingmessage').hide(); 
			 $("#warning-alert").alert();
                $("#warning-alert").fadeTo(1500, 500).slideUp(500, function(){
                $("#warning-alert").slideUp(500);
                });  
		}
		else if (data == 'contact'){
			  
			$("#result").html("<div id='warning2-alert' class='alert alert-warning alert-dismissable'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <b>That contact number already exist ! </b></div></div>");			 
			document.getElementById("USER_EMAIL").value = "";
			document.getElementById("USER_EMAIL").focus();
			$('#loadingmessage').hide(); 
			 $("#warning2-alert").alert();
                $("#warning2-alert").fadeTo(1500, 500).slideUp(500, function(){
                $("#warning2-alert").slideUp(500);
                });  
		}
		else if (data == 'email'){
			  
			$("#result").html("<div id='warning2-alert' class='alert alert-warning alert-dismissable'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <b>That email address already exist ! </b></div></div>");			 
			document.getElementById("USER_EMAIL").value = "";
			document.getElementById("USER_EMAIL").focus();
			$('#loadingmessage').hide(); 
			 $("#warning2-alert").alert();
                $("#warning2-alert").fadeTo(1500, 500).slideUp(500, function(){
                $("#warning2-alert").slideUp(500);
                });  
		}
		 
          else {
       			$("#result").html(data);			 
$('#loadingmessage').hide(); 
 $("#danger-alert").alert();
                $("#danger-alert").fadeTo(1500, 500).slideUp(500, function(){
                $("#danger-alert").slideUp(500);
                });  
          }
       }
   });
 });
});


