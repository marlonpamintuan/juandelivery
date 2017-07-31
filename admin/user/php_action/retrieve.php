<?php 

require_once '../../../basefunction/database_connection.php';

$output = array('data' => array());

$sql = "SELECT * FROM user inner join security ON user.USER_ID= security.USER_ID where security.SECURITY_ACCESS !='admin'";
$query = $link->query($sql);


while ($row = $query->fetch_assoc()) {
	$actionButton = '
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	 <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	      	    <li><a type="button" data-toggle="modal" data-target="#editMemberModal" onclick="editMember('.$row['USER_ID'].')"> <span class="glyphicon glyphicon-edit text-info"></span> View / Edit</a></li>
	      	   
	    <li><a type="button" href="" data-toggle="modal" data-target="#removeMemberModal" onclick="removeMember('.$row['USER_ID'].')"> <span class="glyphicon glyphicon-trash text-danger"></span> Delete</a></li>	    
	 
	  </ul>
	</div>
		';

	$output['data'][] = array(
		$actionButton,
		$row['USER_FIRSTNAME'],
		$row['USER_LASTNAME'],
		$row['USER_CONTACTNUMBER'],
		$row['USER_EMAIL'],
		$row['SECURITY_USERNAME'],
		$row['SECURITY_ACCESS']
	);

}

// database connection close
$link->close();

echo json_encode($output);