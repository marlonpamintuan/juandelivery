<?php 

require_once '../../../basefunction/database_connection.php';
//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$EMPLOYEE_FIRSTNAMEC = $_POST['EMPLOYEE_FIRSTNAMEC'];
	$EMPLOYEE_LASTNAMEC = $_POST['EMPLOYEE_LASTNAMEC'];	
	$EMPLOYEE_CONTACTNUMBERC = $_POST['EMPLOYEE_CONTACTNUMBERC'];
	$EMPLOYEE_POSITIONC = $_POST['EMPLOYEE_POSITIONC'];
	$EMPLOYEE_DATECREATED= date("m-d-Y H:i:s", strtotime('+6 hours'));

	$sql = "INSERT INTO employee(EMPLOYEE_FIRSTNAME,EMPLOYEE_LASTNAME,EMPLOYEE_CONTACTNUMBER,EMPLOYEE_POSITION,EMPLOYEE_DATECREATED,EMPLOYEE_BRANCH) VALUES ('$EMPLOYEE_FIRSTNAMEC','$EMPLOYEE_LASTNAMEC','$EMPLOYEE_CONTACTNUMBERC','$EMPLOYEE_POSITIONC','$EMPLOYEE_DATECREATED','Manila')";
	$query = $link->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Successfully Added";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Error while adding the member information";
	}

	// close the database connection
	$link->close();

	echo json_encode($validator);

}