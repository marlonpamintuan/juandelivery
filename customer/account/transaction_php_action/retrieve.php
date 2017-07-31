<?php 

require_once '../../../basefunction/database_connection.php';
session_start();
$SESSION_ID = $_SESSION['session_id'];
$output = array('data' => array());

$sql = "SELECT * FROM booking where BOOKING_STATUS !='request' and BOOKING_STATUS !='deleted' and USER_ID='$SESSION_ID'";
$query = $link->query($sql);


while ($row = $query->fetch_assoc()) {
	$active = '';
	if($row['BOOKING_STATUS'] == 'for-pickup') {
		$active = '<label class="label label-warning">FOR PICKUP</label>';
	} elseif($row['BOOKING_STATUS'] == 'for-delivery') {
		$active = '<label class="label label-info">FOR DELIVERY</label>'; 
	}elseif($row['BOOKING_STATUS'] == 'cancelled'){
		$active = '<label class="label label-danger">CANCELLED</label>';
	}elseif($row['BOOKING_STATUS'] == 'done'){
$active = '<label class="label label-success">DONE</label>';
	}
$view = '<a href="" class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#editMemberModal" onclick="editMember('.$row['BOOKING_ID'].')"> <span class="fa fa-eye"></span></a>';
	

	$output['data'][] = array(
$view,
		$row['BOOKING_PSENDER'],
			$row['BOOKING_DCONSIGNEE'],
		$row['BOOKING_PCONTACTNUMBER'],
		$row['BOOKING_PCITY'],
		$row['BOOKING_DCITY'],
		$row['BOOKING_TYPE'],
		$row['BOOKING_REMARKS'],
			$active,
		$row['BOOKING_DATE']

	
		
	);

}

// database connection close
$link->close();

echo json_encode($output);