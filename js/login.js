$(document).ready(function() {
  $('#form').submit(function(e) {
  $('#loadingmessage').show();
    e.preventDefault();
    $.ajax({
       type: "POST",
       url: 'php/login.php',
       data: $(this).serialize(),
       success: function(data)
       {
          if (data === 'login') {
			$('#loadingmessage').hide();
   window.location = 'admin/';
      }
		  
		  else if(data === 'no'){
        $('#loadingmessage').hide();
		  $("#result").html("<div id='danger-alert' class='alert alert-danger alert-dismissable text-center' style='font-family:arial;'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <b><span class='fa fa-exclamation-circle-o'></span>&nbsp;&nbsp;Sorry, that account does not exist. Try again. </b></div></div>");
		  $('#form')[0].reset();
    	document.getElementById("SECURITY_PASSWORD").value = "";
			document.getElementById("SECURITY_USERNAME").focus();
			$("#danger-alert").alert();
                $("#danger-alert").fadeTo(1500, 500).slideUp(500, function(){
                $("#danger-alert").slideUp(500);
                }); 

		  }else if(data === 'customer'){
		  $('#loadingmessage').hide();
		   window.location = 'customer/account/';
		  }else if(data === 'tacloban'){
      $('#loadingmessage').hide();
       window.location = 'admin/tacloban/';
      }
          else {
              $('#loadingmessage').hide();
		  username=$("#SECURITY_USERNAME").val("");
          password=$("#SECURITY_PASSWORD").val("");
           $("#result").html("<div id='danger-alert2' class='alert alert-danger text-center alert-dismissable text-center' style='font-family:arial;'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <b><span class='fa fa-exclamation-circle'></span>&nbsp;&nbsp;Sorry, Something went wrong. </b></div></div>");
		  
			$("#danger-alert2").alert();
                $("#danger-alert2").fadeTo(1500, 500).slideUp(500, function(){
                $("#danger-alert2").slideUp(500);
                }); 
          }
       }
   });
 });
});