<?php 

require_once '../../../basefunction/database_connection.php';

$output = array('data' => array());

$sql = "SELECT * FROM employee where EMPLOYEE_BRANCH='Manila'";
$query = $link->query($sql);


while ($row = $query->fetch_assoc()) {
	$actionButton = '
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	 <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	      	    <li><a type="button" data-toggle="modal" data-target="#editMemberModal" onclick="editMember('.$row['EMPLOYEE_ID'].')"> <span class="glyphicon glyphicon-edit text-info"></span> View / Edit</a></li>
	      	   
	    <li><a type="button" href="" data-toggle="modal" data-target="#removeMemberModal" onclick="removeMember('.$row['EMPLOYEE_ID'].')"> <span class="glyphicon glyphicon-trash text-danger"></span> Delete</a></li>	    
	 
	  </ul>
	</div>
		';

	$output['data'][] = array(
		$actionButton,
		$row['EMPLOYEE_FIRSTNAME'],
		$row['EMPLOYEE_LASTNAME'],
		$row['EMPLOYEE_CONTACTNUMBER'],
		$row['EMPLOYEE_POSITION']
	);

}

// database connection close
$link->close();

echo json_encode($output);