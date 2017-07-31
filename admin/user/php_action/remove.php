<?php 

require_once '../../../basefunction/database_connection.php';
$output = array('success' => false, 'messages' => array());
$USER_ID = $_POST['USER_ID'];
$sql = "delete user.*,security.* from user inner join security on user.USER_ID = security.USER_ID where user.USER_ID = {$USER_ID}";
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