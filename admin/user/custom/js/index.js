// global the manage memeber table 
var manageMemberTable;

$(document).ready(function() {
	manageMemberTable = $("#manageMemberTable").DataTable({
		"ajax": "php_action/retrieve.php",
		"order": []
	});

	$("#addMemberModalBtn").on('click', function() {
		// reset the form 
		$("#createMemberForm")[0].reset();
		// remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".messages").html("");

		// submit form
		$("#createMemberForm").unbind('submit').bind('submit', function() {

			$(".text-danger").remove();

			var form = $(this);

			// validation
				var USER_FIRSTNAMEC = $("#USER_FIRSTNAMEC").val();
					var USER_LASTNAMEC = $("#USER_LASTNAMEC").val();
					var USER_CONTACTNUMBERC = $("#USER_CONTACTNUMBERC").val();
					var USER_EMAILC = $("#USER_EMAILC").val();
				var SECURITY_USERNAMEC = $("#SECURITY_USERNAMEC").val();
				var SECURITY_PASSWORDC = $("#SECURITY_PASSWORDC").val();
				var SECURITY_ACCESS = $("#SECURITY_ACCESS").val();


					if(USER_FIRSTNAMEC == "") {
						$("#USER_FIRSTNAMEC").closest('.input-group').addClass('has-error');
						
					} else {
						$("#USER_FIRSTNAMEC").closest('.input-group').removeClass('has-error');
						$("#USER_FIRSTNAMEC").closest('.input-group').addClass('has-success');				
					}
					if(USER_LASTNAMEC == "") {
						$("#USER_LASTNAMEC").closest('.input-group').addClass('has-error');
						
					} else {
						$("#USER_LASTNAMEC").closest('.input-group').removeClass('has-error');
						$("#USER_LASTNAMEC").closest('.input-group').addClass('has-success');				
					}
					if(USER_EMAILC == "") {
						$("#USER_EMAILC").closest('.input-group').addClass('has-error');
						
					} else {
						$("#USER_EMAILC").closest('.input-group').removeClass('has-error');
						$("#USER_EMAILC").closest('.input-group').addClass('has-success');				
					}
					if(SECURITY_USERNAMEC == "") {
						$("#SECURITY_USERNAMEC").closest('.input-group').addClass('has-error');
						
					} else {
						$("#SECURITY_USERNAMEC").closest('.input-group').removeClass('has-error');
						$("#SECURITY_USERNAMEC").closest('.input-group').addClass('has-success');				
					}
					if(SECURITY_PASSWORDC == "") {
						$("#SECURITY_PASSWORDC").closest('.input-group').addClass('has-error');
						
					} else {
						$("#SECURITY_PASSWORDC").closest('.input-group').removeClass('has-error');
						$("#SECURITY_PASSWORDC").closest('.input-group').addClass('has-success');				
					}
					if(SECURITY_ACCESS == "") {
						$("#SECURITY_ACCESS").closest('.input-group').addClass('has-error');
						
					} else {
						$("#SECURITY_ACCESS").closest('.input-group').removeClass('has-error');
						$("#SECURITY_ACCESS").closest('.input-group').addClass('has-success');				
					}



			if(USER_FIRSTNAMEC && USER_LASTNAMEC && USER_EMAILC && SECURITY_USERNAMEC && SECURITY_PASSWORDC && SECURITY_ACCESS) {
				//submi the form to server
				$.ajax({
					url : form.attr('action'),
					type : form.attr('method'),
					data : form.serialize(),
					dataType : 'json',
					success:function(response) {

						// remove the error 
						$(".form-group").removeClass('has-error').removeClass('has-success');

						if(response.success == true) {
							$(".messages").html('<div id="success-create" class="alert alert-success alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
							'</div>');
							  $("#success-create").fadeTo(1500, 500).slideUp(500, function(){
                $("#success-create").slideUp(500);
				
                });  
							// reset the form
							$("#createMemberForm")[0].reset();		

							// reload the datatables
							manageMemberTable.ajax.reload(null, false);
							// this function is built in function of datatables;

						} else {
							$(".messages").html('<div id="warning-create" class="alert alert-warning alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
							'</div>');
							  $("#warning-create").fadeTo(1500, 500).slideUp(500, function(){
                $("#warning-create").slideUp(500);
				
                });  
						}  // /else
					} // success  
				}); // ajax subit 				
			} /// if


			return false;
		}); // /submit form for create member
	}); // /add modal

});

function removeMember(id = null) {
	if(id) {
		// click on remove button
		$("#removeBtn").unbind('click').bind('click', function() {
			$.ajax({
				url: 'php_action/remove.php',
				type: 'post',
				data: {USER_ID : id},
				dataType: 'json',
				success:function(response) {
					if(response.success == true) {						
						$(".removeMessages").html('<div id="success-remove" class="alert alert-success alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
							'</div>');
							  $("#success-remove").fadeTo(1500, 500).slideUp(500, function(){
                $("#success-remove").slideUp(500);
				
                });  

						// refresh the table
						manageMemberTable.ajax.reload(null, false);

						// close the modal
						$("#removeMemberModal").modal('hide');

					} else {
						$(".removeMessages").html('<div id="warning-remove" class="alert alert-warning alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
							'</div>');
							  $("#warning-remove").fadeTo(1500, 500).slideUp(500, function(){
                $("#warning-remove").slideUp(500);
				
                });  
					}
				}
			});
		}); // click remove btn
	} else {
		alert('Error: Refresh the page again');
	}
}


function editMember(id = null) {
	if(id) {

		// remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".edit-messages").html("");

		// remove the id
		$("#EMPLOYEE_ID").remove();

		// fetch the member data
		$.ajax({
			url: 'php_action/getSelectedMember.php',
			type: 'post',
			data: {USER_ID : id},
			dataType: 'json',
			success:function(response) {
				$("#USER_FIRSTNAME").val(response.USER_FIRSTNAME);
			$("#USER_LASTNAME").val(response.USER_LASTNAME);
			$("#USER_CONTACTNUMBER").val(response.USER_CONTACTNUMBER);
			$("#USER_EMAIL").val(response.USER_EMAIL);
			$("#SECURITY_USERNAME").val(response.SECURITY_USERNAME);
			$("#SECURITY_PASSWORD").val(response.SECURITY_PASSWORD);
	
				// mmeber id 
				$(".editMemberModal").append('<input type="hidden" name="USER_ID" id="USER_ID" value="'+response.USER_ID+'"/>');

				// here update the member data
				$("#updateMemberForm").unbind('submit').bind('submit', function() {
					// remove error messages
					$(".text-danger").remove();

					var form = $(this);

					// validation
					var USER_FIRSTNAME = $("#USER_FIRSTNAME").val();
					var USER_LASTNAME = $("#USER_LASTNAME").val();
					var USER_CONTACTNUMBER = $("#USER_CONTACTNUMBER").val();
					var USER_EMAIL = $("#USER_EMAIL").val();
				var SECURITY_USERNAME = $("#SECURITY_USERNAME").val();
				var SECURITY_PASSWORD = $("#SECURITY_PASSWORD").val();
				

					if(USER_FIRSTNAME == "") {
						$("#USER_FIRSTNAME").closest('.input-group').addClass('has-error');
						
					} else {
						$("#USER_FIRSTNAME").closest('.input-group').removeClass('has-error');
						$("#USER_FIRSTNAME").closest('.input-group').addClass('has-success');				
					}
					if(USER_LASTNAME == "") {
						$("#USER_LASTNAME").closest('.input-group').addClass('has-error');
						
					} else {
						$("#USER_LASTNAME").closest('.input-group').removeClass('has-error');
						$("#USER_LASTNAME").closest('.input-group').addClass('has-success');				
					}
					if(USER_EMAIL == "") {
						$("#USER_EMAIL").closest('.input-group').addClass('has-error');
						
					} else {
						$("#USER_EMAIL").closest('.input-group').removeClass('has-error');
						$("#USER_EMAIL").closest('.input-group').addClass('has-success');				
					}
					if(SECURITY_USERNAME == "") {
						$("#SECURITY_USERNAME").closest('.input-group').addClass('has-error');
						
					} else {
						$("#SECURITY_USERNAME").closest('.input-group').removeClass('has-error');
						$("#SECURITY_USERNAME").closest('.input-group').addClass('has-success');				
					}
					if(SECURITY_PASSWORD == "") {
						$("#SECURITY_PASSWORD").closest('.input-group').addClass('has-error');
						
					} else {
						$("#SECURITY_PASSWORD").closest('.input-group').removeClass('has-error');
						$("#SECURITY_PASSWORD").closest('.input-group').addClass('has-success');				
					}
					

					
					if(USER_FIRSTNAME && USER_LASTNAME && USER_EMAIL && SECURITY_USERNAME && SECURITY_PASSWORD) {
						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
								if(response.success == true) {
									$(".edit-messages").html('<div id="success-edit" class="alert alert-success alert-dismissible" role="alert">'+
									  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
									  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
									'</div>');
										  $("#success-edit").fadeTo(1500, 500).slideUp(500, function(){
                $("#success-edit").slideUp(500);
				
                });  

									// reload the datatables
									manageMemberTable.ajax.reload(null, false);
									// this function is built in function of datatables;

									// remove the error 
									$(".input-group").removeClass('has-success').removeClass('has-error');
									$(".text-danger").remove();
								} else {
									$(".edit-messages").html('<div id="warning-edit" class="alert alert-warning alert-dismissible" role="alert">'+
									  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
									  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
									'</div>');
										  $("#warning-edit").fadeTo(1500, 500).slideUp(500, function(){
                $("#warning-edit").slideUp(500);
				
                });  
								}
							} // /success
						}); // /ajax
					} // /if

					return false;
				});

			} // /success
		}); // /fetch selected member info

	} else {
		alert("Error : Refresh the page again");
	}
}