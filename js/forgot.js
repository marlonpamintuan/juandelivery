$(document).ready(function() {
  $('#form').submit(function(e) {
  $('#loadingmessage').show();
    e.preventDefault();
    $.ajax({
       type: "POST",
       url: 'php/forgot.php',
       data: $(this).serialize(),
       success: function(data)
       {
          if (data === 'done') {
      
      $('#loadingmessage').hide();
            $("#result").html("<div id='success-alert' class='alert alert-success alert-dismissable text-center'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <b>Successfully sent password in your email address</b></div></div>");
		$('#form')[0].reset();
		
							  $("#success-alert").alert();
                $("#success-alert").fadeTo(1000, 500).slideUp(500, function(){
                $("#success-alert").slideUp(500);
          
                });  
          }else if(data === 'email'){
		  $('#loadingmessage').hide();
      
      $("#result").html("<div id='warning-alert' class='alert alert-warning alert-dismissable text-center'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <b>Sorry, Email address doesn't exist in our database. </b></div></div>");
				document.getElementById("USER_EMAIL").value = "";
							  $("#warning-alert").alert();
                $("#warning-alert").fadeTo(1500, 500).slideUp(500, function(){
                $("#warning-alert").slideUp(500);
                });  
		  }
		  
		  
          else {
              $('#loadingmessage').hide();
		    $("#result").html(data);
       
          }
       }
   });
 });
});