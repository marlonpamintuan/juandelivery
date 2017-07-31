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
			var name = $("#name").val();
			var address = $("#address").val();
			var contact = $("#contact").val();
			var active = $("#active").val();

			if(name == "") {
				$("#name").closest('.form-group').addClass('has-error');
				$("#name").after('<p class="text-danger">The Name field is required</p>');
			} else {
				$("#name").closest('.form-group').removeClass('has-error');
				$("#name").closest('.form-group').addClass('has-success');				
			}

			if(address == "") {
				$("#address").closest('.form-group').addClass('has-error');
				$("#address").after('<p class="text-danger">The Address field is required</p>');
			} else {
				$("#address").closest('.form-group').removeClass('has-error');
				$("#address").closest('.form-group').addClass('has-success');				
			}

			if(contact == "") {
				$("#contact").closest('.form-group').addClass('has-error');
				$("#contact").after('<p class="text-danger">The Contact field is required</p>');
			} else {
				$("#contact").closest('.form-group').removeClass('has-error');
				$("#contact").closest('.form-group').addClass('has-success');				
			}

			if(active == "") {
				$("#active").closest('.form-group').addClass('has-error');
				$("#active").after('<p class="text-danger">The Active field is required</p>');
			} else {
				$("#active").closest('.form-group').removeClass('has-error');
				$("#active").closest('.form-group').addClass('has-success');				
			}

			if(name && address && contact && active) {
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
							$(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
							'</div>');

							// reset the form
							$("#createMemberForm")[0].reset();		

							// reload the datatables
							manageMemberTable.ajax.reload(null, false);
							// this function is built in function of datatables;

						} else {
							$(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
							'</div>');
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
				data: {BOOKING_ID : id},
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


function delivery(id = null) {
	if(id) {
		// click on remove button
		$("#deliveryBtn").unbind('click').bind('click', function() {
			$.ajax({
				url: 'php_action/delivery.php',
				type: 'post',
				data: {BOOKING_ID : id},
				dataType: 'json',
				success:function(response) {
					if(response.success == true) {						
						$(".deliveryMessages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
							'</div>');

						// refresh the table
						manageMemberTable.ajax.reload(null, false);

						// close the modal
						$("#deliveryMemberModal").modal('hide');

					} else {
						$(".deliveryMessages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
							'</div>');
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
		$("#BOOKING_ID").remove();

		// fetch the member data
		$.ajax({
			url: 'php_action/getSelectedMember.php',
			type: 'post',
			data: {BOOKING_ID : id},
			dataType: 'json',
			success:function(response) {
				$("#BOOKING_PSENDER").val(response.BOOKING_PSENDER);
				$("#BOOKING_PCONTACTNUMBER").val(response.BOOKING_PCONTACTNUMBER);
				$("#BOOKING_PCITY").val(response.BOOKING_PCITY);
				$("#BOOKING_PADDRESS").val(response.BOOKING_PADDRESS);
				$("#BOOKING_PLANDMARK").val(response.BOOKING_PLANDMARK);		
				$("#BOOKING_DCONSIGNEE").val(response.BOOKING_DCONSIGNEE);
				$("#BOOKING_DCONTACTNUMBER").val(response.BOOKING_DCONTACTNUMBER);
				$("#BOOKING_DCITY").val(response.BOOKING_DCITY);
				$("#BOOKING_DADDRESS").val(response.BOOKING_DADDRESS);
				$("#BOOKING_DLANDMARK").val(response.BOOKING_DLANDMARK);
				$("#BOOKING_TYPE").val(response.BOOKING_TYPE);
				$("#BOOKING_WEIGHT").val(response.BOOKING_WEIGHT);
				$("#BOOKING_SIZE").val(response.BOOKING_SIZE);
				$("#BOOKING_REMARKS").val(response.BOOKING_REMARKS);
				$("#BOOKING_INSURANCE").val(response.BOOKING_INSURANCE);
				$("#BOOKING_PRICE").val(response.BOOKING_PRICE);
				$("#BOOKING_BILLNUMBER").val(response.BOOKING_BILLNUMBER);
				$("#BOOKING_PDATE").val(response.BOOKING_PDATE);
				$("#BOOKING_PTIME").val(response.BOOKING_PTIME);
				$("#BOOKING_PBY").val(response.BOOKING_PBY);
				$("#BOOKING_PAYMENT").val(response.BOOKING_PAYMENT);
				$("#BOOKING_CODPAYMENT").val(response.BOOKING_CODPAYMENT);
				$("#BOOKING_DELIVERYDATE").val(response.BOOKING_DELIVERYDATE);
				$("#BOOKING_DESCRIPTION").val(response.BOOKING_DESCRIPTION);
				// mmeber id 
				$(".editMemberModal").append('<input type="hidden" name="BOOKING_ID" id="BOOKING_ID" value="'+response.BOOKING_ID+'"/>');

				// here update the member data
				$("#updateMemberForm").unbind('submit').bind('submit', function() {
					// remove error messages
					$(".text-danger").remove();

					var form = $(this);

					// validation
					var BOOKING_PSENDER = $("#BOOKING_PSENDER").val();
					var BOOKING_PCONTACTNUMBER = $("#BOOKING_PCONTACTNUMBER").val();
					var BOOKING_PCITY = $("#BOOKING_PCITY").val();
					var BOOKING_PADDRESS = $("#BOOKING_PADDRESS").val();
					var BOOKING_PLANDMARK = $("#BOOKING_PLANDMARK").val();
					var BOOKING_DCONSIGNEE = $("#BOOKING_DCONSIGNEE").val();
					var BOOKING_DCONTACTNUMBER = $("#BOOKING_DCONTACTNUMBER").val();
					var BOOKING_DCITY = $("#BOOKING_DCITY").val();
					var BOOKING_DADDRESS = $("#BOOKING_DADDRESS").val();
					var BOOKING_DLANDMARK = $("#BOOKING_DLANDMARK").val();
					var BOOKING_TYPE = $("#BOOKING_TYPE").val();
					var BOOKING_WEIGHT = $("#BOOKING_WEIGHT").val();
					var BOOKING_SIZE = $("#BOOKING_SIZE").val();
					var BOOKING_REMARKS = $("#BOOKING_REMARKS").val();
					var BOOKING_DESCRIPTION = $("#BOOKING_DESCRIPTION").val();
					var BOOKING_INSURANCE = $("#BOOKING_INSURANCE").val();
					var BOOKING_PRICE = $("#BOOKING_PRICE").val();
					var BOOKING_BILLNUMBER = $("#BOOKING_BILLNUMBER").val();
					var BOOKING_PDATE = $("#BOOKING_PDATE").val();
					var BOOKING_PTIME = $("#BOOKING_PTIME").val();
					var BOOKING_PBY = $("#BOOKING_PBY").val();
					var BOOKING_CODPAYMENT = $("#BOOKING_CODPAYMENT").val();
					var BOOKING_DELIVERYDATE = $("#BOOKING_DELIVERYDATE").val();
					var BOOKING_PAYMENT = $("#BOOKING_PAYMENT").val();

					if(BOOKING_PSENDER == "") {
						$("#BOOKING_PSENDER").closest('.input-group').addClass('has-error');
						
					} else {
						$("#BOOKING_PSENDER").closest('.input-group').removeClass('has-error');
						$("#BOOKING_PSENDER").closest('.input-group').addClass('has-success');				
					}

					if(BOOKING_PCONTACTNUMBER == "") {
						$("#BOOKING_PCONTACTNUMBER").closest('.input-group').addClass('has-error');
					} else {
						$("#BOOKING_PCONTACTNUMBER").closest('.input-group').removeClass('has-error');
						$("#BOOKING_PCONTACTNUMBER").closest('.input-group').addClass('has-success');				
					}

					if(BOOKING_PCITY == "") {
						$("#BOOKING_PCITY").closest('.input-group').addClass('has-error');
						//$("#BOOKING_PCITY").after('<p class="text-danger">The Contact field is required</p>');
					} else {
						$("#BOOKING_PCITY").closest('.input-group').removeClass('has-error');
						$("#BOOKING_PCITY").closest('.input-group').addClass('has-success');				
					}

					if(BOOKING_PADDRESS == "") {
						$("#BOOKING_PADDRESS").closest('.input-group').addClass('has-error');
					} else {
						$("#BOOKING_PADDRESS").closest('.input-group').removeClass('has-error');
						$("#BOOKING_PADDRESS").closest('.input-group').addClass('has-success');				
					}
					
					if(BOOKING_DCONSIGNEE == "") {
						$("#BOOKING_DCONSIGNEE").closest('.input-group').addClass('has-error');
						} else {
						$("#BOOKING_DCONSIGNEE").closest('.input-group').removeClass('has-error');
						$("#BOOKING_DCONSIGNEE").closest('.input-group').addClass('has-success');				
					}
					if(BOOKING_DCONTACTNUMBER == "") {
						$("#BOOKING_DCONTACTNUMBER").closest('.input-group').addClass('has-error');
					} else {
						$("#BOOKING_DCONTACTNUMBER").closest('.input-group').removeClass('has-error');
						$("#BOOKING_DCONTACTNUMBER").closest('.input-group').addClass('has-success');				
					}
					if(BOOKING_DCITY == "") {
						$("#BOOKING_DCITY").closest('.input-group').addClass('has-error');
				} else {
						$("#BOOKING_DCITY").closest('.input-group').removeClass('has-error');
						$("#BOOKING_DCITY").closest('.input-group').addClass('has-success');				
					}
					if(BOOKING_DADDRESS == "") {
						$("#BOOKING_DADDRESS").closest('.input-group').addClass('has-error');
					} else {
						$("#BOOKING_DADDRESS").closest('.input-group').removeClass('has-error');
						$("#BOOKING_DADDRESS").closest('.input-group').addClass('has-success');				
					}
					
				
					if(BOOKING_PSENDER && BOOKING_PCONTACTNUMBER && BOOKING_PCITY && BOOKING_PADDRESS && BOOKING_DCONSIGNEE && BOOKING_DCONTACTNUMBER && BOOKING_DCITY && BOOKING_DADDRESS) {
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