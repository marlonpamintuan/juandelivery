<?php 
include "../../../basefunction/database_connection.php";
session_start();
if(isset($_SESSION['session_id']))
{
$SESSION_ID = $_SESSION['session_id'];
$query = mysqli_query($link,"select count(*) as pickup_count from booking where BOOKING_STATUS = 'for-pickup' and USER_ID='$SESSION_ID'");
$fetch = mysqli_fetch_array($query);
$count = $fetch['pickup_count'];
echo $count;
}else{
	echo "---";
}
?>