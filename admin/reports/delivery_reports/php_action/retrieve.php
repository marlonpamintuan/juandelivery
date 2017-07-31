<?php 

require_once '../../../../basefunction/database_connection.php';

$output = array('data' => array());

$sql = "SELECT * FROM booking where BOOKING_STATUS='for-delivery' and BOOKING_BRANCH='Manila'";
$query = $link->query($sql);


while ($row = $query->fetch_assoc()) {
	$actionButton = '
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	 <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	      	    <li><a href="" type="button" data-toggle="modal" data-target="#editMemberModal" onclick="editMember('.$row['BOOKING_ID'].')"> <span class="fa fa-eye text-info"></span>View</a></li>

	 
	  </ul>
	</div>
		';

	$output['data'][] = array(
		$actionButton,
		$row['BOOKING_REMARKS'],
		$row['BOOKING_PSENDER'],
		$row['BOOKING_PCONTACTNUMBER'],
		$row['BOOKING_PCITY'],
		$row['BOOKING_DCITY'],
		$row['BOOKING_TYPE'],
		$row['BOOKING_DATE']
	
		
	);

}

// database connection close
$link->close();

echo json_encode($output);