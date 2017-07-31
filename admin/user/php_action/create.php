<?php 

require_once '../../../basefunction/database_connection.php';
//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$USER_FIRSTNAMEC = $_POST['USER_FIRSTNAMEC'];
	$USER_LASTNAMEC = $_POST['USER_LASTNAMEC'];	
	$USER_CONTACTNUMBERC = $_POST['USER_CONTACTNUMBERC'];
	$USER_EMAILC = $_POST['USER_EMAILC'];
	$SECURITY_USERNAMEC = $_POST['SECURITY_USERNAMEC'];
	$SECURITY_PASSWORDC = $_POST['SECURITY_PASSWORDC'];
		$SECURITY_ACCESS = $_POST['SECURITY_ACCESS'];
	$USER_DATECREATED= date("m-d-Y H:i:s", strtotime('+6 hours'));
	$number = mysqli_query($link,"select * from user where USER_CONTACTNUMBER='$USER_CONTACTNUMBERC'");
	$count_number = mysqli_num_rows($number);
	$email = mysqli_query($link,"select * from user where USER_EMAIL='$USER_EMAILC'");
	$count_email = mysqli_num_rows($email);
	$username = mysqli_query($link,"select * from security where SECURITY_USERNAME='$SECURITY_USERNAMEC'");
	$count_username = mysqli_num_rows($username);
	if($count_number > 0)
	{
	$validator['success'] = false;
		$validator['messages'] = "Duplicate Contact Number";
	}elseif($count_email > 0)
	{
	$validator['success'] = false;
		$validator['messages'] = "Duplicate Email Address";
	}elseif($count_username > 0)
	{
	$validator['success'] = false;
		$validator['messages'] = "Duplicate Username";
	}else{
	$sql = "INSERT INTO user(USER_FIRSTNAME,USER_LASTNAME,USER_CONTACTNUMBER,USER_EMAIL,USER_DATECREATED) VALUES ('$USER_FIRSTNAMEC','$USER_LASTNAMEC','$USER_CONTACTNUMBERC','$USER_EMAILC','$USER_DATECREATED')";
	$query = $link->query($sql);
	if($query)
	{
	$USER_ID= mysqli_insert_id($link);
	$sql2="INSERT INTO security(USER_ID,SECURITY_USERNAME,SECURITY_PASSWORD,SECURITY_ACCESS) VALUES ('$USER_ID','$SECURITY_USERNAMEC','$SECURITY_PASSWORDC','$SECURITY_ACCESS')";
	$query2 = $link->query($sql2);
	if($query2 === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Successfully Added";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Error while adding the member information";
	}
	}	
	}
	
	

	// close the database connection
	$link->close();

	echo json_encode($validator);

}