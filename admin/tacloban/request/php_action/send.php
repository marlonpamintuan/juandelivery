<?php 

require_once '../../../../basefunction/database_connection.php';
$output = array('success' => false, 'messages' => array());
$BOOKING_ID = $_POST['BOOKING_ID'];
$sql = "update booking set BOOKING_BRANCH ='Manila' where BOOKING_ID = {$BOOKING_ID}";
$query = $link->query($sql);
if($query === TRUE) {
	$output['success'] = true;
	$output['messages'] = 'Successfully moved to MANILA BRANCH';
} else {
	$output['success'] = false;
	$output['messages'] = 'Error while moving to MANILA BRANCH';
}

// close database connection
$link->close();

echo json_encode($output);