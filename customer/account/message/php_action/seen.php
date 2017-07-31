<?php 

require_once '../../../../basefunction/database_connection.php';
//if form is submitted
session_start();
if(isset($_SESSION['session_id'])){
$SESSION_ID = $_SESSION['session_id'];
$query = mysqli_query($link,"update message SET MESSAGE_CUSTOMERSEEN='1' WHERE MESSAGE_CUSTOMERSEEN='0' and MESSAGE_TO='$SESSION_ID'");
}else{
	echo '';
}
