$(document).ready(function() {
  $('#personal_form').submit(function(e) {
      $('#loadingmessage').show();  // show the loading message.

    e.preventDefault();
    $.ajax({
       type: "POST",
       url: 'php/personal.php',
       data: $(this).serialize(),
       success: function(data)
	{
          if (data === 'done') {
		  
				 $('#loadingmessage').hide(); 
				  setTimeout(function() {
        swal({
            title: "Successfully updated",
            text: "Successfully updated personal information.",
            type: "success"
        }, function() {
            window.location = "#";
      
        });
    }, 100);
     
    
          }  else if (data === 'contact'){
			 
			$('#loadingmessage').hide(); 
			  setTimeout(function() {
        swal({
            title: "Contact number already exist",
            text: "Please try again.",
            type: "warning"
        }, function() {
            window.location = "#";
      
        });
    }, 100);
    
		}
    else if (data === 'email'){
       
      $('#loadingmessage').hide(); 
        setTimeout(function() {
        swal({
            title: "Email address already exist",
            text: "Please try again.",
            type: "warning"
        }, function() {
            window.location = "#";
      
        });
    }, 100);
    
    }

          else {
       		$('#loadingmessage').hide(); 
           setTimeout(function() {
        swal({
            title: "Something went wrong",
            text: "Please contact the developer for this problem.",
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


