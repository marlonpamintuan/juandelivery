<?php 
include "../../basefunction/database_connection.php";
$query = mysqli_query($link,"select count(*) as badge_count from booking where BOOKING_STATUS = 'request' and BOOKING_BRANCH='Manila'");
$fetch = mysqli_fetch_array($query);
$count = $fetch['badge_count'];
echo $count;
?>