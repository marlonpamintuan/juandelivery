<?php 
include "../../../basefunction/database_connection.php";
$query = mysqli_query($link,"select count(*) as delivery_count from booking where BOOKING_STATUS = 'for-delivery' and BOOKING_BRANCH='Tacloban'");
$fetch = mysqli_fetch_array($query);
$count = $fetch['delivery_count'];
echo $count;
?>