<?php
include "../../../../basefunction/database_connection.php";
include "../../../../basefunction/security.php";
session_start();
$USER_CONTACTNUMBER= security($_POST['USER_CONTACTNUMBER']);
$USER_EMAIL = security($_POST['USER_EMAIL']);
$SESSION_ID = security($_POST['SESSION_ID']);
//CONTACT NUMBER CHECK
$contactNumberFetch=mysqli_query($link,"select * from user where USER_CONTACTNUMBER = '$USER_CONTACTNUMBER' and USER_ID !='$SESSION_ID'");
$countContactNumberFetch= mysqli_num_rows($contactNumberFetch);
//END
//EMAIL CHECK
$emailFetch=mysqli_query($link,"select * from user where USER_EMAIL = '$USER_EMAIL' and USER_ID !='$SESSION_ID'");
$countEmailFetch= mysqli_num_rows($emailFetch);
//END
if($countContactNumberFetch > 0){
	echo 'contact';	
}elseif($countEmailFetch > 0){
	echo 'email';
}
else{
$query= "update user set USER_CONTACTNUMBER='$USER_CONTACTNUMBER',USER_EMAIL='$USER_EMAIL' where USER_ID='$SESSION_ID'";
$result = mysqli_query($link,$query);
if($result)
{
	echo 'done';

}
}
?>
