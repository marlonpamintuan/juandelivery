<?php 

require_once '../../../../basefunction/database_connection.php';
require_once '../../../../basefunction/security.php';
//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$MESSAGE_MESSAGE = security($_POST['MESSAGE_MESSAGE']);
	$MESSAGE_FROM = $_POST['userid'];
	$MESSAGE_TO = "1";
	$MESSAGE_TIME = date('d-M-Y H:i:s',strtotime('+6 hours'));

	$sql = "INSERT INTO message (MESSAGE_FROM,MESSAGE_TO,MESSAGE_MESSAGE,MESSAGE_TIME) VALUES ('$MESSAGE_FROM','$MESSAGE_TO','$MESSAGE_MESSAGE','$MESSAGE_TIME')";
	$query = $link->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Successfully Sent";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Error while adding the member information";
	}

	// close the database connection
	$link->close();

	echo json_encode($validator);

}