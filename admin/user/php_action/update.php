<?php 

require_once '../../../basefunction/database_connection.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());
	$USER_ID = $_POST['USER_ID'];
	$USER_FIRSTNAME = $_POST['USER_FIRSTNAME'];
	$USER_LASTNAME = $_POST['USER_LASTNAME'];	
	$USER_CONTACTNUMBER = $_POST['USER_CONTACTNUMBER'];
	$USER_EMAIL = $_POST['USER_EMAIL'];
	$SECURITY_USERNAME = $_POST['SECURITY_USERNAME'];
	$SECURITY_PASSWORD = $_POST['SECURITY_PASSWORD'];
	$number = mysqli_query($link,"select * from user where USER_CONTACTNUMBER='$USER_CONTACTNUMBER'");
	$count_number = mysqli_num_rows($number);
	$email = mysqli_query($link,"select * from user where USER_EMAIL='$USER_EMAIL'");
	$count_email = mysqli_num_rows($email);
	$username = mysqli_query($link,"select * from security where SECURITY_USERNAME='$SECURITY_USERNAME'");
	$count_username = mysqli_num_rows($username);
if($count_number > 1)
	{
	$validator['success'] = false;
		$validator['messages'] = "Duplicate Contact Number";
	}elseif($count_email > 1)
	{
	$validator['success'] = false;
		$validator['messages'] = "Duplicate Email Address";
	}elseif($count_username > 1)
	{
	$validator['success'] = false;
		$validator['messages'] = "Duplicate Username";
	}else{
	$sql = "UPDATE user SET USER_FIRSTNAME = '$USER_FIRSTNAME',USER_LASTNAME = '$USER_LASTNAME',USER_CONTACTNUMBER = '$USER_CONTACTNUMBER',USER_EMAIL = '$USER_EMAIL' WHERE USER_ID = '$USER_ID'";
	$query = $link->query($sql);
	if($query)
	{
	$sql2 = "UPDATE security SET SECURITY_USERNAME='$SECURITY_USERNAME', SECURITY_PASSWORD='$SECURITY_PASSWORD' WHERE USER_ID = '$USER_ID'";
	$query2 = $link->query($sql2);
	if($query2 === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Successfully modified information";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Error while updating information";
	}
	}
	}

	// close the database connection
	$link->close();

	echo json_encode($validator);

}