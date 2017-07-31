$(document).ready(function() {
  $('#form').submit(function(e) {
      $('#loadingmessage').show();  // show the loading message.
$( "#finish" ).attr("disabled",true);
    e.preventDefault();
    $.ajax({
       type: "POST",
       url: 'php/booking_query.php',
       data: $(this).serialize(),
       success: function(data)
	{
          if (data === 'done') {
		  $('#loadingmessage').hide(); 
       setTimeout(function() {
        swal({
            title: "Successfully sent a request!",
            text: "Thank you for booking, wait our call for confirmation",
            type: "success"
        }, function() {
            location.reload();
        });
    }, 100);  
          }  
		 
          else {
 $('#loadingmessage').hide(); 
           setTimeout(function() {
        swal({
            title: "Ooops something went wrong!",
            text: "Sorry, we will solve this problem as soon as possible thank you",
            type: "warning"
        }, function() {
          location.reload();
        });
    }, 100);
          }
       }
   });
 });
});


