<?php 
include "../../basefunction/database_connection.php";
$query = mysqli_query($link,"select count(*) as request_count from booking where BOOKING_STATUS = 'request' and BOOKING_BRANCH='Manila'");
$fetch = mysqli_fetch_array($query);
$count = $fetch['request_count'];
echo $count;
?>