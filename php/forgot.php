<?php
	//This is for the database connection
	include ('../basefunction/database_connection.php');
	//This is for the security of the web
	include ('../basefunction/security.php');
	//This is for the start of the session
		
		
	//validation for the value of the session

	//login function


		$USER_EMAIL = security($_POST['USER_EMAIL']);

		$query = mysqli_query($link,"select * from user inner join security on user.USER_ID = security.USER_ID where USER_EMAIL ='$USER_EMAIL'");
		$countfetch= mysqli_num_rows($query);
		
	if($countfetch == 0){
		echo 'email';
		exit();		
		}
	
		$fetch = mysqli_fetch_array($query);
		$USER_EMAIL = $fetch['USER_EMAIL'];
		$SECURITY_PASSWORD = $fetch['SECURITY_PASSWORD'];
		$name = 'Juan Delivery';
		$email = 'juandelivery.inquiry@gmail.com';
		$subject = 'Your Juan Delivery Password';
	
	
    	$email_from = $email;
    	$email_to = $USER_EMAIL;//replace with your email

    $body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Password: ' . $SECURITY_PASSWORD;

    $retval = @mail($email_to, $subject, $body, 'From: <'.$email_from.'>');
         if( $retval == true )
         {
         echo 'done';
         exit();
         }else
         {
         	echo 'not';
         	exit();
         }
     	
		//$query = mysqli_query($link,"insert into user(USER_FIRSTNAME,USER_MIDDLENAME,USER_LASTNAME,USER_EMAIL,USER_CONTACTNUMBER,USER_CITY,USER_ADDRESS,USER_USERNAME,USER_PASSWORD) VALUES('$USER_FIRSTNAME','$USER_MIDDLENAME','$USER_LASTNAME','$USER_EMAIL','$USER_CONTACTNUMBER','$USER_CITY','$USER_ADDRESS')");
	

	
	

?>

