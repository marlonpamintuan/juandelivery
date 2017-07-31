$(document).ready(function() {
  $('#todo_form').submit(function(e) {
      $('#loadingmessage').show();  // show the loading message.

    e.preventDefault();
    $.ajax({
       type: "POST",
       url: 'php/todoquery.php',
       data: $(this).serialize(),
       success: function(data)
	{
          if (data === 'done') {
         $('#loadingmessage').hide(); 
            $("#result").html("<div id='success-alert' class='alert alert-success alert-dismissable'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <b>Successfully Added</b> </div></div>");
				$('#todo_form')[0].reset();
				  $("#success-alert").alert();
                $("#success-alert").fadeTo(1500, 500).slideUp(500, function(){
                $("#success-alert").slideUp(500);

                });  
          } 
		  else if(data==='error'){
       			$("#result").html("<div id='danger-alert' class='alert alert-danger alert-dismissable'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Something Went Wrong</div></div>");			 
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


