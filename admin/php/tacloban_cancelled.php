<?php 
include "../../basefunction/database_connection.php";
$query = mysqli_query($link,"select count(*) as cancelled_count from booking where BOOKING_STATUS = 'cancelled' and BOOKING_BRANCH='Tacloban'");
$fetch = mysqli_fetch_array($query);
$count = $fetch['cancelled_count'];
echo $count;
?>