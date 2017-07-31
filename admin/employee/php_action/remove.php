<?php 

require_once '../../../basefunction/database_connection.php';
$output = array('success' => false, 'messages' => array());
$EMPLOYEE_ID = $_POST['EMPLOYEE_ID'];
$sql = "delete from employee where EMPLOYEE_ID = {$EMPLOYEE_ID}";
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