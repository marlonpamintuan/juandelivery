$(document).ready(function() {
  $('#account_form').submit(function(e) {
      $('#loadingmessage2').show();  // show the loading message.

    e.preventDefault();
    $.ajax({
       type: "POST",
       url: 'php/account.php',
       data: $(this).serialize(),
       success: function(data)
	{
          if (data === 'done') {
		  
				 $('#loadingmessage2').hide(); 
				  setTimeout(function() {
        swal({
            title: "Successfully updated",
            text: "Successfully updated account information.",
            type: "success"
        }, function() {
            window.location = "#";
             $('#USER_PASSWORD').val("");
              $('#USER_NEWPASSWORD').val("");
      
        });
    }, 100);
     
    
          }  else if (data === 'notPassword'){
			 
			$('#loadingmessage2').hide(); 
			  setTimeout(function() {
        swal({
            title: "Wrong current password",
            text: "Make sure that your current password is valid and correct.",
            type: "warning"
        }, function() {
            window.location = "#";
        $('#USER_PASSWORD').val("");
      
        });
    }, 100);
    
		}
    else if (data === 'username'){
       
      $('#loadingmessage2').hide(); 
        setTimeout(function() {
        swal({
            title: "Username already exist",
            text: "Please try again.",
            type: "warning"
        }, function() {
            window.location = "#";
      
        });
    }, 100);
    
    }

          else {
       		$('#loadingmessage2').hide(); 
           setTimeout(function() {
        swal({
            title: "Something went wrong",
            text: "Please contact our admin",
            type: "warning"
        }, function() {
            window.location = "#";
      
        });
    }, 100);   
          }
       }
   });
 });
});


