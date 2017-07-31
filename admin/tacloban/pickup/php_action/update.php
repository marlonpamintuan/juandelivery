<?php 

require_once '../../../../basefunction/database_connection.php';
require_once '../../../../basefunction/security.php';
//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());
	$BOOKING_ID = security($_POST['BOOKING_ID']);
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
	$BOOKING_PRICE = security($_POST['BOOKING_PRICE']);
	$BOOKING_BILLNUMBER = security($_POST['BOOKING_BILLNUMBER']);
	$BOOKING_PDATE = security($_POST['BOOKING_PDATE']);
	$BOOKING_PTIME = security($_POST['BOOKING_PTIME']);
	$BOOKING_PBY = security($_POST['BOOKING_PBY']);
		$BOOKING_PAYMENT = security($_POST['BOOKING_PAYMENT']);
	$BOOKING_CODPAYMENT = security($_POST['BOOKING_CODPAYMENT']);
	$BOOKING_DELIVERYDATE = security($_POST['BOOKING_DELIVERYDATE']);
	$check = mysqli_query($link,"select * from booking where BOOKING_BILLNUMBER='$BOOKING_BILLNUMBER' and BOOKING_STATUS != 'deleted'");
	$count = mysqli_num_rows($check);
	if($count > 0)
	{
		$validator['success'] = false;
		$validator['messages'] = "Duplicate Bill Number";

	}else{	
	$sql = "UPDATE booking SET BOOKING_PSENDER = '$BOOKING_PSENDER', BOOKING_PCONTACTNUMBER = '$BOOKING_PCONTACTNUMBER', BOOKING_PCITY = '$BOOKING_PCITY', BOOKING_PADDRESS = '$BOOKING_PADDRESS', BOOKING_PLANDMARK = '$BOOKING_PLANDMARK', BOOKING_DCONSIGNEE = '$BOOKING_DCONSIGNEE', BOOKING_DCONTACTNUMBER = '$BOOKING_DCONTACTNUMBER', BOOKING_DCITY = '$BOOKING_DCITY', BOOKING_DADDRESS = '$BOOKING_DADDRESS', BOOKING_DLANDMARK = '$BOOKING_DLANDMARK', BOOKING_TYPE = '$BOOKING_TYPE', BOOKING_WEIGHT = '$BOOKING_WEIGHT', BOOKING_SIZE = '$BOOKING_SIZE', BOOKING_REMARKS = '$BOOKING_REMARKS', BOOKING_INSURANCE = '$BOOKING_INSURANCE', BOOKING_PRICE = '$BOOKING_PRICE', BOOKING_BILLNUMBER = '$BOOKING_BILLNUMBER', BOOKING_PDATE = '$BOOKING_PDATE', BOOKING_PTIME = '$BOOKING_PTIME', BOOKING_PBY = '$BOOKING_PBY', BOOKING_CODPAYMENT = '$BOOKING_CODPAYMENT', BOOKING_DELIVERYDATE = '$BOOKING_DELIVERYDATE', BOOKING_STATUS='for-delivery', BOOKING_PAYMENT='$BOOKING_PAYMENT', BOOKING_DESCRIPTION='$BOOKING_DESCRIPTION' WHERE BOOKING_ID = '$BOOKING_ID'";
	$query = $link->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Successfully modified information, this item will now move to delivery";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Error while adding the member information";
	}
}
	// close the database connection
	$link->close();

	echo json_encode($validator);

}