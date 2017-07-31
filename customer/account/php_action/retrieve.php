<?php 

require_once '../../../basefunction/database_connection.php';
session_start();
$SESSION_ID = $_SESSION['session_id'];
$output = array('data' => array());

$sql = "SELECT * FROM booking where BOOKING_STATUS ='request' and USER_ID='$SESSION_ID'";
$query = $link->query($sql);


while ($row = $query->fetch_assoc()) {


	$actionButton = '
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	 <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	        
	    <li><a type="button" href="" data-toggle="modal" data-target="#removeMemberModal" onclick="removeMember('.$row['BOOKING_ID'].')"> <span class="glyphicon glyphicon-trash text-danger"></span> Cancel Request</a></li>	    
	 
	  </ul>
	</div>
		';

	$output['data'][] = array(
$actionButton,
		$row['BOOKING_PSENDER'],
			$row['BOOKING_DCONSIGNEE'],
		$row['BOOKING_PCONTACTNUMBER'],
		$row['BOOKING_PCITY'],
		$row['BOOKING_DCITY'],
		$row['BOOKING_TYPE'],
		$row['BOOKING_REMARKS'],
		$row['BOOKING_DATE']

	
		
	);

}

// database connection close
$link->close();

echo json_encode($output);