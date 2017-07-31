<?php 
include "../../basefunction/database_connection.php";
session_start();
if(isset($_SESSION['session_id'])){
$SESSION_ID = $_SESSION['session_id'];
$query = mysqli_query($link,"select count(*) as notif_count from message where MESSAGE_SEEN = '0' and MESSAGE_TO='$SESSION_ID'");
$fetch = mysqli_fetch_array($query);
$count = $fetch['notif_count'];
echo $count;
}else{
	echo '0';
}
?>