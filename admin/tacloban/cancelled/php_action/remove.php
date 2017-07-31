<?php 

require_once '../../../../basefunction/database_connection.php';
$output = array('success' => false, 'messages' => array());
$BOOKING_ID = $_POST['BOOKING_ID'];
$BOOKING_DATEDELETED = date("m-d-Y H:i:s", strtotime('+6 hours'));
$sql = "update booking set BOOKING_STATUS='deleted',BOOKING_DATEDELETED='$BOOKING_DATEDELETED' where BOOKING_ID = {$BOOKING_ID}";
$query = $link->query($sql);
if($query === TRUE) {
	$output['success'] = true;
	$output['messages'] = 'Successfully removed';
} else {
	$output['success'] = false;
	$output['messages'] = 'Error while removing the member information';
}

// close database connection
$link->close();

echo json_encode($output);