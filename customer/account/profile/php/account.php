<?php
include "../../../../basefunction/database_connection.php";
include "../../../../basefunction/security.php";
session_start();
$USER_USERNAME= security($_POST['USER_USERNAME']);
$USER_PASSWORD= security($_POST['USER_PASSWORD']);
$USER_NEWPASSWORD= security($_POST['USER_NEWPASSWORD']);
$SESSION_ID = security($_POST['SESSION_ID']);
//CONTACT NUMBER CHECK
$passwordFetch=mysqli_query($link,"select SECURITY_PASSWORD,USER_ID from security where SECURITY_PASSWORD = '$USER_PASSWORD' and USER_ID ='$SESSION_ID'");
$countPasswordFetch= mysqli_num_rows($passwordFetch);
//END
$usernameFetch=mysqli_query($link,"select SECURITY_USERNAME,USER_ID from security where SECURITY_USERNAME = '$USER_USERNAME' and USER_ID !='$SESSION_ID'");
$countUsernameFetch= mysqli_num_rows($usernameFetch);
//END
if($countPasswordFetch < 1){
	echo 'notPassword';	
}elseif($countUsernameFetch > 0){
	echo 'username';
}
else{
$query= "update security set SECURITY_USERNAME='$USER_USERNAME',SECURITY_PASSWORD='$USER_NEWPASSWORD' where USER_ID='$SESSION_ID'";
$result = mysqli_query($link,$query);
if($result)
{
	echo 'done';

}
}
?>
