<?php 

require_once '../../../basefunction/database_connection.php';
//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$MESSAGE_MESSAGE = $_POST['MESSAGE_MESSAGE'];
	$MESSAGE_FROM = $_POST['MESSAGE_FROM'];
	$MESSAGE_TO = $_POST['MESSAGE_TO'];
	$MESSAGE_TIME = date('d-M-Y H:i:s',strtotime('+6 hours'));
	$sql = "INSERT INTO message (MESSAGE_MESSAGE,MESSAGE_FROM,MESSAGE_TO,MESSAGE_TIME) VALUES ('$MESSAGE_MESSAGE','$MESSAGE_FROM','$MESSAGE_TO','$MESSAGE_TIME')";
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