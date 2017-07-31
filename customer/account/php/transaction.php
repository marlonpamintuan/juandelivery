<?php 
include "../../../basefunction/database_connection.php";
session_start();
if(isset($_SESSION['session_id']))
{
$SESSION_ID = $_SESSION['session_id'];
$query = mysqli_query($link,"select count(*) as transaction_count from booking where BOOKING_STATUS = 'done' and USER_ID='$SESSION_ID'");
$fetch = mysqli_fetch_array($query);
$count = $fetch['transaction_count'];
echo $count;
}else{
	echo "---";
}
?>