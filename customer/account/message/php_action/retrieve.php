<?php 

require_once '../../../../basefunction/database_connection.php';
session_start();
$output = array('data' => array());
$USER_ID = $_SESSION['session_id'];
$sql = "SELECT * FROM message inner join user ON user.USER_ID=message.MESSAGE_FROM where message.MESSAGE_FROM='$USER_ID' OR message.MESSAGE_TO='$USER_ID' ORDER BY message.MESSAGE_TIME DESC";
$query = $link->query($sql);


while ($row = $query->fetch_assoc()) {
	$active = '';
	if($row['USER_ID'] == $USER_ID) {
		$active = '<label class="label label-primary">You</label>';
	}else{
$active = '<label class="label label-default">Admin</label>';
	}
//  <li><a type="button" href=""  data-toggle="modal" data-target="#deliveryMemberModal" onclick="delivery('.$row['BOOKING_ID'].')"> <span class="fa fa-spinner"></span> For-Delivery</a></li>		
	$output['data'][] = array(
		$active,
		$row['MESSAGE_MESSAGE'],
		$row['MESSAGE_TIME']
		
	);

}

// database connection close
$link->close();

echo json_encode($output);