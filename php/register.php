<?php
	//This is for the database connection
	include ('../basefunction/database_connection.php');
	//This is for the security of the web
	include ('../basefunction/security.php');
	//This is for the start of the session
		
		
	//validation for the value of the session

	//login function

		$USER_DATECREATED = date("m-d-Y H:i:s", strtotime('+6 hours'));		
		$USER_FIRSTNAME = security($_POST['USER_FIRSTNAME']);
		$USER_LASTNAME = security($_POST['USER_LASTNAME']);
		$USER_CONTACTNUMBER = security($_POST['USER_CONTACTNUMBER']);
		$USER_EMAIL = security($_POST['USER_EMAIL']);
		$USER_USERNAME = security($_POST['USER_USERNAME']);
		$USER_PASSWORD = security($_POST['USER_PASSWORD']);
		$USER_ACCESS = "customer";

		$query2 = mysqli_query($link,"select * from security where SECURITY_USERNAME ='$USER_USERNAME'");
		$countfetch= mysqli_num_rows($query2);
		$query3 = mysqli_query($link,"select * from user where USER_CONTACTNUMBER ='$USER_CONTACTNUMBER'");
		$countfetch2= mysqli_num_rows($query3);
		$query4 = mysqli_query($link,"select * from user where USER_EMAIL ='$USER_EMAIL'");
		$countfetch3= mysqli_num_rows($query4);
		
		if($countfetch > 0){
		echo 'name';
		exit();		
		}
		elseif($countfetch2 > 0){
		echo 'contact';
		exit();		
		}elseif($countfetch3 > 0){
		echo 'email';
		exit();		
		}
		else{
		$query = mysqli_query($link,"insert into user(USER_FIRSTNAME,USER_LASTNAME,USER_CONTACTNUMBER,USER_EMAIL,USER_DATECREATED) 
		VALUES ('$USER_FIRSTNAME','$USER_LASTNAME','$USER_CONTACTNUMBER','$USER_EMAIL','$USER_DATECREATED')");
		$id = mysqli_insert_id($link);
		//$query = mysqli_query($link,"insert into user(USER_FIRSTNAME,USER_MIDDLENAME,USER_LASTNAME,USER_EMAIL,USER_CONTACTNUMBER,USER_CITY,USER_ADDRESS,USER_USERNAME,USER_PASSWORD) VALUES('$USER_FIRSTNAME','$USER_MIDDLENAME','$USER_LASTNAME','$USER_EMAIL','$USER_CONTACTNUMBER','$USER_CITY','$USER_ADDRESS')");
		if($query){
		$security_query = mysqli_query($link,"insert into security(USER_ID,SECURITY_USERNAME,SECURITY_PASSWORD,SECURITY_ACCESS) VALUES('$id','$USER_USERNAME','$USER_PASSWORD','$USER_ACCESS')");
		if($security_query){
session_start();
$_SESSION['TEMP_USERNAME'] = $USER_USERNAME;
		echo 'done';

		exit();
		}
		}else{
		echo 'sda';
		}
		}
	

?>

