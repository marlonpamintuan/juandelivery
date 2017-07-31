$(document).ready(function() {
  $('#form_tracker').submit(function(e) {
      $('#loadingmessage').show();  // show the loading message.

    e.preventDefault();
    $.ajax({
       type: "POST",
       url: 'php/tracking_query.php',
       data: $(this).serialize(),
       success: function(data)
	{
          if (data === "no") {
		  
            $("#result").html('tae');
				
				$('#form')[0].reset();
				 $('#loadingmessage').hide(); 
				  $("#success-alert").alert();
                $("#success-alert").fadeTo(2500, 500).slideUp(500, function(){
                $("#success-alert").slideUp(500);
		  location.reload();
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


