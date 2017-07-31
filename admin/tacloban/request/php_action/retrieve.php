<?php 

require_once '../../../../basefunction/database_connection.php';

$output = array('data' => array());

$sql = "SELECT * FROM booking where BOOKING_STATUS='request' and BOOKING_BRANCH='Tacloban'";
$query = $link->query($sql);


while ($row = $query->fetch_assoc()) {
	$actionButton = '
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	 <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
    <li><a href="" type="button" data-toggle="modal" data-target="#editMemberModal" onclick="editMember('.$row['BOOKING_ID'].')"> <span class="fa fa-eye text-info"></span>View</a></li>
	     <li><a type="button" href="" data-toggle="modal" data-target="#pickupMemberModal" onclick="pickup('.$row['BOOKING_ID'].')"> <span class="fa fa-spinner text-info"></span> For-Pickup</a></li>
	       <li><a type="button" href="" data-toggle="modal" data-target="#sendModal" onclick="send('.$row['BOOKING_ID'].')"> <span class="fa fa-paper-plane text-success"></span> Send to Manila</a></li>
	        
	    <li><a type="button" href="" data-toggle="modal" data-target="#removeMemberModal" onclick="removeMember('.$row['BOOKING_ID'].')"> <span class="glyphicon glyphicon-trash text-danger"></span> Delete</a></li>	    
	 
	  </ul>
	</div>
		';
//  <li><a type="button" href=""  data-toggle="modal" data-target="#deliveryMemberModal" onclick="delivery('.$row['BOOKING_ID'].')"> <span class="fa fa-spinner"></span> For-Delivery</a></li>		
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