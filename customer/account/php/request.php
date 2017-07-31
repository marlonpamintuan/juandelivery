<?php 
include "../../../basefunction/database_connection.php";
session_start();
if(isset($_SESSION['session_id']))
{
$SESSION_ID = $_SESSION['session_id'];
$query = mysqli_query($link,"select count(*) as request_count from booking where BOOKING_STATUS = 'request' and USER_ID='$SESSION_ID'");
$fetch = mysqli_fetch_array($query);
$count = $fetch['request_count'];
echo $count;
}
else
{
echo '---';
}
?>