<?php 

require_once '../../../basefunction/database_connection.php';
session_start();
$output = array('data' => array());
$USER_ID = $_SESSION['session_id'];
$sql = "SELECT * FROM message inner join security ON security.USER_ID=message.MESSAGE_FROM where message.MESSAGE_FROM='$USER_ID' OR message.MESSAGE_TO='$USER_ID' ORDER BY message.MESSAGE_TIME DESC";
$query = $link->query($sql);
while ($row = $query->fetch_assoc()) {
$TO = $row['MESSAGE_TO'];
$sql2 = "SELECT * FROM message inner join security ON security.USER_ID = '$TO'";
$query2 = $link->query($sql2);
$row2 = $query2->fetch_assoc();

	$active = '';
	if($row['USER_ID'] == $USER_ID) {
		$active = '<label class="label label-primary">You</label>&nbsp;<label class="label label-success">Reply to '.$row2['SECURITY_USERNAME'].'</label>';
	}else{
$active = '<label class="label label-default">'.$row['SECURITY_USERNAME'].'</label>';
	}
//  <li><a type="button" href=""  data-toggle="modal" data-target="#deliveryMemberModal" onclick="delivery('.$row['BOOKING_ID'].')"> <span class="fa fa-spinner"></span> For-Delivery</a></li>		
	$output['data'][] = array($active,$row['MESSAGE_MESSAGE'],$row['MESSAGE_TIME']);

}

// database connection close
$link->close();

echo json_encode($output);