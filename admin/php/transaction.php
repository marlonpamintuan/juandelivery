<?php 
include "../../basefunction/database_connection.php";
$query = mysqli_query($link,"select count(*) as transaction_count from booking where BOOKING_STATUS = 'done' and BOOKING_BRANCH='Manila'");
$fetch = mysqli_fetch_array($query);
$count = $fetch['transaction_count'];
echo $count;
?>