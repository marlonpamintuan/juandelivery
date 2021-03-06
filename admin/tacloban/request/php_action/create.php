<?php 

require_once '../../../../basefunction/database_connection.php';
require_once '../../../../basefunction/security.php';
//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$BOOKING_PSENDER = security($_POST['BOOKING_PSENDER']);
	$BOOKING_PCONTACTNUMBER = security($_POST['BOOKING_PCONTACTNUMBER']);
	$BOOKING_PCITY = security($_POST['BOOKING_PCITY']);
	$BOOKING_PADDRESS = security($_POST['BOOKING_PADDRESS']);
	$BOOKING_PLANDMARK = security($_POST['BOOKING_PLANDMARK']);
	$BOOKING_DCONSIGNEE = security($_POST['BOOKING_DCONSIGNEE']);
	$BOOKING_DCONTACTNUMBER = security($_POST['BOOKING_DCONTACTNUMBER']);
	$BOOKING_DCITY = security($_POST['BOOKING_DCITY']);
	$BOOKING_DADDRESS = security($_POST['BOOKING_DADDRESS']);
	$BOOKING_DLANDMARK = security($_POST['BOOKING_DLANDMARK']);
	$BOOKING_TYPE = security($_POST['BOOKING_TYPE']);
	$BOOKING_WEIGHT = security($_POST['BOOKING_WEIGHT']);
	$BOOKING_SIZE = security($_POST['BOOKING_SIZE']);
	$BOOKING_REMARKS = security($_POST['BOOKING_REMARKS']);
	$BOOKING_DESCRIPTION = security($_POST['BOOKING_DESCRIPTION']);
	$BOOKING_INSURANCE = security($_POST['BOOKING_INSURANCE']);
	$BOOKING_PAYMENT = security($_POST['BOOKING_PAYMENT']);
	$BOOKING_PRICE = security($_POST['BOOKING_PRICE']);
	$USER_ID = security($_POST['USER_ID']);
	$BOOKING_DATE = date('Y-m-d',strtotime('+6 hours'));
	$BOOKING_DATECREATED= date("m-d-Y H:i:s", strtotime('+6 hours'));
	$sql = "INSERT INTO booking (USER_ID,BOOKING_PSENDER,BOOKING_PCONTACTNUMBER,BOOKING_PCITY,BOOKING_PADDRESS,BOOKING_PLANDMARK,BOOKING_DCONSIGNEE,BOOKING_DCONTACTNUMBER,BOOKING_DCITY,BOOKING_DADDRESS,BOOKING_DLANDMARK,BOOKING_TYPE,BOOKING_WEIGHT,BOOKING_SIZE,BOOKING_REMARKS,BOOKING_INSURANCE,BOOKING_PRICE,BOOKING_STATUS,BOOKING_DATE,BOOKING_DATECREATED,BOOKING_BRANCH,BOOKING_PAYMENT,BOOKING_DESCRIPTION) VALUES ('$USER_ID','$BOOKING_PSENDER','$BOOKING_PCONTACTNUMBER','$BOOKING_PCITY','$BOOKING_PADDRESS','$BOOKING_PLANDMARK','$BOOKING_DCONSIGNEE','$BOOKING_DCONTACTNUMBER','$BOOKING_DCITY','$BOOKING_DADDRESS','$BOOKING_DLANDMARK','$BOOKING_TYPE','$BOOKING_WEIGHT','$BOOKING_SIZE','$BOOKING_REMARKS','$BOOKING_INSURANCE','$BOOKING_PRICE','request','$BOOKING_DATE','$BOOKING_DATECREATED','Tacloban','$BOOKING_PAYMENT','$BOOKING_DESCRIPTION')";
	$query = $link->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Successfully Added";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Error while adding the member information";
	}

	// close the database connection
	$link->close();

	echo json_encode($validator);

}