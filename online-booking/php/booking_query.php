<?php
include "../../basefunction/database_connection.php";
include "../../basefunction/security.php";
session_start();
error_reporting(0);
$USER_ID = $_SESSION['session_id'];
$BOOKING_PSENDER = security($_POST['BOOKING_PSENDER']);
$BOOKING_PCONTACTNUMBER = security($_POST['BOOKING_PCONTACTNUMBER']);
$BOOKING_PCITY = security($_POST['BOOKING_PCITY']);
$BOOKING_PADDRESS = security($_POST['BOOKING_PADDRESS']);
$BOOKING_PLANDMARK = security($_POST['BOOKING_PLANDMARK']);
$BOOKING_DCONSIGNEE = security($_POST['BOOKING_DCONSIGNEE']);
$BOOKING_DCONTACTNUMBER = security($_POST['BOOKING_DCONTACTNUMBER']);
$BOOKING_DCITY = security($_POST['BOOKING_DCITY']);
$BOOKING_DADDRESS = security($_POST['BOOKING_DADDRESS']);
$BOOKING_DLANDMARK = security($_POST['BOOKING_DLANDMARK']);
$BOOKING_TYPE = security($_POST['BOOKING_TYPE']);
$BOOKING_WEIGHT = security($_POST['BOOKING_WEIGHT']);
$BOOKING_SIZE = security($_POST['BOOKING_SIZE']);
$BOOKING_QUANTITY = security($_POST['BOOKING_QUANTITY']);
$BOOKING_DECLAREDVALUE = security($_POST['BOOKING_DECLAREDVALUE']);
$BOOKING_REMARKS = security($_POST['BOOKING_REMARKS']);
$BOOKING_INSURANCE = security($_POST['BOOKING_INSURANCE']);
$BOOKING_PAYMENT = security($_POST['BOOKING_PAYMENT']);
$BOOKING_PRICE = security($_POST['BOOKING_PRICE']);
$BOOKING_DATE= date("Y-m-d", strtotime('+6 hours'));
$BOOKING_DATECREATED= date("m-d-Y H:i:s", strtotime('+6 hours'));
$BOOKING_STATUS='request';
$query= "insert into booking(USER_ID,BOOKING_PSENDER,BOOKING_PCONTACTNUMBER,BOOKING_PCITY,BOOKING_PADDRESS,BOOKING_PLANDMARK,BOOKING_DCONSIGNEE,BOOKING_DCONTACTNUMBER,BOOKING_DCITY,BOOKING_DADDRESS,BOOKING_DLANDMARK,BOOKING_TYPE,BOOKING_WEIGHT,BOOKING_SIZE,BOOKING_QUANTITY,BOOKING_DECLAREDVALUE,BOOKING_REMARKS,BOOKING_INSURANCE,BOOKING_PRICE,BOOKING_DATE,BOOKING_DATECREATED,BOOKING_STATUS,BOOKING_BRANCH,BOOKING_PAYMENT) VALUES('$USER_ID','$BOOKING_PSENDER','$BOOKING_PCONTACTNUMBER','$BOOKING_PCITY','$BOOKING_PADDRESS','$BOOKING_PLANDMARK','$BOOKING_DCONSIGNEE','$BOOKING_DCONTACTNUMBER','$BOOKING_DCITY','$BOOKING_DADDRESS','$BOOKING_DLANDMARK','$BOOKING_TYPE','$BOOKING_WEIGHT','$BOOKING_SIZE','$BOOKING_QUANTITY','$BOOKING_DECLAREDVALUE','$BOOKING_REMARKS','$BOOKING_INSURANCE','$BOOKING_PRICE','$BOOKING_DATE','$BOOKING_DATECREATED','$BOOKING_STATUS','Manila','$BOOKING_PAYMENT')";
$result = mysqli_query($link,$query);
if($result){
echo 'done';
}

?>
