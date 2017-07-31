<?php 
include "../../basefunction/database_connection.php";
$query = mysqli_query($link,"select count(*) as pickup_count from booking where BOOKING_STATUS = 'for-pickup' and BOOKING_BRANCH='Manila'");
$fetch = mysqli_fetch_array($query);
$count = $fetch['pickup_count'];
echo $count;
?>