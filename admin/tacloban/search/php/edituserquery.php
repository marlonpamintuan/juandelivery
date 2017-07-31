<?php
include "../../../basefunction/database_connection.php";
include "../../../basefunction/security.php";
session_start();
$USER_FIRSTNAME = security($_POST['USER_FIRSTNAME']);
$USER_LASTNAME = security($_POST['USER_LASTNAME']);
$USER_CONTACTNUMBER = security($_POST['USER_CONTACTNUMBER']);
$USER_EMAIL = security($_POST['USER_EMAIL']);
$USER_ID = security($_POST['USER_ID']);
$USER_USERNAME = security($_POST['USER_USERNAME']);
$USER_PASSWORD = security($_POST['USER_PASSWORD']);
$USER_NEWPASSWORD = security($_POST['USER_NEWPASSWORD']);
$USER_DATEMODIFIED = date("m-d-Y H:i:s", strtotime('+6 hours'));

$userfetch=mysqli_query($link,"select * from security where SECURITY_USERNAME = '".$USER_USERNAME."'");
$countfetch= mysqli_num_rows($userfetch);
$contactfetch=mysqli_query($link,"select * from user where USER_CONTACTNUMBER = '".$USER_CONTACTNUMBER."'");
$countcontact= mysqli_num_rows($contactfetch);
$emailfetch=mysqli_query($link,"select * from user where USER_EMAIL = '".$USER_EMAIL."'");
$countemail= mysqli_num_rows($emailfetch);
$password=mysqli_query($link,"select * from security where SECURITY_PASSWORD = '".$USER_PASSWORD."' and USER_ID='$USER_ID'");
$countpass= mysqli_num_rows($password);
if($countfetch > 1){
	echo 'duplicate';	
}elseif($countcontact > 1){
    echo 'contact';
}elseif($countemail > 1){
    echo 'email';
}elseif($countpass < 1){
	echo 'not';
}
else{
$query= "update user set USER_FIRSTNAME='$USER_FIRSTNAME',USER_LASTNAME='$USER_LASTNAME',USER_CONTACTNUMBER='$USER_CONTACTNUMBER',USER_EMAIL='$USER_EMAIL',USER_DATEMODIFIED ='$USER_DATEMODIFIED' where USER_ID='$USER_ID'";
$result = mysqli_query($link,$query);
if($result){
$sql2 = mysqli_query($link,"UPDATE security SET SECURITY_USERNAME='$USER_USERNAME', SECURITY_PASSWORD='$USER_NEWPASSWORD' WHERE USER_ID = '$USER_ID'");
if($sql2){
	echo 'done';
}
}
}
?>
