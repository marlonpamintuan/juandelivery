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
				var EMPLOYEE_FIRSTNAMEC = $("#EMPLOYEE_FIRSTNAMEC").val();
					var EMPLOYEE_LASTNAMEC = $("#EMPLOYEE_LASTNAMEC").val();
					var EMPLOYEE_CONTACTNUMBERC = $("#EMPLOYEE_CONTACTNUMBERC").val();
					var EMPLOYEE_POSITIONC = $("#EMPLOYEE_POSITIONC").val();
				


					if(EMPLOYEE_FIRSTNAMEC == "") {
						$("#EMPLOYEE_FIRSTNAMEC").closest('.input-group').addClass('has-error');
						
					} else {
						$("#EMPLOYEE_FIRSTNAMEC").closest('.input-group').removeClass('has-error');
						$("#EMPLOYEE_FIRSTNAMEC").closest('.input-group').addClass('has-success');				
					}
					if(EMPLOYEE_LASTNAMEC == "") {
						$("#EMPLOYEE_LASTNAMEC").closest('.input-group').addClass('has-error');
						
					} else {
						$("#EMPLOYEE_LASTNAMEC").closest('.input-group').removeClass('has-error');
						$("#EMPLOYEE_LASTNAMEC").closest('.input-group').addClass('has-success');				
					}
					if(EMPLOYEE_POSITIONC == "") {
						$("#EMPLOYEE_POSITIONC").closest('.input-group').addClass('has-error');
						
					} else {
						$("#EMPLOYEE_POSITIONC").closest('.input-group').removeClass('has-error');
						$("#EMPLOYEE_POSITIONC").closest('.input-group').addClass('has-success');				
					}


			if(EMPLOYEE_FIRSTNAMEC && EMPLOYEE_LASTNAMEC && EMPLOYEE_POSITIONC) {
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
				data: {EMPLOYEE_ID : id},
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
			data: {EMPLOYEE_ID : id},
			dataType: 'json',
			success:function(response) {
				$("#EMPLOYEE_FIRSTNAME").val(response.EMPLOYEE_FIRSTNAME);
			$("#EMPLOYEE_LASTNAME").val(response.EMPLOYEE_LASTNAME);
			$("#EMPLOYEE_CONTACTNUMBER").val(response.EMPLOYEE_CONTACTNUMBER);
			$("#EMPLOYEE_POSITION").val(response.EMPLOYEE_POSITION);
				// mmeber id 
				$(".editMemberModal").append('<input type="hidden" name="EMPLOYEE_ID" id="EMPLOYEE_ID" value="'+response.EMPLOYEE_ID+'"/>');

				// here update the member data
				$("#updateMemberForm").unbind('submit').bind('submit', function() {
					// remove error messages
					$(".text-danger").remove();

					var form = $(this);

					// validation
					var EMPLOYEE_FIRSTNAME = $("#EMPLOYEE_FIRSTNAME").val();
					var EMPLOYEE_LASTNAME = $("#EMPLOYEE_LASTNAME").val();
					var EMPLOYEE_CONTACTNUMBER = $("#EMPLOYEE_CONTACTNUMBER").val();
					var EMPLOYEE_POSITION = $("#EMPLOYEE_POSITION").val();
				


					if(EMPLOYEE_FIRSTNAME == "") {
						$("#EMPLOYEE_FIRSTNAME").closest('.input-group').addClass('has-error');
						
					} else {
						$("#EMPLOYEE_FIRSTNAME").closest('.input-group').removeClass('has-error');
						$("#EMPLOYEE_FIRSTNAME").closest('.input-group').addClass('has-success');				
					}
					if(EMPLOYEE_LASTNAME == "") {
						$("#EMPLOYEE_LASTNAME").closest('.input-group').addClass('has-error');
						
					} else {
						$("#EMPLOYEE_LASTNAME").closest('.input-group').removeClass('has-error');
						$("#EMPLOYEE_LASTNAME").closest('.input-group').addClass('has-success');				
					}
					if(EMPLOYEE_POSITION == "") {
						$("#EMPLOYEE_POSITION").closest('.input-group').addClass('has-error');
						
					} else {
						$("#EMPLOYEE_POSITION").closest('.input-group').removeClass('has-error');
						$("#EMPLOYEE_POSITION").closest('.input-group').addClass('has-success');				
					}

					
					if(EMPLOYEE_FIRSTNAME && EMPLOYEE_LASTNAME && EMPLOYEE_POSITION) {
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