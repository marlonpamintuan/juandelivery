<?php
	//This is for the database connection
	include ('../basefunction/database_connection.php');
	//This is for the security of the web
	include ('../basefunction/security.php');
	//This is for the start of the session
	
		
	//validation for the value of the session

	//login function	
		$SECURITY_USERNAME = security($_POST['SECURITY_USERNAME']);
		$SECURITY_PASSWORD = security($_POST['SECURITY_PASSWORD']);
		
		$query = mysqli_query($link,"SELECT * FROM user inner join security ON user.USER_ID = security.USER_ID WHERE security.SECURITY_USERNAME = '".$SECURITY_USERNAME."' AND security.SECURITY_PASSWORD = '".$SECURITY_PASSWORD."'");
		$numrows = mysqli_num_rows($query);
		if($numrows == 0){
		echo 'no';
		exit();
		}
		else
		{
			while($row = mysqli_fetch_assoc($query))
			{
		session_start();
				$_SESSION['session_id'] = $row['USER_ID'];
				$_SESSION['session_firstname'] = $row['USER_FIRSTNAME'];
				$_SESSION['session_lastname'] = $row['USER_LASTNAME'];
				$_SESSION['session_email'] = $row['USER_EMAIL'];
				$_SESSION['session_username'] = $row['SECURITY_USERNAME'];
				$_SESSION['session_password'] = $row['SECURITY_PASSWORD'];
				$_SESSION['session_access'] = $row['SECURITY_ACCESS'];

			}
			//Location Depends on the User Type
			if($_SESSION['session_access'] == "admin")
			{
			echo 'login';
				exit();
			}
			else if($_SESSION['session_access'] == "customer"){
			echo 'customer';
			exit();
			
			}
			else if($_SESSION['session_access'] == "tacloban"){
			echo 'tacloban';
			exit();
			
			}
			
			
		}
	

?>

